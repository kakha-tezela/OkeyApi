<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarGuarantee extends Model
{
    protected $table = "car_guarantee";
    
    public function orders()
    {
        return $this->morphToMany('App\Order', 'guarantable');
    }
    
    
    public function ownerFullName()
    {
        return $this->belongsTo("App\User","owner","id");
    }
    
    
    public function currency()
    {
        return $this->belongsTo("App\Currency","currency_id","id");
    }
    
}
