<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    // one to one polymorphic relationship
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
