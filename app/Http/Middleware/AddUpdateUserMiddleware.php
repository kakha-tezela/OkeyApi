<?php

namespace App\Http\Middleware;
use Validator;
use Closure;

class AddUpdateUserMiddleware
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
            
                'person_status'         => 'bail|required',
                'firstname'             => 'bail|required|alpha',
                'lastname'              => 'bail|required|alpha',
                'citizenship'           => 'bail|required',   
                'gender'                => 'bail|required',
                'birth_date'            => 'bail|required|date',   
                'reg_address'           => 'bail|required',
                'phys_address'          => 'bail|required',
                'city_id'               => 'bail|required',
                'phone'                 => 'bail|required|unique:users,phone|digits_between:9,9|regex:/^5/',
                'pid_number'            => 'bail|required',
                'personal_id'           => 'bail|unique:users,personal_id|digits_between:11,11',
                'email'                 => 'bail|required|email|unique:users,email',
                'username'              => 'bail|required|unique:users,username',
                'password'              => 'bail|required',
                'company_id'            => 'bail|required',
                'social_id'             => 'bail|required',
                'politic_person'        => 'bail|required',
                'work_place'            => 'bail|required',
                'salary_id'             => 'bail|required',
                'balance'               => 'bail|required|numeric',
                'status'                => 'bail|required',
        ]);





        if( $validator->fails() )
            return response()->json( " Validation Failed !", 400 );


        return $next($request);
    }
}
