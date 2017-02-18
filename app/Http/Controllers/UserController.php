<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Lcobucci\JWT\Configuration;
use JWTAuth;
use App\Repositories\Maradit;
use JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{

    
    
    
    public function test()
    {
        return $password = bcrypt(25011987);
    }
    
    
    
    
    
    
    
    
    public function register( Request $request )
    {
       
        $user = new User;
        $user->person_status = $request->sp == true ? "I" : "P";
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->gender = $request->gender;
        $user->birth_date = Carbon::parse( $request->birth_date )->format('Y-m-d');
        $user->citizenship = $request->citizenship;
        $user->reg_address = $request->reg_address;
        $user->phys_address = $request->phys_address;
        $user->city_id = $request->city_id;
        $user->phone = $request->phone;
        $user->pid_number = $request->pid_number;
        $user->personal_id = $request->pid;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->company_id = 0;
        $user->social_id = $request->social_id;
        $user->politic_person = $request->politic_person;
        $user->work_place = $request->work_place;
        $user->salary_id = $request->salary_id;
        $user->balance = 0;
        $user->status = 1;
        
        
        if( !$user->save() )
            return response()->json("Failed To Seed Users Table", 400 );
        
        
        //Seed sp_users table
        if( $request->sp == true ):
            
            if( !$request->has( 'reg_number' ) OR !$request->has( 'reg_date' ) OR !$request->has( 'reg_org' ) )
                            return response()->json(" SP Information Missing ", 400 );
            
            $this->spUsersSeeder( $user->id, $request->reg_number, $request->reg_date, $request->reg_org );
        
        endif;
        
        
        //Seed orders Table
        $order = new OrderController();
        return $order->addOrder( $user->id, $request->all() );
    }
    
    
    
    
    
    
    
    public function spUsersSeeder( $user_id, $reg_number, $reg_date, $reg_org  )
    {
        $data = [
            
            'user_id'     => $user_id,
            'reg_number'  => $reg_number,
            'reg_date'    => Carbon::parse( $reg_date )->format("Y-m-d"),   
            'reg_org'     => $reg_org   
        
        ];
        
        return DB::table('sp_users')->insert( $data );
    }
    
    

    
    
    
    
    
    public function login(Request $request){
        if( !$request->has('pid') OR !$request->has('password') )
            return response()->json("Data Is Missing",400);
        // Get password
        $password = User::where('personal_id', $request->pid )
            ->first(['password']);
         if( $password === null )
            return response()->json("User Not Found",404);
        if(Hash::check($request->password, $password->password)){
        // Check Password
        $user = User::select('id','person_status','firstname','lastname','citizenship','gender','birth_date','reg_address','phys_address','city_id','phone','pid_number','personal_id','email','username','company_id','social_id','politic_person','work_place','salary_id')
                ->where('personal_id','=',$request->pid)
                ->first();
        }else{
            return response()->json("User Not Found",404);
        }

        $result['token'] = $this->setToken($user);
        $result['user'] = $user;
        return response()->json( $result, 200 );   
    }
    
    public function checkUser( Request $request ){
        if(!$request->has('pid'))//IF is not request personal ID
            return response()->json("Personal Id Not Provided",404);
        
        $user = User::where('personal_id','=',$request->pid)->first();
        
        if($user === null)
            return response()->json("User Not Found",404);
        
        return response()->json( "OK", 200 );
    }
 
    
    public function userData( Request $request )
    {
        if( !$request->has( 'pid' ) )
            return response()->json( "Personal Id Not Provided", 404 );
        
        $user = User::where( 'personal_id', '=', $request->pid )->first();
        
        if( $user === null )
            return response()->json( "User Not Found", 404 );
        
        
        return response()->json( $user, 200 );
    }
    
    
    
    
    
    
    
    // Check Token
    public function getAuthenticatedUser(){
        
        try
        {
           if ( !$result = JWTAuth::parseToken()->authenticate() )
                $result = 'user_not_found';
        }
        catch ( TokenExpiredException $e ){
            $result = 'token_expired';
        }
        catch ( TokenInvalidException $e ){
            $result = 'token_invalid';
        }
        catch ( JWTException $e ){
            $result = 'token_absent';
        }
        return $result;
    }
    
    
    
    
    
     // set token
    public function setToken( $user )
    {
        return JWTAuth::fromUser( $user );
    }
    
    
}
