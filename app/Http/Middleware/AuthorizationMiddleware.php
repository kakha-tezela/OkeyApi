<?php

namespace App\Http\Middleware;
use Validator;
use Closure;

class AuthorizationMiddleware
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
        
        //Validate Input
            
        $validator = Validator::make($request->all(),[

            'phone_pid' => 'bail|required|numeric',
            'password'  => 'bail|required',

        ]);


        if ( $validator->fails() )
        {
            //$failed = $validator->failed();

            return response()->json( "Validation Failed", 400 );
        }

        
        //Continue with Application
        return $next($request);
    }
}
