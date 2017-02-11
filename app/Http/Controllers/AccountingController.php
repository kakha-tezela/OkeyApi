<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\User;
use Carbon\Carbon;

class AccountingController extends Controller
{
    
    
    
    public function accountSeederCheck()
    {
        $action = "c";
        $pay_date = Carbon::now()->format('Y-m-d');
        
       // take all active orders and account them
       
        $order = Order::where('id',6)->first(['id','service_id']);

        
       // check if order has shcedule
       
       $scheduleDates = DB::table('schedule')->where( 'order_id', $order->id )->get(['pay_date']);
       
       foreach( $scheduleDates as $date ):

           if( Carbon::now()->format( 'Y-m-d' ) == $date->pay_date ):
               
               $action = "s";
               $pay_date = $date->pay_date;
            
               break;
            
            endif;

        endforeach;
       
       
       $updatedDebts = $this->checkDebts( $order->id, $action, $order->service_id );
       
       return $updatedDebts; 
       
        $data = [

             "order_id"               => $order->id,
             "action"                 => $action,
             "pay_date"               => $pay_date,
             "debt"                   => $updatedDebts['debt'],
             "debt_left"              => $updatedDebts['principal_left'] + $updatedDebts['interest_left'], 
             "principal"              => $updatedDebts['principal'],
             "principal_payed"        => $updatedDebts['principal_payed'],
             "principal_left"         => $updatedDebts['principal_left'],
             "interest"               => $updatedDebts['interest'],
             "interest_payed"         => $updatedDebts['interest_payed'],
             "interest_left"          => $updatedDebts['interest_left'],
             "primary_penalty"        => $updatedDebts['primary_penalty'],
             "primary_penalty_payed"  => $updatedDebts['primary_penalty_payed'],
             "primary_penalty_left"   => $updatedDebts['primary_penalty_left'],
             "day_penalty"            => isset( $updatedDebts['day_penalty_added'] ) ? $updatedDebts['day_penalty'] : 0,
             "day_penalty_total"      => isset( $updatedDebts['day_penalty_total'] ) ? $updatedDebts['day_penalty_total'] :  $updatedDebts['day_penalty'],
             "day_penalty_payed"      => $updatedDebts['day_penalty_payed'],
             "day_penalty_left"       => $updatedDebts['day_penalty_left'],
             "overdue_cnt"            => 0, // to be completed
             "total_debt"             => $updatedDebts['total_debt'],
             "total_debt_left"        => $updatedDebts['total_debt_left'],
             "income_amount"          => $updatedDebts['balance_payed'],
        ];
            
            
        return $data;
    }
    
    
    
    
    
    
    
    
    
    
    public function userBalance( $order_id )
    {
         // Get User Balance
        $user_id = Order::where('id',$order_id)->first(['user_id']);
        
        if( $user_id === null )
            return response()->json( "Failed To Get User Id", 400 );
        
        $user_balance = User::where( 'id', $user_id->user_id )->first(['balance']);

        if( $user_balance === null )
            return response()->json( "Failed To Get User Balance", 400 );
        
        
        return $user_balance->balance;
    }
    
    
    
    
    
    
    public function getServicePenalties( $service_id )
    {
         // Get Penalty Values For Particular Service
        $penalties = DB::table('services')->where( 'id', $service_id )->first(['primary_penalty','day_penalty_percent']);
        
        if( $penalties === null )
            return response()->json("Failed To Get Primary Penalty");
        
        return [ 'primary_penalty' => $penalties->primary_penalty, 'day_penalty_percent' => $penalties->day_penalty_percent ];
    }
    
    
    
    
    
    
    
    
    public function checkDebts( $order_id, $action, $service_id )
    {
        $user_balance = $this->userBalance( $order_id );
        $penalties = $this->getServicePenalties( $service_id );
        
        
        if( $action == "s" ):

            $updatedDebts = $this->updateDebts( $order_id, $user_balance );
            
            // if debt is not entirely covered add primary penalty

            if( $updatedDebts['principal_left'] > 0 )
                return $this->primaryPenlty( $updatedDebts, $penalties['primary_penalty'] );
            
            return $updatedDebts;
            
        endif;
        
            
        // check order debts
        $total_debt = DB::table('accounting')
                      ->where('order_id',$order_id)
                      ->orderBy('create_date','desc')
                      ->first(['total_debt_left']);
        
        if( $total_debt === null )
            return response()->json("Failed To Get Total Debt", 400);

        
        if( $total_debt->total_debt_left > 0 ):

           $updatedDebts = $this->updateDebts( $order_id, $user_balance );
        
           // Calculate Day Penalty
           if( $updatedDebts['primary_penalty'] == 0 )
                return $this->dayPenalty( $updatedDebts, $penalties['day_penalty_percent'] );
           
           return $updatedDebts;
               
        endif;
            
        return $this->noDebt( $user_balance, $order_id );
        
    }
    
    
    
    
    
    
    
    
    
    
    
