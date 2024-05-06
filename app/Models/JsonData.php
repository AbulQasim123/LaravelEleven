<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JsonData extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'json_data' => 'json',
        'json_data' => AsArrayObject::class,
    ];
}
