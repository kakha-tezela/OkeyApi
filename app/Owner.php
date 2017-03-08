<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = "owners";
    
    
    public function RealEstateGuarantees()
    {
        return $this->belongsToMany( "App\RealEstateGuarantee", "owner_guarantees" );
    }
    
}
