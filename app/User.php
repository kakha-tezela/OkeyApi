<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    
    public $timestamps = false;
    
    protected $fillable = [
            'person_status',
            'firstname',
            'lastname',
            'citizenship',
            'gender',
            'birth_date',
            'reg_address',
            'phys_address',
            'city_id',
            'phone',
            'pid_number',
            'personal_id',
            'email',
            'username',
            'password',
            'company_id',
            'social_id',
            'politic_person',
            'work_place',
            'salary_id',
            'balance',
            'status',
    ];
    
    
    
    
    
    
    public function suretyOrders()
    {
        return $this->belongsToMany( 'App\Order', 'order_sureties' );
    } 
    
    
    
    
    
    
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    
    
    public function status()
    {
        return $this->belongsTo('App\UserStatus');
    }
    
    
    public function getStatusName()
    {
        return $this->status->title;
    }
    
    
    
    public function carGuarantee()
    {
        return $this->hasMany("App/CarGuarantee","owner","id");
    }
    
    
}
