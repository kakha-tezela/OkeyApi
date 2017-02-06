<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use Carbon\Carbon;

class AccountingController extends Controller
{
    
    public function accounting( $action = 0 )
    {
            // Get Active Orders
            $active_orders = Order::where( "status", "=", 1 )->get();

            
            foreach( $active_orders as $order ):
                
              $action = $action == 0 ? $this->action( $order->id ) : 'i';  
            
//            $data = [
//                
//                    "order_id"               => $order->id
//                    "action"                 => $action,
//                    "pay_date"               => $this->payDate( $action, $order->id ),
//                    "debt"                   =>
//                    "debt_left"              =>
//                    "principal"              =>
//                    "principal_payed"        =>
//                    "principal_left"         =>
//                    "interest"               =>
//                    "interest_payed"         =>
//                    "interest_left"          =>
//                    "primary_penalty"        =>
//                    "primary_penalty_payed"  =>
//                    "primary_penalty_left"   =>
//                    "day_penalty"            =>
//                    "day_penalty_total"      =>
//                    "day_penalty_payed"      =>
//                    "day_penalty_left"       =>
//                    "overdue_cnt"            =>
//                    "total_debt"             =>
//                    "total_debt_left"        =>
//                    "income_amount"          =>
//            ];
                      
            endforeach;
    }
    
    
    
    
    
    
    public function payDate( $action, $order_id )
    {
        
        if( $action == 's' ):
            

            $date = DB::table('schedule')->where( 'order_id', '=', $order_id )
                   ->where( 'pay_date', '=', Carbon::now()->format('Y-m-d') )
                   ->first(['pay_date']);
            

            if( $date === null )
                return "Schedule Date Not Found";
            
            $date = $date->pay_date;

            
        elseif( $action == 'i' ):
            
            
            $date = DB::table('incomes')->where( 'order_id', '=', $order_id )
                   ->where( 'date', '=', Carbon::now()->format('Y-m-d') )
                   ->first(['date']);
            
            
            if( $date === null )
                return "Income Date Not Found";
        
            $date = $date->date;
            
        else:
            $date = Carbon::now();

        
        endif;
        
        
        return $date;
    }
    
    
    
    
    
    
    
    
    public function action( $order_id )
    {
        // check if date is in schedule
        $cnt = DB::table('schedule')->where( 'order_id', '=', $order_id )
               ->where( 'pay_date', '=', Carbon::now()->format('Y-m-d') )
               ->count();
        
        if( $cnt == 1 )
            return 's';
        
        return 'c';
    }
    
    
    
    
    
    
    
    
    
}
