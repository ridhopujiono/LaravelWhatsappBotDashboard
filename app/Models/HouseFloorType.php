<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseFloorType extends Model
{
    use HasFactory;
    protected $fillable = ['house_floor_id', 'house_type_id', 'descriptions'];

    function house_types()
    {
        return $this->belongsTo(HouseType::class, 'house_type_id');
    }
    function house_floors()
    {
        return $this->belongsTo(HouseFloor::class, 'house_floor_id');
    }
}
