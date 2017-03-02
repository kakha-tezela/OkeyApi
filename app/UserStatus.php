<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    public $timestamps = false;
    protected $table = 'user_status';
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
