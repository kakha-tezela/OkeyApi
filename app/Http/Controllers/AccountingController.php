<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\User;
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
    
    
    
    
    
    
    public function emulator( Request $request )
    {
        $data = [
            
            'pid'           => $request->pid,
            'user_id'       => $request->user_id,
            'order_id'      => $request->order_id,
            'amount'        => $request->amount,
            'p_method_id'   => $request->p_method_id,
            
        ];
        
        
        return $this->incomeSeeder( $data );
        
    }
    
    
    
    
    
    
    public function incomeSeeder( $data )
    {
        $row = [
            
            'pid'           => $data['pid'],
            'user_id'       => $data['user_id'],
            'order_id'      => $data['order_id'],
            'amount'        => $data['amount'],
            'p_method_id'   => $data['p_method_id'],
        ];
        
        $added = DB::table('incomes')->insert( $row );
        
        if( !$added )
            return response()->json( "Failed To Seed Income !", 400 );
        
        
        // Update User balance
        
        $balance = User::where( 'id', '=', $data['user_id'] )->first(['balance']);
        
        if( $balance === null )
            return response()->json( "Failed To Get User Balance !", 404 );
        
        
        $update = User::where('id', '=', $data['user_id'] )->update([
            'balance' => $balance + $data['amount'],
        ]);
        
        
        if( $update === null )
            return response()->json( "Failed To Update User Balance !", 404 );
        
        
        // Log Operation In Balance History Table
        
        
        
        // check debt in orders table
        Order::where( 'id', '=', $data['order_id'] )->first(['']);
        
    }
    
    
    
    
    
    
    
    public function balanceLogger( $user_id, $amount )
    {
        // Get User Balance
        $balance = User::where( 'id', '=', $user_id )->first(['balance']);
        
        if( $balance === null )
            return response()->json( "Failed To Get User Balance !", 404 );
        
        
        $data = [
            'user_id'   => $user_id,
            'action'    => "in",
            'amount'    => $amount,
            'balance'   => $balance = $balance->balance + $amount,
        ];
        
        $added = DB::table('balance_history')->insert( $data );
        
        if( !$added )
            return response()->json( "Failed To Seed Balance History !", 400 );
    }
    
    
    
    
    
    
}
