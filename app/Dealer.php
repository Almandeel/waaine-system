<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $fillable = [
        'name', 'phone', 'address'
    ];

    public function user() {
        return $this->hasOne('App\User', 'dealer_id');
    }
}