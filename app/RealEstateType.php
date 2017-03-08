<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealEstateType extends Model
{
    protected $table = "real_estate_types";
    
    public function RealEstate()
    {
        return $this->hasMany('App\RealEstateGuarantee', 'real_estate_type', 'id' );
    }
    
}
