<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function anchors(){
        return $this->hasMany(Anchor::class);
    }
    // has many through relationship
    public function posts(){
        return $this->hasManyThrough(News::class, Anchor::class);
        // return $this->hasManyThrough(News::class, Anchor::class, 'country_id', 'anchor_id', 'id', 'id'); // if we create manually, we can use this forign key and primary key
    }
}
