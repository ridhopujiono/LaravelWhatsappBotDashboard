<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseType extends Model
{
    use HasFactory;
    protected $fillable = ['house_type_name', 'image'];

    protected $casts = [
        'image' => 'array',
    ];

    public function house_floors()
    {
        return $this->hasManyThrough(HouseFloor::class, HouseFloorType::class, 'house_type_id', 'id', 'id', 'house_floor_id');
    }
}
