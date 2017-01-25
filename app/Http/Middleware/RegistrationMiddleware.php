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
                'birth_date'  => 'bail|required|date_format:"d/m/Y"',   
                'address'     => 'required',
                'city_id'     => 'bail|required|digits_between:1,4',
                'pid'         => 'bail|unique:users,personal_id|digits_between:11,11',
                'username'    => 'bail|required|unique:users,username',
                'password'    => 'bail|required',
                'social_id'   => 'bail|required|digits_between:1,1',
                'work_place'  => 'bail|required',
                'salary_id'   => 'bail|required|digits_between:1,1',
        ]);

        
        
        
         
        if( $validator->fails() )
        {
            
            $failed = $validator->failed();
            
            
            //Detect which rule caused fail
            
            if( isset( $failed['birth_date'] ) ):

                if( isset( $failed['birth_date']['Required'] ) )
                {
                   return response()->json( "Birth Date is Missing", 400 );
                }
                elseif( isset( $failed['birth_date']['DateFormat'] ) )
                {
                   return response()->json( "Birth Date format is incorrect", 400 );
                }

            endif;
            
            
            
            
            if( isset( $failed['salary_id'] ) ):

                if( isset( $failed['salary_id']['Required'] ) )
                {
                   return response()->json( "Salary is Missing", 400 );
                }
                elseif( isset( $failed['salary_id']['DigitsBetween'] ) )
                {
                   return response()->json( "Salary length is incorrect", 400 );
                }

            endif;         

            
            
            
            
            
            if( isset( $failed['work_place'] ) ):
                
                if( isset( $failed['work_place']['Required'] ) )
                {
                   return response()->json( "Work Place is Missing", 400 );
                }

            endif;
            
            
            
            
            
            
            
            if( isset( $failed['social_id'] ) ):
                
                if( isset( $failed['social_id']['Required'] ) )
                {
                   return response()->json( "Social Status Missing", 400 );
                }
                elseif( isset( $failed['social_id']['DigitsBetween'] ) )
                {
                   return response()->json( "Social Status Lenght is incorrect", 400 );
                }

            endif;
            
            
            
            
            
            
            
            
            if( isset( $failed['password'] ) ):
                
                if( isset( $failed['password']['Required'] ) )
                   return response()->json( "Username Missing", 400 );
                
            endif;
            
            
            
            
            
            
            if( isset( $failed['username'] ) ):
                
                if( isset( $failed['username']['Required'] ) )
                {
                   return response()->json( "Username Missing", 400 );
                }
                elseif( isset( $failed['username']['Unique'] ) )
                {
                   return response()->json( "Username Already in use", 400 );
                }

            endif;
            
            
            
            
            
            if( isset( $failed['city_id'] ) ):
                
                if( isset( $failed['city_id']['Required'] ) )
                {
                   return response()->json( "City Missing", 400 );
                }
                elseif( isset( $failed['city_id']['DigitsBetween'] ) )
                {
                   return response()->json( "City Length Is not Correct", 400 );
                }

            endif;
            
            
            
            
            
            
            
            
            if( isset( $failed['address'] ) ):
                
                if( isset( $failed['address']['Required'] ) )
                   return response()->json( "Address Missing", 400 );

            endif;
            
            
            
            
            
            if( isset( $failed['gender'] ) ):
                
                if( isset( $failed['gender']['Required'] ) )
                {
                   return response()->json( "Gender Missing", 400 );
                }
                elseif( isset( $failed['gender']['DigitsBetween'] ) )
                {
                   return response()->json( "Gender Length Is not Correct", 400 );
                }

            endif;
            
            
            
            
            
            
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
