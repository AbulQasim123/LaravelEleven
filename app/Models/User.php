<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Number;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // one to many relationship
    public function post()
    {
        return $this->hasMany(Post::class);
        // return $this->hasMany(Post::class, 'user_id', 'id'); // if we create manually, we can use this forign key and primary key
    }

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  $value == 2 ? "admin" : "user",
        );
    }

    // Laravel Accessor & Mutator
    // public function setEmailAttribute($value)
    // {
    //     $this->attributes['email'] = strtolower($value);
    // }
    // public function setUserNameAttribute($value)
    // {
    //     $this->attributes['user_name'] = strtolower($value);
    // }
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bycrypt($value);
    // }
    // public function getDobAttribute($value)
    // {
    //     return date('d-m-Y', strtotime($value));
    // }
    // public function getUserNameAttribute($value)
    // {
    //     return ucwords($value);
    // }

    // public function getSallaryAttribute($value)
    // {
    //     return Number::currency($value, in: 'INR');
    //     return Number::format($value);
    //     return Number::spell($value);
    // }

    // Laravel Accessor & Mutator New way Support Laravel 10
    // protected function UserName(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => ucwords($value),
    //         set: fn (string $value) => strtolower($value)
    //     );
    // }
}
