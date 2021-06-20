<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * type = 1 medical
     * type = 2 puty
     * type = 3 electric
     */

    public const  STATUS = [
        "1" => 'pharmacy',
        "2" => 'Beautifying',
        "3" => 'Electronic',
    ];
    protected $fillable = [
        'type' ,'name', 'image', 'dealer_id', 'user_add_id', 'user_accepted_id', 'amount', 'status'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_add_id');
    }


    public function dealer() {
        return $this->belongsTo('App\User', 'user_accepted_id');
    }

    public function tendres() {
        return $this->hasMany('App\OrderTender');
    }

    public function getCreatedAtAttribute($value)
    {
        // info($value);
        return $value = Carbon::parse($value)->format('Y-m-d H:i');
    }

}
