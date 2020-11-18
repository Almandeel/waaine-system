<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $fillable = [
        'name', 'image', 'location', 'description', 'type', 'address', 'phone', 'map_location'
    ];
}
