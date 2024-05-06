<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    protected $guarded = [];
    // many to many Relationship
    public function roles(){
        return $this->belongsToMany(Role::class,'user_role');
    }

    // one to one Relationship
    public function company(){
        return $this->hasOne(Company::class);
    }

    /*
        has One Through Relationship
        this table connect with company table and phone_number table
    */
    public function phoneNumber(){
        return $this->hasOneThrough(PhoneNumber::class,Company::class);
        // return $this->hasOneThrough(PhoneNumber::class,Company::class,'admin_id','company_id','id','id'); // second way
    }
}
