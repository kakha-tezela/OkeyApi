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
            
                'firstname'             => 'bail|required|alpha',
                'lastname'              => 'bail|required|alpha',
                'email'                 => 'bail|required|email|unique:users,email',
                'phone'                 => 'bail|required|unique:users,phone|digits_between:9,9|regex:/^5/',
                'gender'                => 'bail|required|digits_between:1,1',
                'birth_date'            => 'bail|required|date',   
                'citizenship'           => 'bail|required|numeric',   
                'address'               => 'required',
                'city_id'               => 'bail|required|digits_between:1,4',
                'pid_number'            => 'bail|required',
                'pid'                   => 'bail|unique:users,personal_id|digits_between:11,11',
                'username'              => 'bail|required|unique:users,username',
                'password'              => 'bail|required',
                'social_id'             => 'bail|required|digits_between:1,1',
                'reg_address'           => 'bail|required',
                'phys_address'          => 'bail|required',
                'work_place'            => 'bail|required',
                'salary_id'             => 'bail|required|digits_between:1,1',
                'transaction_id'        => 'bail|required',
                'service_id'            => 'bail|required',
                'channel_id'            => 'bail|required',
                'branch_id'             => 'bail|required',
                'currency_id'           => 'bail|required',
                'merchant_id'           => 'bail|required',
                'guarantee'             => 'bail|required',
                'politic_person'        => 'bail|required|numeric',
                'months'                => 'bail|required|numeric',
                'prepay'                => 'bail|required|numeric',
                'start_date'            => 'bail|required|date',
                'first_pay_date'        => 'bail|required|date',
                'end_date'              => 'bail|required|date',
                'firstname_contact'     => 'bail|required|alpha',
                'lastname_contact'      => 'bail|required|alpha',
                'phone_contact'         => 'bail|required|digits_between:9,9|regex:/^5/',
                'status'                => 'bail|required|alpha',
                'bank_income'           => 'bail|required|numeric',
                'other_income'          => 'bail|required|numeric',
                'sp'                    => 'bail|required|boolean',
                'reg_number'            => 'numeric',
                'reg_date'              => 'bail|date',
                'reg_org'               => 'alpha',
        ]);

        
        
        if( $validator->fails() )
        {
            
            $failed = $validator->failed();
            
            
            //Detect which rule caused fail
            
            if( isset( $failed['start_date'] ) ):

                if( isset( $failed['start_date']['Required'] ) )
                {
                   return response()->json( "Start Date is Missing", 400 );
                }
                elseif( $failed['start_date']['Date'] )
                {
                    return response()->json( "Start Date Format Incorrect", 400 );
                }

            endif;
            
            
            
            
            
            
            
            if( isset( $failed['guarantee'] ) ):
                
                if( isset( $failed['guarantee']['Required'] ) )
                   return response()->json( "Guarantee Information Missing", 400 );

            endif;
            
            
            
            
            
            if( isset( $failed['currency_id'] ) ):
                
                if( isset( $failed['currency_id']['Required'] ) )
                   return response()->json( "Currency Information Missing", 400 );

            endif;




            if( isset( $failed['branch_id'] ) ):
                
                if( isset( $failed['branch_id']['Required'] ) )
                   return response()->json( "Branch Information Missing", 400 );

            endif;
            
            
            
            
            
            
            
            if( isset( $failed['channel_id'] ) ):
                
                if( isset( $failed['channel_id']['Required'] ) )
                   return response()->json( "Channel Information Missing", 400 );

            endif;
            
            
            
            
            
            if( isset( $failed['sp'] ) ):


                if( isset( $failed['sp']['Required'] ) )
                {
                   return response()->json( "SP Field Missing", 400 );
                }
                elseif( isset( $failed['sp']['Boolean'] ) )
                {
                   return response()->json( "SP Field Incorrect Format", 400 );
                }

            endif;
            
            
            
            
            
            if( isset( $failed['reg_org'] ) ):
                
                if( isset( $failed['reg_org']['Alpha'] ) )
                   return response()->json( "Registration Organization Incorrect Format", 400 );

            endif;
            
            
            
            
            
            
            if( isset( $failed['reg_date'] ) ):
                
                if( isset( $failed['reg_date']['Date'] ) )
                   return response()->json( "Registration DateFormat Incorrect", 400 );

            endif;
            
            
            
            
            
            
             if( isset( $failed['reg_number'] ) ):
                
                if( isset( $failed['reg_number']['Numeric'] ) )
                {
                   return response()->json( "Registration Number Incorrect Format", 400 );
                }

            endif;
            
            
            
            
            
            
            
            
            
            
            
            if( isset( $failed['politic_person'] ) ):
                
                if( isset( $failed['politic_person']['Required'] ) )
                {
                   return response()->json( "Politic Person Status Missing", 400 );
                }
                elseif( isset( $failed['politic_person']['Numeric'] ) )
                {
                   return response()->json( "Politic Person Status Incorrect Format", 400 );
                }

            endif;
            
            
            
            
            
            
            
            if( isset( $failed['phys_address'] ) ):
                
                if( isset( $failed['phys_address']['Required'] ) )
                   return response()->json( "Physical Address Missing", 400 );

            endif;
            
            
            
            
            
            
            if( isset( $failed['reg_address'] ) ):
                
                if( isset( $failed['reg_address']['Required'] ) )
                   return response()->json( "Registration Address Missing", 400 );

            endif;
            
            
            
            
            
            if( isset( $failed['pid_number'] ) ):
                
                if( isset( $failed['pid_number']['Required'] ) )
                {
                   return response()->json( "Pid Number Missing", 400 );
                }

            endif;
            
            
            
            
            
            if( isset( $failed['citizenship'] ) ):
                
                if( isset( $failed['citizenship']['Required'] ) )
                {
                   return response()->json( "Citizenship Missing", 400 );
                }
                elseif( isset( $failed['citizenship']['Numeric'] ) )
                {
                   return response()->json( "Citizenship Incorrect Format", 400 );
                }

            endif;
            
            
            
            
            
            
            
            
            if( isset( $failed['bank_income'] ) ):
                
                if( isset( $failed['bank_income']['Required'] ) )
                {
                   return response()->json( "Bank Income Missing", 400 );
                }
                elseif( isset( $failed['bank_income']['Numeric'] ) )
                {
                   return response()->json( "Bank Income Not Numeric", 400 );
                }

            endif;
            
            
            
            
            
            if( isset( $failed['other_income'] ) ):
                
                if( isset( $failed['other_income']['Required'] ) )
                {
                   return response()->json( "Other Income Missing", 400 );
                }
                elseif( isset( $failed['other_income']['Numeric'] ) )
                {
                   return response()->json( "Other Income Not Numeric", 400 );
                }

            endif;           
            
            
            
            
            
            
            
            
            if( isset( $failed['status'] ) ):
                
                if( isset( $failed['status']['Required'] ) )
                {
                   return response()->json( "Status of Contact person Missing", 400 );
                }
                elseif( isset( $failed['status']['Alpha'] ) )
                {
                   return response()->json( "Status of Contact person Not Alphabetical", 400 );
                }

            endif;
            
            
            
            
            
            
            
            if( isset( $failed['phone_contact'] ) ):
                
                if( isset( $failed['phone_contact']['Required'] ) )
                {
                   return response()->json( "Phone of Contact Person Missing", 400 );
                }
                elseif( isset( $failed['phone_contact']['DigitsBetween'] ) )
                {
                   return response()->json( "Phone of Contact Person Invalid", 400 );
                }
                elseif( isset( $failed['phone_contact']['Regex'] ) )
                {
                   return response()->json( "Phone of Contact Person Invalid", 400 );
                }

            endif;
            
            
            
            
            
            
            
            
            
            
            
             if( isset( $failed['lastname_contact'] ) ):
                
                if( isset( $failed['lastname_contact']['Required'] ) )
                {
                   return response()->json( "Lastname of Contact person Missing", 400 );
                }
                elseif( isset( $failed['lastname_contact']['Alpha'] ) )
                {
                   return response()->json( "Lastname of Contact person Not Alphabetical", 400 );
                }

            endif;
            
            
            
            
            
            
            
             if( isset( $failed['firstname_contact'] ) ):
                
                if( isset( $failed['firstname_contact']['Required'] ) )
                {
                   return response()->json( "Firstname of Contact person Missing", 400 );
                }
                elseif( isset( $failed['firstname_contact']['Alpha'] ) )
                {
                   return response()->json( "Firstname of Contact person Not Alphabetical", 400 );
                }

            endif;
            
            
            
            
            
            
            
            
            
            
            if( isset( $failed['end_date'] ) ):

                if( isset( $failed['end_date']['Required'] ) )
                {
                   return response()->json( "End Pay Date is Missing", 400 );
                }
                elseif( $failed['end_date']['Date'] )
                {
                    return response()->json( "End Pay Date Format Incorrect", 400 );
                }

            endif;
            
            
            
            
            
            
            
            
            
            if( isset( $failed['first_pay_date'] ) ):

                if( isset( $failed['first_pay_date']['Required'] ) )
                {
                   return response()->json( "First Pay Date is Missing", 400 );
                }
                elseif( $failed['first_pay_date']['Date'] )
                {
                    return response()->json( "First Pay Date Format Incorrect", 400 );
                }

            endif;
            
            
            
            
            
            
            
            
            if( isset( $failed['prepay'] ) ):

                if( isset( $failed['prepay']['Required'] ) )
                {
                   return response()->json( "Prepay is Missing", 400 );
                }
                elseif( $failed['prepay']['Numeric'] )
                {
                    return response()->json( "Prepay Format Incorrect", 400 );
                }

            endif;
            
            
            
            
            
            
            
            
            
            
            
            if( isset( $failed['months'] ) ):

                if( isset( $failed['months']['Required'] ) )
                {
                   return response()->json( "Months is Missing", 400 );
                }
                elseif( $failed['months']['Numeric'] )
                {
                    return response()->json( "Months Format Incorrect", 400 );
                }

            endif;
            
            
            
            
            
            
            
            
            if( isset( $failed['merchant_id'] ) ):

                if( isset( $failed['merchant_id']['Required'] ) )
                {
                   return response()->json( "Merchant Id is Missing", 400 );
                }

            endif;
            
            
            
            
            
            
            
             if( isset( $failed['service_id'] ) ):

                if( isset( $failed['service_id']['Required'] ) )
                {
                   return response()->json( "Service Id is Missing", 400 );
                }

            endif;
            
            
            
            
            
            
            
            
            if( isset( $failed['transaction_id'] ) ):

                if( isset( $failed['transaction_id']['Required'] ) )
                {
                   return response()->json( "Transaction Id is Missing", 400 );
                }

            endif;
            
            
            
            
            
            
            
            if( isset( $failed['birth_date'] ) ):

                if( isset( $failed['birth_date']['Required'] ) )
                {
                   return response()->json( "Birth Date is Missing", 400 );
                }
                elseif( isset( $failed['birth_date']['Date'] ) )
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
