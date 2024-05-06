<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    // one to many polymorphic relationship
    public function commentable()
    {
        return $this->morphTo();
    }
}
