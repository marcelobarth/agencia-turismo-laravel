<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = [
        'city_id',
        'name',
        'latitude',
        'longitude',
        'number',
        'zip_code',
        'address',
        'complement',
    ];
}
