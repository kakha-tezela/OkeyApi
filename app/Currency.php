<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = "currency";
    
    public function carGuarantee()
    {
        return $this->hasMany("App\CarGuarantee","currency_id","id");
    }
    
    
    public function estateGuarantee()
    {
        return $this->hasMany("App\RealEstateGuarantee","currency_id","id");
    }
}
