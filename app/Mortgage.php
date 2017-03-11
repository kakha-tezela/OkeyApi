<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mortgage extends Model
{
    protected $table = "mortgage";
    
    public function realEstates()
    {
        return $this->belongsTo( "App\RealEstateGuarantee", "guarantee_id", "id" );
    }
    
}
