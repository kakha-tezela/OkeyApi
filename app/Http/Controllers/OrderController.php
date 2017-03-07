<?php
namespace App\Http\Controllers;
use App\Order;
use Carbon\Carbon;
use App\Repositories\Maradit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    
    
     public function createAnnuitySchedule( Request $request )
    {
        
        // Get Order Data
        $orderData = Order::where( 'id',$request->order_id )->first(['start_date','first_pay_date','months','merchant_id','principal_price']);
        
        if( $orderData === null )
            return response()->json( "Failed To Get Order Data", 400 );
        
        
        // get monthly interest from merchant services
        $monthlyInterest = $this->getMonthlyPercent( $orderData->merchant_id, $orderData->principal_price );
        
        
        // calculate pmt
        $pmt = $this->pmt( $monthlyInterest, $orderData->months, $orderData->principal_price );
        $principal = $orderData->principal_price;
        
        $tot = 0;
        for( $i = 0; $i <= $orderData->months; $i++ ):


            if( $i == 0 ){
                $month_amount = 0;
                $interest = 0;
                $principal = 0;
                $debt_left = $orderData->principal_price;
                $pay_date = $orderData->start_date;
            }elseif( $i == $orderData->months ){
                $month_amount = $pmt;
                $principal = $orderData->principal_price-$tot;
                $interest = number_format($month_amount - $principal,2);
                $debt_left = 0;
                $pay_date = $this->checkPayDate( Carbon::parse($orderData->first_pay_date)->addMonth($i)->format('Y-m-d') );
            }else{
                $month_amount = $pmt;
                $interest = number_format( $debt_left * $monthlyInterest, 2 );
                $principal = $month_amount - $interest;
                $debt_left -= $principal;
                $tot += $principal;
                $pay_date = $this->checkPayDate( Carbon::parse($orderData->first_pay_date)->addMonth($i)->format('Y-m-d') );
            }
                $data[] = [
                    'order_id'        => $request->order_id,
                    'month'           => $i,  
                    'month_amount'    => $month_amount,
                    'interest'        => $interest, 
                    'principal'       => $principal,
                    'debt_left'       => $debt_left, 
                    'pay_date'        => $pay_date,
                ];
            
        endfor;



        if( !DB::table('schedule')->insert($data) )
            return response()->json( "Failed To Add Annuity Schedule", 404 );

        return response()->json( "Schedule Created !", 200 );
        
    }







    
    
    
    
    function pmt( $interest, $months, $loan )
    {
       $months = $months;
       $amount = $interest * -$loan * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months));
       return number_format($amount, 2);
    }
    
    
    
    
    
    
    
    
   public function getMonthlyPercent( $merchant_id, $amount )
    {
        $percent = DB::table('merchant_services')->where('merchant_id',$merchant_id)
                    ->where('min_price', '<=', $amount)        
                    ->where('max_price', '>', $amount)
                    ->first(['interest','interest_period']);
        if( $percent === null )
            return response()->json( "Failed To Get Percent Data", 400 );
        
        
        if( $percent->interest_period == "M" )
            return $percent->interest;
        elseif( $percent->interest_period == "Y" )
            return ($percent->interest / 100) / 12;
        
    }
    
    

    
    
    
    
    
    





    public function createSchedule( Request $request )
    {
        
        // Get Order Data
        $orderData = Order::where( 'id', '=', $request->only(['order_id']) )->first(['id','start_date','first_pay_date','total_amount','months','principal_price','interest_price']);
        
        
        if( $orderData === null )
            return response()->json( "Failed To Get Order Data", 400 );
        
        
        for( $i = 0; $i <= $orderData->months; $i++ ):
            
            
            if( $i == 0 )
            {
                $month_amount = 0;
                $interest = 0;
                $principal = 0;
                $debt_left = $orderData->total_amount;
                $pay_date = $orderData->start_date;                    

                
                // Check Date
                $pay_date = $this->checkPayDate( $pay_date );
                
            }
            elseif( $i == $orderData->months )
            {
                
                $month_amount = $orderData->total_amount - ( number_format( $orderData->total_amount / $orderData->months, 2 ) * ( $i - 1 ) ) ;
                $principal = $orderData->principal_price - number_format( $orderData->principal_price / $orderData->months, 2 ) * ( $i - 1 );
                $interest = $month_amount - $principal;
                $debt_left = $orderData->total_amount - ( ( number_format( $orderData->total_amount / $orderData->months, 2 ) * ( $i - 1 ) ) + $month_amount );
                
                // Check Date
                $time = strtotime( $orderData->first_pay_date );
                $pay_date = date( "Y-m-d", strtotime( "+".($i-1)."month", $time ) );
                $pay_date = $this->checkPayDate( $pay_date );
                
            }
            else
            {
                $month_amount = number_format( $orderData->total_amount / $orderData->months, 2 );
                $principal = number_format( $orderData->principal_price / $orderData->months, 2 );
                $interest = number_format( $month_amount - $principal, 2 );
                $debt_left = number_format( $orderData->total_amount - $month_amount * $i, 2 );
                
                $time = strtotime( $orderData->first_pay_date );
                $pay_date = date( "Y-m-d", strtotime( "+".($i-1)."month", $time ) );
                $pay_date = $this->checkPayDate( $pay_date );
                
                if( $i == 1 ):
                    
                    $month_amount += $this->extraPay( $orderData->start_date, $orderData->first_pay_date, $interest );
                    $interest += $this->extraPay( $orderData->start_date, $orderData->first_pay_date, $interest );
                    
                    // Check Date
                    $time = strtotime( $orderData->first_pay_date );
                    $pay_date = date( "Y-m-d", $time );
                    $pay_date = $this->checkPayDate( $pay_date );
                
                endif;
                
            }
            
            
            // Generate Aray
            
            $data[] = [

                'order_id'        => $request->order_id,
                'month'           => $i,  
                'month_amount'    => $month_amount,  
                'interest'        => $interest,  
                'principal'       => $principal,
                'debt_left'       => $debt_left,
                'pay_date'        => $pay_date,
            ];

        endfor;
        
        $added = DB::table('schedule')->insert( $data );
        
        if( !$added )
            return response()->json( "Failed To Insert Schedule", 400 );
        
        
        return response()->json("Operation Succesfull !", 200 );
        
    }
    
    
    
    
    
    
    
    
    
    public function orderStatus( Request $request )
    {
        if( !$request->has( 'order_id' ) OR !$request->has( 'personal_id' ) OR !$request->has( 'status' ) )
            return response()->json( "Necessary Data Missing", 400 );

        
        Order::where( 'id', '=', $request->order_id )->update([
            
            'status'          => $request->status,
            'portfel_manager' => $request->personal_id,
        
        ]);        
        
    }
    
    
    public function extraPay( $start_date, $first_pay_date, $month_interest )
    {
        // Get Difference In Days
        
        $start_date = Carbon::parse( $start_date );
        $first_pay_date = Carbon::parse( $first_pay_date );
        $prev_pay_date = $first_pay_date->subMonth(1);
        $diff_small = $prev_pay_date->diffInDays( $start_date );
        
        
        // Increase First Pay Date By Month
        
        $second_pay_date = Carbon::parse( $first_pay_date )->addMonths(1)->format( 'Y-m-d' );
        
        
        // Get Interval Between Start Date And Next Months Pay Date
        
        $second_pay_date = Carbon::parse( $second_pay_date );
        $diff_big = $second_pay_date->diffInDays( $first_pay_date );
        
        
        return number_format( $month_interest / $diff_big * $diff_small, 2 );
        
    }
    
    
    
    
    
    
    
    
    
    
    
   public function checkPayDate( $pay_date )
    {
        
        // Check Date If Day Off
       
        $pay_date = Carbon::parse( $pay_date )->format('d.m.Y');
        $cnt = DB::table('dasveneba')->where( 'title', '=', $pay_date )->count();
        
        if( $cnt == 1 ):

            while( $cnt != 0 ):
            
                $pay_date = strtotime( "1 day", strtotime( $pay_date ) );
                $pay_date = date( "Y-m-d", $pay_date );
                $cnt = DB::table('dasveneba')->where( 'title', '=', $pay_date )->count();
            
            endwhile;
            
        endif;

        
        // Check Date If Sunday
        
        $weekDay = date( 'w', strtotime( $pay_date ) );
        
        if( $weekDay == "0" ):
               $pay_date = strtotime("1 day", strtotime( $pay_date ));
               $pay_date = date( "Y-m-d", $pay_date );
            
        endif;
        
        return Carbon::parse( $pay_date )->format('Y-m-d');
        
    }
    
    
    
    
    
    
    
    
    
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
        $order->company_id = $user_data->company_id;
        $order->invoice_id = $invoice_id->invoice_id; 
        $order->shipping_price = $invoice_data->shipping_price;
        $order->service_id = $request['service_id'];
        $order->channel_id = $request['channel_id'];
        $order->branch_id = $request['branch_id'];
        $order->merchant_id = $request['merchant_id'];
        $order->months = $request['months'];
        $order->prepay = $request['prepay'];
        $order->currency_id = $request['currency_id'];
        $order->principal_price = $invoice_data->sum_price;  
        $order->interest = $interest->interest;
        $order->interest_price = $this->interestPrice( $invoice_data->sum_price, $interest->interest, $request['months'], $interest->interest_period );
        $order->price = $invoice_data->price; 
        $order->total_amount = $this->totalAmount( $invoice_data->sum_price, $interest->interest, $request['months'], $interest->interest_period );
        $order->start_date = Carbon::parse( $request['start_date'])->format('Y-m-d');  
        $order->first_pay_date = Carbon::parse( $request['first_pay_date'] )->format('Y-m-d');
        $order->end_date = Carbon::parse( $request['end_date'] )->format('Y-m-d');
        $order->repetition = $this->countOrders( $user_id );
        $order->guarantee = $request['guarantee'];
        $order->portfel_manager = 0; // later assigned
        $order->sms_code = "";
        $order->verified = 0;
        $order->status = 0;
        
         
        if( !$order->save() )
            return response()->json( "Failed to Add Order !", 400 );
            
        
        $this->orderedProductsSeeder( $order->id );
        $this->userOrderHistory( $order->id, $request );
        $this->orderShippingSeeder( $order->id, $request );
        $this->contactPeopleSeeder( $user_id, $order->id, $request );
        
        
        return response()->json( "Operation Succesfull !", 200 ); 
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    public function countOrders( $user_id )
    {
        return DB::table('orders')->where( 'user_id', '=', $user_id )->count() + 1;
    }
    
    
    
    
    
    
    
    
    
    public function interestPrice( $sum_price, $interest, $month, $period )
    {
        if( $period == "M" )
            return $sum_price * ( ( $interest * $month ) / 100 );
        elseif ( $period == "Y" )
            return $sum_price * ( ( ( $interest / 12 ) * $month ) / 100 );
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
        $order_data = Order::where( 'id', '=', $order_id )->first(['prepay','invoice_id','interest','price']);
        
        if( $order_data === null )
            return response()->json( "Failed To Get Order Data", 400 );
            
        $price = DB::table('invoices')->where( 'id', '=', $order_data->invoice_id )->first(['price']);
        
        if( $price === null )
            return response()->json( "Failed To Get invoice Price", 400 );
        
        
        
        $interest = DB::table('merchant_services')->where( 'service_id', '=', $order_data->service_id )
                    ->where( 'min_price', '<=', $order_data->price )
                    ->where( 'max_price', '>=', $order_data->price )
                    ->first(['interest','interest_period']);
        
        if( $interest === null )
            return response()->json( "Failed To Get Interest", 400 );
        
        
        $products = DB::table('invoice_products')->where( 'invoice_id', '=', $order_data->invoice_id )->get();
        $data = [];

        foreach( $products as $product ):
        
            $products_price = $product->price * $product->quantity;
            $prepay = ( $price->price / $order_data->prepay ) * $products_price;
            $product_last_price = $products_price-$prepay;
            $interest_rate = $order_data->interest/100+1;
            $row = [

                'order_id'      => $order_id,
                'title'         => $product->title,
                'category_id'   => $product->category_id,
                'price'         => $product->price,
                'quantity'      => $product->quantity,
                'sum_price'     => $products_price, // quantity * price
                'prepay'        => ( $price->price / $order_data->prepay ) * $products_price,
                'last_price'     => $product_last_price, 
                'interest'      => $product_last_price*$interest_rate,
                'total_price'   => $this->totalAmount( $product_last_price, $interest->interest, $order_data->months, $interest->interest_period ),// to be completed
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
    
    
    
    
    
    
    public function userOrderHistory( $order_id, $request )
    {
        $data = [
            
            'order_id'      => $order_id,        
            'firstname'     => $request['firstname'],    
            'lastname'      => $request['lastname'],
            'gender'        => $request['gender'],
            'birth_date'    => Carbon::parse( $request['birth_date'] )->format('Y-m-d'),
            'address'       => $request['address'],
            'city_id'       => $request['city_id'],          
            'phone'         => $request['phone'],
            'personal_id'   => $request['pid'],
            'email'         => $request['email'],
            'company_id'    => 0,
            'social_id'     => $request['social_id'],
            'work_place'    => $request['work_place'],
            'bank_income'   => $request['bank_income'],
            'other_income'  => $request['other_income'],
            
        ];
        
        $added = DB::table('users_order_history')->insert( $data );
        
        if( !$added )
            return response()->json( "Failed To Seed user Order History Table", 400 );
    }
    
    
    
    
    
    
    
    
    
    //Send sms
    public function smssend( $phone, $message ){

        $maradit = new Maradit("hippo", "654555");
        $to_list = [$phone];
        $from = 'Hippo';
        $data_coding = 'Default';
        $response = $maradit->submit($to_list, $message, $from, null, null, $data_coding);


        if( $response->status )
            return $response->payload->MessageId;
        else
            return "Client error:".$response->error;

    }
    
    
}
