<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealEstateGuarantee extends Model
{
    protected $table = "real_estate_guarantee";
    
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
