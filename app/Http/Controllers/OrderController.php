<?php

namespace App\Http\Controllers;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
   
    
    public function addOrder( $user_id, $request )
    {
        
        $invoice_id = DB::table('merchant_history')->where( 'transaction_id', '=', $request['transaction_id'] )->first(['invoice_id']); 
        
        if( $invoice_id === null )
            return response()->json( "Failed To Get Invoice Id", 400 );
        
        
        $user_data = DB::table('users')->where( 'id', '=', $user_id )->first();
            
        if( $user_data === null )
            return response()->json( "Failed To Get User Data", 400 );
        
        
        $invoice_data = DB::table('invoices')->where( 'id', '=', $invoice_id->invoice_id )->first(); 
        
        if( $invoice_data === null )
            return response()->json( "Failed To Get Invoice Data", 400 );
        
        
        
        $interest = DB::table('merchant_services')->where( 'service_id', '=', $request['service_id'] )
                    ->where( 'min_price', '<=', $invoice_data->sum_price )
                    ->where( 'max_price', '>=', $invoice_data->sum_price )
                    ->first(['interest','interest_period']);
        
        
        if( $interest === null )
            return response()->json( "Failed To Get Interest", 400 );
        
        
        
        
        // Seed Orders Table
        $order = new Order;
        $order->user_id = $user_id;
        $order->admin_id = 1; // to be completed
        $order->company_id = $user_data->company_id;
        $order->invoice_id = $invoice_id->invoice_id; 
        $order->shipping_price = $invoice_data->shipping_price;
        $order->service_id = $request['service_id'];
        $order->merchant_id = $request['merchant_id'];
        $order->months = $request['months'];
        $order->price = $invoice_data->price; 
        $order->prepay = $request['prepay'];
        $order->status = 0;
        $order->total_amount = $this->totalAmount( $invoice_data->sum_price, $interest->interest, $request['months'], $interest->interest_period );
        $order->interest = $interest->interest;
        $order->first_pay_date = Carbon::parse( $request['first_pay_date'] )->format('Y-m-d');
        $order->end_date = Carbon::parse( $request['end_date'] )->format('Y-m-d');
        
        if( $order->save() ):
            
            $this->orderedProductsSeeder( $order->id );
            $this->orderShippingSeeder( $order->id, $request );
            return $this->contactPeopleSeeder( $user_id, $order->id, $request );
            
        endif;
        
    }
    
    
    
    
    
    
    
    public function totalAmount( $sum_price, $interest, $month, $period )
    {
        if( $period == "M" )
            return $sum_price * ( ( $interest * $month ) / 100 + 1 );
        elseif ( $period == "Y" )
            return $sum_price * ( ( ( $interest / 12 ) * $month ) / 100 + 1 );
    }
    
    
    
    
    
    public function orderedProductsSeeder( $order_id )
    {
        $order_data = Order::where( 'id', '=', $order_id )->first(['prepay','invoice_id','interest']);
        $products = DB::table('invoice_products')->where( 'invoice_id', '=', $order_data->invoice_id )->get();
        $price = DB::table('invoices')->where( 'id', '=', $order_data->invoice_id )->first(['price']);
        $data = [];
        
        $interest = DB::table('merchant_services')->where( 'service_id', '=', $order_data->service_id )
                    ->where( 'min_price', '<=', $order_data->price )
                    ->where( 'max_price', '>=', $order_data->price )
                    ->first(['interest','interest_period']);
        
        
        if( $interest === null )
            return response()->json( "Failed To Get Interest", 400 );
        
        foreach( $products as $product ):
            $products_price = $product->price * $product->quantity;
            $interest_rate = $order_data->interest/100+1;
            $row = [

                'order_id'      => $order_id,
                'title'         => $product->title,
                'category_id'   => $product->category_id,
                'price'         => $product->price,
                'quantity'      => $product->quantity,
                'sum_price'     => $products_price, // quantity * price
                'prepay'        => ( $price->price / $order_data->prepay ) * $products_price,
                'interest'      => $products_price*$interest_rate,
                'total_price'   => $this->totalAmount( $products_price, $interest->interest, $order_data->months, $interest->interest_period ),// to be completed
            ];
        
            $data[] = $row;
        
        endforeach;
        
        $added = DB::table('ordered_products')->insert( $data );
        
        if( !$added )
            return response()->json("Seeding Ordered_products Failed ! ", 400 );
        
        
    }
    
    
    
    
    
    
    
    
    
    
    public function orderShippingSeeder( $order_id, $request )
    {
        $data = [
            'order_id' => $order_id,
            'city_id'  => $request['city_id'],
            'address'  => $request['address'],
            'phone'    => $request['phone'],
        ];
        
        $added = DB::table('order_shippings')->insert( $data );
        
        if( !$added )
            return response()->json("Seeding order_shippings Failed ! ", 400 );
        
    }
    
    
    
    
    
    
    
     
    
    public function contactPeopleSeeder( $user_id, $order_id, $request )
    {
        $data = [
            
            'user_id'    => $user_id,
            'order_id'   => $order_id,
            'firstname'  => $request['firstname_contact'],
            'lastname'   => $request['lastname_contact'],
            'phone'      => $request['phone_contact'],
            'status'     => $request['status'],
        ];
        
        $added = DB::table('contact_people')->insert( $data );
        
        if( !$added )
            return response()->json("Seeding Contact People Failed ! ", 400 );
        
    }
    
    
    
    
    
    
    
    
    
}
