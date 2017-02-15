<?php

namespace App\Http\Controllers;
use App\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    
     
    public function login( Request $request )
    {
        
        if( !$request->has('username') OR !$request->has('password') )
            return response()->json( "Data Is Missing", 400 );
        
        
        $personal = Personal::where( 'username', '=', $request->username )
                    ->where( 'password', '=', $request->password )
                    ->first();
        
        
        if( $personal === null )
            return response()->json( "User Not Found ", 404 );
        
        //Set Token
        $obj = new UserController();
        $token = $obj->setToken( $personal );
        
        return response()->json( $token, 200 );
    }
    
    
    
    
    
}
