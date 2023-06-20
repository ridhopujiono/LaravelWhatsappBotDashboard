<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrgentProject extends Model
{
    use HasFactory;
    protected $fillable = [
        "house_floor_type_id",
        "urgent_type",
        "payment_type",
        "follow_up",
        "phone_number",
        "house_floor_type_id"
    ];

    public function master()
    {
        return $this->belongsTo(HouseFloorType::class, 'house_floor_type_id', 'id');
    }
}
