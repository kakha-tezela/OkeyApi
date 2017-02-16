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
        
        
        // take all active orders and loop through them
       
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
       
        
       // check order debts
        
       $updatedDebts = $this->checkDebts( $order->id, $action, $order->service_id );
       
       return $updatedDebts; 
       
        $data = [

             "order_id"               => $order->id,
             "action"                 => $action,
             "pay_date"               => $pay_date,
             "debt"                   => $updatedDebts['debt'],
             "debt_left"              => $updatedDebts['debt_left'], 
             "principal"              => $updatedDebts['principal'],
             "principal_payed"        => $updatedDebts['principal_payed'],
             "principal_left"         => $updatedDebts['principal_left'],
             "interest"               => $updatedDebts['interest'],
             "interest_payed"         => $updatedDebts['interest_payed'],
             "interest_left"          => $updatedDebts['interest_left'],
             "primary_penalty"        => $updatedDebts['primary_penalty'],
             "primary_penalty_payed"  => $updatedDebts['primary_penalty_payed'],
             "primary_penalty_left"   => $updatedDebts['primary_penalty_left'],
             "day_penalty"            => $updatedDebts['day_penalty'],
             "day_penalty_total"      => $updatedDebts['day_penalty_total'],
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
        
        // Check Order Debts Day Before
        $total_debt = DB::table('accounting')
                      ->where('order_id',$order_id)
                      ->orderBy('create_date','desc')
                      ->first(['total_debt_left']);
        
        if( $total_debt === null )
            return response()->json("Failed To Get Total Debt", 400);
        
        
        
        if( $action == "s" ):

            // Add principal and interest according to schedule
            
            $updatedDebts = $this->updateDebts( $order_id, $user_balance, $action );
            
            // if debt is not entirely covered add primary penalty
        
            if( $total_debt->total_debt_left == 0 && $updatedDebts['total_debt_left'] > 0 )
                return $this->AddPrimaryPenalty( $updatedDebts, $penalties['primary_penalty'] );
            
            
            return $updatedDebts;
            
        endif;
        
        
        if( $total_debt->total_debt_left > 0 )
           return $this->updateDebts( $order_id, $user_balance, $action );
        
        
        // If no debt detected return zeroes   
        return $this->noDebt( $user_balance, $order_id );
        
    }
    
    
    
    
    
    
    
    
    
    
    
    public function AddPrimaryPenalty( $updatedDebts, $primaryPenalty )
    {
        $updatedDebts['primary_penalty'] = $primaryPenalty;
        $updatedDebts['primary_penalty_payed'] = 0;
        $updatedDebts['primary_penalty_left'] = $primaryPenalty;
        $updatedDebts['total_debt'] += $primaryPenalty;
        $updatedDebts['total_debt_left'] += $primaryPenalty;
        
        return $updatedDebts;
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     
    public function updateDebts( $order_id, $amount, $action = null )
    {
        
        // check debts in accounts table day before
        
        $allDebts = DB::table('accounting')->where( 'order_id', '=', $order_id )
                    ->orderBy( 'create_date', 'desc' )
                    ->first([ 'day_penalty_left', 'primary_penalty_left', 'interest_left', 'principal_left', 'debt_left']);
        
        
        if( $allDebts === null )
            return response()->json( "Failed To Retrieve User Debts !", 400 );

        
        // Declare Variables
        
        $principal = $allDebts->principal_left;
        $principal_payed = 0;
        $principal_left = $allDebts->principal_left;
        $interest = $allDebts->interest_left;
        $interest_payed = 0;
        $interest_left = $allDebts->interest_left;
        $primary_penalty_payed = 0;
        $primary_penalty_left = $allDebts->primary_penalty_left;
        $day_penalty_payed = 0;
        $day_penalty_left = $allDebts->day_penalty_left;
        $balance_payed = 0;
        
        
        
        // if schedule increase principal and interest 
        
        if( $action == "s" ):
             $monthAmount = $this->monthAmount( $order_id, Carbon::now()->format( 'Y-m-d' ) );
             $principal += $monthAmount['principal'];
             $principal_left += $monthAmount['principal']; 
             $interest += $monthAmount['interest'];
             $interest_left += $monthAmount['interest'];
        endif;
        
        
        
        
        
        // check if balance > 0
        
        // Update Day Penalty
        
        $updatedDayPenalty = $this->deayPenaltyCalc( $amount, $day_penalty_left, $day_penalty_payed, $balance_payed, $allDebts->day_penalty_left, $action, $allDebts->debt_left, $order_id );
        $day_penalty = $updatedDayPenalty['day_penalty'];
        $day_penalty_payed = $updatedDayPenalty['day_penalty_payed'];
        $day_penalty_left = $updatedDayPenalty['day_penalty_left'];
        $day_penalty_total = $updatedDayPenalty['day_penalty_total'];
        $balance_payed = $updatedDayPenalty['balance_payed'];
        $amount = $updatedDayPenalty['amount'];
            
        
        
        
        // Update Primary Penalty
        
        if( $amount > 0 ):
            
            $updatedPrimaryPenalty = $this->primaryPenaltyCalc( $updatedDayPenalty['amount'], $primary_penalty_left, $primary_penalty_payed, $updatedDayPenalty['balance_payed'], $allDebts->primary_penalty_left );
            $primary_penalty_payed = $updatedPrimaryPenalty['primary_penalty_payed'];
            $primary_penalty_left = $updatedPrimaryPenalty['primary_penalty_left'];
            $balance_payed = $updatedPrimaryPenalty['balance_payed'];
            $amount = $updatedPrimaryPenalty['amount'];
        
        endif;

        
        
        // Update Interest
        
        if( $amount > 0 ):
            
            $updatedInterest = $this->interestCalc( $updatedPrimaryPenalty['amount'], $interest_left, $interest_payed, $updatedPrimaryPenalty['balance_payed'], $interest );
            $interest = $updatedInterest['interest'];
            $interest_payed = $updatedInterest['interest_payed'];
            $interest_left = $updatedInterest['interest_left'];
            $balance_payed = $updatedInterest['balance_payed'];
            $amount = $updatedInterest['amount'];
            
        endif;
        
        
        
        // Update Principal
        
        if( $amount > 0 ):
            
            $updatedPrincipal = $this->principalCalc( $updatedInterest['amount'], $principal_left, $principal_payed, $updatedInterest['balance_payed'], $principal );
            $principal = $updatedPrincipal['principal'];
            $principal_payed = $updatedPrincipal['principal_payed'];
            $principal_left = $updatedPrincipal['principal_left'];
            $balance_payed = $updatedPrincipal['balance_payed'];
            $amount = $updatedPrincipal['amount'];
            
        endif;

        
        
        // Define Total Debt And Total Debt Left
        
        $totalDebt = $allDebts->day_penalty_left + $allDebts->primary_penalty_left + $interest + $principal + $day_penalty;
        $totalDebtLeft = $day_penalty_left + $primary_penalty_left + $interest_left + $principal_left;
        
        
        
        // return updated values
        
        return [
            
            'balance_left'           => $amount,
            'balance_payed'          => $balance_payed,
            'day_penalty'            => $day_penalty,
            'day_penalty_total'      => $day_penalty_total,
            'day_penalty_payed'      => $day_penalty_payed,
            'day_penalty_left'       => $day_penalty_left,
            'primary_penalty'        => $allDebts->primary_penalty_left,
            'primary_penalty_payed'  => $primary_penalty_payed, 
            'primary_penalty_left'   => $primary_penalty_left,
            'interest'               => $interest,
            'interest_payed'         => $interest_payed,
            'interest_left'          => $interest_left,
            'principal'              => $principal,
            'principal_payed'        => $principal_payed, 
            'principal_left'         => $principal_left,
            'total_debt'             => $totalDebt,
            'total_debt_left'        => $totalDebtLeft,
            'debt'                   => $interest + $principal, // to be checked
            'debt_left'              => $principal_left + $interest_left,
            'order_id'               => $order_id,
        ];
        
    }
    

    
    
    
    
    
    
    
    
    
    
    
    

    
    // Penalty Calculation Functions
    
    public function deayPenaltyCalc( $amount, $day_penalty_left, $day_penalty_payed, $balance_payed, $day_before_penalty, $action, $debt_left, $order_id  )
    {
        $day_penalty = 0;
        
        if( $action == "c" || $action == "s" && $debt_left > 0 ):
            
            // get day penalty percent by service id
            $service_id = Order::where( 'id', $order_id )->first(['service_id']);
            
            if( $service_id === null )
                return response()->json( "Failed TO Get Service Id", 400 );
            
            
            // Calculate Day Penalty
            $dayPenaltyPercent = $this->getServicePenalties( $service_id->service_id );
            $day_penalty = $debt_left * $dayPenaltyPercent['day_penalty_percent'] / 100;

        endif;
        
        
        
        if( $amount >= ( $day_before_penalty + $day_penalty ) )
        {
            $amount -= ( $day_before_penalty + $day_penalty );
            $day_penalty_left = 0;
            $day_penalty_payed = ( $day_before_penalty + $day_penalty );
            $balance_payed += ( $day_before_penalty + $day_penalty );
        }
        else
        {
            $day_penalty_left = ( $day_before_penalty + $day_penalty ) - $amount;
            $day_penalty_payed = $amount;
            $balance_payed += $amount;
            $amount = 0;
        }
        
        
        return [
                    'amount'             => $amount,
                    'day_penalty'        => $day_penalty,
                    'day_penalty_total'  => $day_before_penalty + $day_penalty,
                    'day_penalty_left'   => $day_penalty_left,
                    'day_penalty_payed'  => $day_penalty_payed,
                    'balance_payed'      => $balance_payed,
               ];
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function primaryPenaltyCalc( $amount, $primary_penalty_left, $primary_penalty_payed, $balance_payed, $day_before_penalty )
    {
        
        if( $amount >= $day_before_penalty )
        {
            $amount -= $day_before_penalty;
            $primary_penalty_left = 0;
            $primary_penalty_payed = $day_before_penalty;
            $balance_payed += $day_before_penalty; 
        }
        else
        {
            $primary_penalty_left = $day_before_penalty - $amount;
            $primary_penalty_payed = $amount;
            $balance_payed += $amount;
            $amount = 0;
        }
            
        
        return [
                    'amount'                    => $amount,
                    'primary_penalty_left'      => $primary_penalty_left,
                    'primary_penalty_payed'     => $primary_penalty_payed,
                    'balance_payed'             => $balance_payed,
               ];
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function interestCalc( $amount, $interest_left, $interest_payed, $balance_payed, $day_before_penalty )
    {
            
        if( $amount >= $day_before_penalty )
        {
            $amount -= $day_before_penalty;
            $interest_left = 0;
            $interest_payed = $day_before_penalty;
            $balance_payed += $day_before_penalty; 
        }
        else
        {
            $interest_left = $day_before_penalty - $amount;
            $interest_payed = $amount;
            $balance_payed += $amount;
            $amount = 0;
        }
            
        
        return [
                   'amount'           => $amount,
                   'interest'         => $day_before_penalty,
                   'interest_left'    => $interest_left,
                   'interest_payed'   => $interest_payed,
                   'balance_payed'    => $balance_payed,
              ];
    }
    
    
    
    
    
    
    
    
    
    public function monthAmount( $order_id, $pay_date )
    {
        $monthAmounts = DB::table('schedule')->where('order_id', $order_id )->where( 'pay_date', $pay_date )->first(['principal','interest']);
        
        if( $monthAmounts === null )
            return response()->json( "Failed To Get Month Amount", 400 );
        
        return [ "principal" => $monthAmounts->principal, "interest" => $monthAmounts->interest ];
    }

    
    
    
    
    
    
    
    

    
    
    public function principalCalc( $amount, $principal_left, $principal_payed, $balance_payed, $day_before_penalty )
    {
        
        if( $amount >= $day_before_penalty )
        {
            $amount -= $day_before_penalty;
            $principal_left = 0;
            $principal_payed = $day_before_penalty;
            $balance_payed += $day_before_penalty;
        }
        else
        {
            $principal_left = $day_before_penalty - $amount;
            $principal_payed = $amount;
            $balance_payed += $amount;
            $amount = 0;
        }
        
        
        return  [
                   'amount'           => $amount,
                   'principal'        => $day_before_penalty,
                   'principal_left'   => $principal_left,
                   'principal_payed'  => $principal_payed,
                   'balance_payed'    => $balance_payed,
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
