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
        $balance = $this->userBalanceUpdater( $data['user_id'], $data['amount'], true );
        
        
        // Log Operation In Balance History Table
        $this->balanceLogger( $data['user_id'], "in", $data['amount'], $balance );
        
        
        // Update Debts And Get User Balance
        $updatedDebts = $this->updateDebts( $data['user_id'], $data['order_id'], $balance );
        
        
        // Update User balance 
        $this->userBalanceUpdater( $data['user_id'], $updatedDebts['balance_left'], false );
        
        
        // Log Operation In Balance History Table
        $this->balanceLogger( $data['user_id'], "out", $updatedDebts['balance_payed'], $updatedDebts['balance_left'] );
        
    }
    
    
    
    
    
    
    
    
    
    public function balanceLogger( $user_id, $action, $amount, $balance )
    {
        $data = [
            'user_id'   => $user_id,
            'action'    => $action,
            'amount'    => $amount,
            'balance'   => $balance,
        ];
        
        $added = DB::table('balance_history')->insert( $data );
        
        if( !$added )
            return response()->json( "Failed To Seed Balance History !", 400 );
    }
    
    
    
    
    
//        elseif( $action == "out" )
//        {
//            if( $balance >= $amount )
//                $balance -= $amount;
//            else
//                $balance = 0;
//        }
    
    
    
    
    
    
    
    
    
    
    public function userBalanceUpdater( $user_id, $amount, $increase )
    {
        
        if( !$increase ):
            
            $updated = User::where( 'id', '=', $user_id )->update([
                            'balance' => $amount,
                        ]);
        
            if( !$updated )
                return response()->json( "Failed To Update User Balance !", 400 );
        
            return $amount; 
            
        endif;
        
        
        
         // Get User balance
        $balance = User::where( 'id', '=', $user_id )->first(['balance']);
        
        if( $balance === null )
            return response()->json( "Failed To Get User Balance !", 400 );
        
        
        
        // Update User balance
        
        $update = User::where('id', '=', $user_id )->update([
            'balance' => $balance->balance + $amount,
        ]);
        
        if( !$update )
            return response()->json( "Failed To Update User Balance !", 404 );
        
        
        return $balance->balance + $amount;
    
    }
    
    
    
    
    
    
    
    
    
    
    public function updateDebts( $user_id, $order_id, $amount )
    {
        // Check total_debt_left
        $total_debt = DB::table('accounting')->where( 'order_id', '=', $order_id )
                      ->orderBy( 'create_date', 'desc' )
                      ->first([ 'total_debt_left']);
        
        
        if( $total_debt === null )
            return response()->json( "Failed To Get User Total Debt !", 404 );
        
        
        
        if( $total_debt->total_debt_left == 0 )
            return [ 'amount' => $amount, 'day_penalty_left' => null, 'primary_penalty_left' => null, 'interest_left' => null, 'principal_left' => null ];
        
        
        
        $principal = null;
        $interest = null;
        $primary_penalty = null;
        $day_penalty = null;
        $balance_payed = 0;
        
        
        // check debts in accounts table day before
        
        $allDebts = DB::table('accounting')->where( 'order_id', '=', $order_id )
                    ->orderBy( 'create_date', 'desc' )
                    ->first([ 'day_penalty_left', 'primary_penalty_left', 'interest_left', 'principal_left']);
        
        
        if( $allDebts === null )
            return response()->json( "Failed To Retrieve User Debts !", 400 );

        

        
        
        // Update Day Penalty
        if( $amount >= $allDebts->day_penalty_left )
        {
            $amount -= $allDebts->day_penalty_left;
            $day_penalty = 0;
            $balance_payed += $allDebts->day_penalty_left;
            
        }
        else
        {
            $day_penalty = $allDebts->day_penalty_left - $amount;
            $balance_payed += $amount;
            $amount = 0;
        }
        

        

        
        // Update Primary Penalty
        if( $amount != 0 ):
            
            if( $amount >= $allDebts->primary_penalty_left )
            {
                $amount -= $allDebts->primary_penalty_left;
                $primary_penalty = 0;
                $balance_payed += $allDebts->primary_penalty_left; 
            }
            else
            {
                $primary_penalty = $allDebts->primary_penalty_left - $amount;
                $balance_payed += $amount;
                $amount = 0;
            }
            
        endif;


        
        
        // Update Interest
        if( $amount != 0 ):
            
            if( $amount >= $allDebts->interest_left )
            {
                $amount -= $allDebts->interest_left;
                $balance_payed += $allDebts->interest_left; 
                $interest = 0;
            }
            else
            {
                $interest = $allDebts->interest_left - $amount;
                $balance_payed += $amount;
                $amount = 0;
            }
            
        endif;
        
        
        
        // Update Principal
        if( $amount != 0 ):
            
            if( $amount >= $allDebts->principal_left )
            {
                $amount -= $allDebts->principal_left;
                $balance_payed += $allDebts->principal_left;
                $principal = 0;
            }
            else
            {
                $principal = $allDebts->principal_left - $amount;
                $balance_payed += $amount;
                $amount = 0;
            }
            
        endif;

        
        // return updated values
        return [ 'balance_left' => $amount, 'balance_payed' => $balance_payed, 'day_penalty_left' => $day_penalty, 'primary_penalty_left' => $primary_penalty, 'interest_left' => $interest, 'principal_left' => $principal ];

    }
    
    
    
    
    
    
    
    
    
    
    
    
   
    
}