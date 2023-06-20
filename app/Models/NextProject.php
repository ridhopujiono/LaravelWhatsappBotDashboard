<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextProject extends Model
{
    use HasFactory;
    protected $fillable = [
        "type",
        "descriptions",
        "phone_number",
    ];
}