    public function noDebt( $user_balance, $order_id )
    {
        return [
                    "balance_left"          => $user_balance,
                    "balance_payed"         => 0,
                    "day_penalty"           => 0,
                    "day_penalty_payed"     => 0,
                    "day_penalty_left"      => 0,
                    "primary_penalty"       => 0,
                    "primary_penalty_payed" => 0,
                    "primary_penalty_left"  => 0,
                    "interest"              => 0,
                    "interest_payed"        => 0,
                    "interest_left"         => 0,
                    "principal"             => 0,
                    "principal_payed"       => 0,
                    "principal_left"        => 0,
                    "total_debt"            => 0,
                    "total_debt_left"       => 0,
                    "debt"                  => 0,
                    "order_id"              => $order_id,
                ];
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function dayPenalty( $updatedDebts, $dayPenaltyPercent )
    {
        // Calculate Day Penalty
        $day_penalty = $updatedDebts['principal_left'] * $dayPenaltyPercent / 100;

        $updatedDebts['day_penalty_total'] = $updatedDebts['day_penalty'] + $day_penalty;
        $updatedDebts['day_penalty'] = $day_penalty;
        $updatedDebts['day_penalty_added'] = true;
        $updatedDebts['day_penalty_payed'] = 0;
        $updatedDebts['day_penalty_left'] = $day_penalty;
        $updatedDebts['total_debt'] += $day_penalty;
        $updatedDebts['total_debt_left'] += $day_penalty;
        
        return $updatedDebts;
    }
    
    
    
    
    
    
    
    
    
    
    // to be checked
    
    public function primaryPenlty( $updatedDebts, $primaryPenalty )
    {
        
        if( $updatedDebts['total_debt_left'] > 0 ):
            
            $updatedDebts['primary_penalty'] = 0;
            $updatedDebts['primary_penalty_payed'] = 0;
            $updatedDebts['primary_penalty_left'] = 0;
        
            return $updatedDebts;
        
        endif;
            
        
        // Add Primary Penalty
        $updatedDebts['primary_penalty'] = $primaryPenalty;
        $updatedDebts['primary_penalty_payed'] = 0;
        $updatedDebts['primary_penalty_left'] = $primaryPenalty;
        $updatedDebts['total_debt'] += $primaryPenalty;
        $updatedDebts['total_debt_left'] += $primaryPenalty;
        
        return $updatedDebts;
    }
















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
        
        
        // Get Income Date
        
        $id = DB::table('incomes')->insertGetId( $row );
        $income_date = DB::table('incomes')->where( 'id', $id )->first(['date']);
        
        if( $income_date === null )
            return reposne()->json( "Failed To Get Income Date", 400 );
        
        
       
        // Update User balance And Log Operation In Balance History Table
        $balance = $this->userBalanceUpdater( $data['user_id'], $data['amount'], true );
        $this->balanceLogger( $data['user_id'], "in", $data['amount'], $balance );
        
        
        // Check total_debt_left
        $total_debt = DB::table('accounting')->where( 'order_id', '=', $data['order_id'] )
                      ->orderBy( 'create_date', 'desc' )
                      ->first(['total_debt_left']);
        
        
        if( $total_debt === null )
            return response()->json( "Failed To Get User Total Debt !", 404 );
        
        
        
        
        if( $total_debt->total_debt_left > 0 ):
            
            // Update User Debts
            $updatedDebts = $this->updateDebts( $data['order_id'], $balance );
            
            // Update User balance And Log Operation In Balance History Table
            $this->userBalanceUpdater( $data['user_id'], $updatedDebts['balance_left'], false );
            $this->balanceLogger( $data['user_id'], "out", $updatedDebts['balance_payed'], $updatedDebts['balance_left'] );

            // Seed In Account
            return $this->accountSeederIncome( $updatedDebts, $income_date->date );
            
        endif;
        
    }
    
    
    
    
    
    
    
    
     
