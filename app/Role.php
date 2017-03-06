<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];

    static public $rules = [
        'name'    =>  'required|string|max:255|min:2'
    ];

    static public $messages = [
        'name.required' => 'სახელის შეყვანა აუცილებელია'
    ];


    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function personals()
    {
        return $this->belongsToMany('App\Personal','role_personal','role_id','user_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Personal','role_personal','role_id','user_id');
    }
}
