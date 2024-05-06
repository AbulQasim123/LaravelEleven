<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded = [];

    // one to one reverse relationship
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
