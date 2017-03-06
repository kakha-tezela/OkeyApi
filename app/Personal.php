<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Notifications\PersonalCreated;

class Personal extends User
{
    use EntrustUserTrait;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public static $rules =[
          'name'  =>  'required|string|min:2|max:255',
          'password'  => 'required|same:password_confirmation|string|min:6|max:30',
          'email' =>  'required|email|unique:personals',
    ];

    public static $updateRules = [
        'name'  =>  'required|string|min:2|max:255',
        'password'  => 'same:password_confirmation|string|min:6|max:30',
        'email' =>  'required|email',
    ];

    public static $messages = [
         'name.required'    =>  'სახელის ჩაწერა აუცილებელია',
         'email.required'   =>  'ელ-ფოსტის მითითება აუცილებელია',
         'email.email'   =>     'ელ-ფოსტა სწორად მიუთითეთ ',
         'password.same'    =>  'პაროლები არ ემთხვევა',
         'password.required'=>  'პაროლის ჩაწერა აუცილებელია'
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role','role_personal','user_id','role_id');
    }

}
