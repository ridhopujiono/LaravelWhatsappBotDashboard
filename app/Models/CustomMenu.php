<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomMenu extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'text', 'image'];

    protected $casts = [
        'image' => 'array',
    ];
}
