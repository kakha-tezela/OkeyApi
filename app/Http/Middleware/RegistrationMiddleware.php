<?php

namespace App\Http\Middleware;
use Validator;
use Closure;

class RegistrationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
         
        $validator = Validator::make( $request->all(),[
            
                'firstname'   => 'bail|required|alpha',
                'lastname'    => 'bail|required|alpha',
                'email'       => 'bail|required|email|unique:users',
                'phone'       => 'bail|required|unique:users|digits_between:9,9|regex:/^5/',
                'gender'      => 'bail|required|digits_between:1,1',
                'year'        => 'required|digits_between:1,1',   
                'month'       => 'required|digits_between:1,1',   
                'day'         => 'required|digits_between:1,1',   
                'address'     => 'required',
                'city_id'     => 'bail|required|digits_between:1,1',
                'pid'         => 'bail|unique:users,personal_id|digits_between:11,11',
                'username'    => 'bail|unique:users,username',
                'password'    => 'bail|required',
                'company_id'  => 'bail|required|digits_between:1,1',
                'social_id'   => 'bail|required|digits_between:1,1',
                'work_place'  => 'bail|required',
                'salary_id'   => 'bail|required|digits_between:1,1',
                'status'      => 'bail|required|digits_between:1,1',
        ]);

        
        
        
         
        if( $validator->fails() )
        {
            
            $failed = $validator->failed();
            
            
            //Detect which rule caused fail
            
            if( isset( $failed['firstname'] ) ):
            
                
                if( isset( $failed['firstname']['Required'] ) )
                {
                   return response()->json( "Firstname Missing", 400 );
                }
                elseif( isset( $failed['firstname']['Alpha'] ) )
                {
                   return response()->json( "Firstname Not Alphabetical", 400 );
                }

            endif;




            if( isset( $failed['lastname'] ) ):
            
                
                if( isset( $failed['lastname']['Required'] ) )
                {
                    return response()->json( "Lastname Missing", 400 );                   
                }
                elseif( isset( $failed['lastname']['Alpha'] ) )
                {
                    return response()->json( "Lastname Not Alphabetical", 400 );
                }

            endif;





            if( isset( $failed['email'] ) ):
            
                
                if( isset( $failed['email']['Required'] ) )
                {
                    return response()->json( "Email Missing", 400 );
                }
                elseif( isset( $failed['email']['Email'] ) )
                {
                    return response()->json( "Email Incorrect Format", 400 );
                }
                elseif( isset( $failed['email']['Unique'] ) )
                {
                    return response()->json( "Email Exists", 400 );
                }

            endif;


            
            
            if( isset( $failed['phone'] ) ):
                
                if( isset( $failed['phone']['Required'] ) )
                {
                   return response()->json( "Phone Missing", 400 );
                }
                elseif( isset( $failed['phone']['Unique'] ) )
                {
                   return response()->json( "Phone Exists", 400 );
                }
                elseif( isset( $failed['phone']['DigitsBetween'] ) )
                {
                   return response()->json( "Phone Format Invalid", 400 );
                }
                elseif( isset( $failed['phone']['Regex'] ) )
                {
                   return response()->json( "Phone Format Invalid", 400 );
                }

            endif;
            
            
            
            
            


            if( isset( $failed['pid'] ) ):
                
                if( isset( $failed['pid']['Unique'] ) )
                {
                   return response()->json( "PID Exists", 400 );
                }
                elseif( isset( $failed['pid']['DigitsBetween'] ) )
                {
                   return response()->json( "PID Format Invalid", 400 );
                }

            endif;

        }
        
        return $next($request);
    }
}
