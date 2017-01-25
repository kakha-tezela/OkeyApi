<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Lcobucci\JWT\Configuration;
use JWTAuth;
use JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;



class UserController extends Controller
{

    
    
    public function register( Request $request )
    {
        return $request->all();
    }
    
    
    
    

    
    
    
    
    
    public function login( Request $request )
    {
        if( !$request->has('pid') OR !$request->has('password') )
            return response()->json("Data Is Missing",400);
        
        
        $user = User::where( 'personal_id', '=', $request->pid )
                    ->where( 'password', '=', $request->password )
                    ->first([ 'firstname','lastname','email','personal_id' ]);
        
        
        if( $user === null )
            return response()->json("User Not Found",404);
        
        return response()->json( $this->setToken( $user ), 200 );
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    public function checkUser( Request $request )
    {
        if( !$request->has( 'pid' ) )
            return response()->json( "Personal Id Not Provided", 404 );
        
        
        $user = User::where( 'personal_id', '=', $request->pid )->first();
        
        if( $user === null )
            return response()->json( "User Not Found", 404 );
        
        
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
        // Create Token for That User
        $token = JWTAuth::fromUser( $user );
        return $token;
    }
    
    
    
    
    
    
}
