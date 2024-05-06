<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vedio extends Model
{
    use HasFactory;
    protected $guarded = [];


    // one to many polymorphic relationship
    public function comment()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // one of many polymorphic relationship
    public function latestComment()
    {
        return $this->morphOne(Comment::class, 'commentable')->latestOfMany();
    }

    // one of many polymorphic relationship
    public function oldestComment()
    {
        return $this->morphOne(Comment::class, 'commentable')->oldestOfMany();
    }

    public function mostLikes()
    {
        return $this->morphOne(Comment::class, 'commentable')->ofMany('likes','max');
    }

    // one of many polymorphic relationship
    public function leastLikes()
    {
        return $this->morphOne(Comment::class, 'commentable')->ofMany('likes','min');
    }
}
