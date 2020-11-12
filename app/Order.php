<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * type = 1 medical
     * type = 2 puty
     * type = 3 electric
     */
    protected $fillable = [
        'type' ,'name', 'image', 'dealer_id', 'user_add_id', 'user_accepted_id', 'amount'
    ];
}
