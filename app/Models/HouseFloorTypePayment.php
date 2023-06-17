<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseFloorTypePayment extends Model
{
    use HasFactory;
    protected $table = 'house_floor_type_payments';
    protected $fillable = ['house_floor_type_id', 'descriptions', 'payment_type'];
}
