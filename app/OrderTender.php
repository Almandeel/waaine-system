<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderTender extends Model
{
    protected $fillable = [
        'order_id', 'status','price', 'description','dealer_id' , 'dealer_name' , 'dealer_phone' , 'dealer_location'
    ];

    public function dealer() {
        return $this->belongsTo('App\Dealer', 'dealer_id');
    }
}
