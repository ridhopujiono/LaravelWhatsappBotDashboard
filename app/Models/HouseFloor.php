<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseFloor extends Model
{
    use HasFactory;
    protected $fillable = ['location_point_id', 'floor_name'];

    function house_floors()
    {
        return $this->belongsTo(LocationPoint::class, 'location_point_id');
    }
    public function house_types()
    {
        return $this->hasManyThrough(HouseType::class, HouseFloorType::class, 'house_floor_id', 'id', 'id', 'house_type_id');
    }
}
