<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationPoint extends Model
{
    use HasFactory;

    protected $fillable = ['location_name'];

    function house_floors()
    {
        return $this->hasMany(HouseFloor::class, 'location_point_id');
    }
}
