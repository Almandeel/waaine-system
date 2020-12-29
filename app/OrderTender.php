<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderTender extends Model
{
    protected $fillable = [
        'order_id', 'status','price', 'description','dealer_id'
    ];

    public function dealer() {
        return $this->belongsTo('App\Dealer', 'dealer_id');
    }
}
