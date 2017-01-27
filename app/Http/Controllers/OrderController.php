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
        
        $user_data = DB::table('users')->where( 'id', '=', $user_id )->first();
        
        $invoice_data = DB::table('invoices')->where( 'id', '=', $invoice_id->invoice_id )->first(); 
        
        $interest = DB::table('merchant_services')->where( 'service_id', '=', $request['service_id'] )
                    ->where( 'min_price', '<=', $invoice_data->sum_price )
                    ->where( 'max_price', '>=', $invoice_data->sum_price )
                    ->first(['interest','interest_period']);
        
        
        
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
        $order->save();        
    }
    
    
    
    public function totalAmount( $sum_price, $interest, $month, $period )
    {
        if( $period == "M" )
        {
            return $sum_price * ( ( $interest * $month ) / 100 + 1 );
        }
        elseif ( $period == "Y" )
        {
            return $sum_price * ( ( ( $interest / 12 ) * $month ) / 100 + 1 );
        }
        
    }
    
}
