<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;


class Permission extends EntrustPermission
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    static public $rules = [
      'name'    =>  'required|string|max:255|min:2'
    ];

    static public $messages = [
        'name.required' => 'სახელის შეყვანა აუცილებელია'
    ];


    public function roles()
    {
        $this->belongsToMany('App/Role');
    }


}
