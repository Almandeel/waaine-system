<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $fillable = [
        'name', 'image', 'longitude', 'latitude','description', 'type', 'address', 'phone'
    ];
}
