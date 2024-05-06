<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];
    // one to many relationship
    public function orders(){
        return $this->hasMany(Order::class);
    }

    // these four are 'has one of many' relationship
    public function latestOrder()
    {
        return $this->hasOne(Order::class)->latestOfMany();
    }
    public function oldestOrder()
    {
        return $this->hasOne(Order::class)->oldestOfMany();
    }
    public function largestOrder()
    {
        return $this->hasOne(Order::class)->ofMany('amount', 'max');
    }
    public function smallestOrder()
    {
        return $this->hasOne(Order::class)->ofMany('amount', 'min');
    }
}