    public function updateDebts( $order_id, $amount )
    {
        
        
        // check debts in accounts table day before
        
        $allDebts = DB::table('accounting')->where( 'order_id', '=', $order_id )
                    ->orderBy( 'create_date', 'desc' )
                    ->first([ 'day_penalty_left', 'primary_penalty_left', 'interest_left', 'principal_left', 'debt_left']);
        
        
        if( $allDebts === null )
            return response()->json( "Failed To Retrieve User Debts !", 400 );

        

        $balance_payed = 0;
        $principal_left = $allDebts->principal_left;
        $principal_payed = 0;
        $interest_payed = 0;
        $interest_left = $allDebts->interest_left;
        $primary_penalty_payed = 0;
        $primary_penalty_left = $allDebts->primary_penalty_left;
        $day_penalty_payed = 0;
        $day_penalty_left = $allDebts->day_penalty_left;
        
        
        
        // Update Day Penalty
        if( $amount >= $allDebts->day_penalty_left )
        {
            $amount -= $allDebts->day_penalty_left;
            $day_penalty_left = 0;
            $day_penalty_payed = $allDebts->day_penalty_left;
            $balance_payed += $allDebts->day_penalty_left;
            
        }
        else
        {
            $day_penalty_left = $allDebts->day_penalty_left - $amount;
            $day_penalty_payed = $amount;
            $balance_payed += $amount;
            $amount = 0;
        }
        
        

        
        // Update Primary Penalty
        if( $amount != 0 ):
            
            if( $amount >= $allDebts->primary_penalty_left )
            {
                $amount -= $allDebts->primary_penalty_left;
                $primary_penalty_left = 0;
                $primary_penalty_payed = $allDebts->primary_penalty_left;
                $balance_payed += $allDebts->primary_penalty_left; 
            }
            else
            {
                $primary_penalty_left = $allDebts->primary_penalty_left - $amount;
                $primary_penalty_payed = $amount;
                $balance_payed += $amount;
                $amount = 0;
            }
            
        endif;


        
        
        // Update Interest
        if( $amount != 0 ):
            
            if( $amount >= $allDebts->interest_left )
            {
                $amount -= $allDebts->interest_left;
                $interest_left = 0;
                $interest_payed = $allDebts->interest_left;
                $balance_payed += $allDebts->interest_left; 
            }
            else
            {
                $interest_left = $allDebts->interest_left - $amount;
                $interest_payed = $amount;
                $balance_payed += $amount;
                $amount = 0;
            }
            
        endif;
        
        
        
        // Update Principal
        if( $amount != 0 ):
            
            if( $amount >= $allDebts->principal_left )
            {
                $amount -= $allDebts->principal_left;
                $principal_left = 0;
                $principal_payed = $allDebts->principal_left;
                $balance_payed += $allDebts->principal_left;
            }
            else
            {
                $principal_left = $allDebts->principal_left - $amount;
                $principal_payed = $amount;
                $balance_payed += $amount;
                $amount = 0;
            }
            
        endif;

        
        // Define Total Debt And Total Debt Left
        
        $totalDebt = $allDebts->day_penalty_left + $allDebts->primary_penalty_left + $allDebts->interest_left + $allDebts->principal_left;
        $totalDebtLeft = $day_penalty_left + $primary_penalty_left + $interest_left + $principal_left;
        
        
        
        // return updated values
        
        return [
            
            'balance_left'           => $amount,
            'balance_payed'          => $balance_payed,
            'day_penalty'            => $allDebts->day_penalty_left,
            'day_penalty_payed'      => $day_penalty_payed,
            'day_penalty_left'       => $day_penalty_left,
            'primary_penalty'        => $allDebts->primary_penalty_left,
            'primary_penalty_payed'  => $primary_penalty_payed, 
            'primary_penalty_left'   => $primary_penalty_left,
            'interest'               => $allDebts->interest_left,
            'interest_payed'         => $interest_payed,
            'interest_left'          => $interest_left,
            'principal'              => $allDebts->principal_left,
            'principal_payed'        => $principal_payed, 
            'principal_left'         => $principal_left,
            'total_debt'             => $totalDebt,
            'total_debt_left'        => $totalDebtLeft,
            'debt'                   => $allDebts->debt_left,
            'order_id'               => $order_id,
        ];
        
        
    }
    


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function accountSeederIncome( $updatedDebts, $income_date )
    {
        
        // order id passed by income seeder function
        
        $data = [
            
            "order_id"                  =>  $updatedDebts['order_id'], 
            "action"                    =>  "i",
            "pay_date"                  =>  $income_date,
            "debt"                      =>  $updatedDebts['debt'], 
            "debt_left"                 =>  $updatedDebts['principal_left'] + $updatedDebts['interest_left'], 
            "principal"                 =>  $updatedDebts['principal'],
            "principal_payed"           =>  $updatedDebts['principal_payed'],
            "principal_left"            =>  $updatedDebts['principal_left'],  
            "interest"                  =>  $updatedDebts['interest'], 
            "interest_payed"            =>  $updatedDebts['interest_payed'], 
            "interest_left"             =>  $updatedDebts['interest_left'],
            "primary_penalty"           =>  $updatedDebts['primary_penalty'], 
            "primary_penalty_payed"     =>  $updatedDebts['primary_penalty_payed'], 
            "primary_penalty_left"      =>  $updatedDebts['primary_penalty_left'],
            "day_penalty"               =>  0,
            "day_penalty_total"         =>  $updatedDebts['day_penalty'], 
            "day_penalty_payed"         =>  $updatedDebts['day_penalty_payed'],
            "day_penalty_left"          =>  $updatedDebts['day_penalty_left'],
            "overdue_cnt"               =>  3, // to be completed
            "total_debt"                =>  $updatedDebts['total_debt'],
            "total_debt_left"           =>  $updatedDebts['total_debt_left'],
            "income_amount"             =>  $updatedDebts['balance_payed'],
            
        ];
        
        
        $added = DB::table('accounting')->insert( $data );
        
        if( !$added )
            return response()->json( "Failed To Account Income", 400 );
        
            return response()->json( "Operation Succesfull !", 200 );
        
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
    
    
    
    
    
    
    
    
    
    
    
   
    
    
}
