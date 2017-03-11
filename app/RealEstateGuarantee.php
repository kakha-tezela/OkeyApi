<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealEstateGuarantee extends Model
{
    protected $fillable = ['mortgagee_name'];
    public $timestamps = false;
    protected $table = "real_estate_guarantee";
    
//    ->select(['mortgage.title']);
    
    public function mortgage()
    {
        return $this->hasMany("App\Mortgage","guarantee_id","id")->select(['mortgage.title']);
    }




    public function orders()
    {
        return $this->morphToMany('App\Order', 'guarantable');
    }
 
    
    
    
    public function owners()
    {
        return $this->belongsToMany( "App\Owner", "owner_guarantees", "guarantee_id", "owner_id" );
    }
    
    
    
    
    
    public function currency()
    {
        return $this->belongsTo("App\Currency","currency_id","id");
    }
    
    
    
    
    
    public function RealEstateType()
    {
        return $this->belongsTo( "App\RealEstateType", "real_estate_type", "id" );
    }
    
}
