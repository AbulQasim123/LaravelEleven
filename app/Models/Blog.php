<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    // one to many polymorphic relationship
    public function comment()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

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
        return $this->morphOne(Comment::class, 'commentable')->ofMany('likes', 'max');
    }

    // one of many polymorphic relationship
    public function leastLikes()
    {
        return $this->morphOne(Comment::class, 'commentable')->ofMany('likes', 'min');
    }
}
