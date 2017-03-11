<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class Order extends Model implements AuthenticatableContract
{
    use Authenticatable;
    
    public $timestamps = false;
    
    protected $hidden = array('pivot');

    
    
    public function schedule()
    {
        return $this->hasMany( 'App\Schedule', 'order_id', 'id' );
    }
    
    
    
    
    
    public function suretyUsers()
    {
        $values = [ 'users.id', 'firstname', 'lastname', 'personal_id', 'reg_address', 'phys_address', 'phone', 'surety_amount' ];
        
        return $this->belongsToMany( 'App\User', 'order_sureties', 'order_id', 'user_id' )->select( $values );
    } 
    
    
    
    
    
    
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    
    
    
    
    public function CarGuarantee()
    {
        return $this->morphedByMany('App\CarGuarantee', 'guarantable');
    }
    
    
    
    public function RealEstateGuarantee()
    {
        return $this->morphedByMany('App\RealEstateGuarantee', 'guarantable');
    }
    
    
    
}
