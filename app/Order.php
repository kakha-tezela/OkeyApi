<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class Order extends Model implements AuthenticatableContract
{
    use Authenticatable;
    public $timestamps = false;
    
    
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
