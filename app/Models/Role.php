<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    // many to many Relationship
    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'user_role');
    }
}
