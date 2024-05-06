<?php

namespace App\Models;

use App\Models\Scopes\AnchorScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPUnit\TextUI\XmlConfiguration\RenameBackupStaticAttributesAttribute;

/*
    if you have External file for global query scope then use below line.
    this is second way to register the Global query scope file below like this
*/
#[ScopedBy([AnchorScope::class])]
class Anchor extends Model
{
    use HasFactory;
    protected $guarded = [];



    // Laravel Local Query Scope
    public function scopeSort($query)
    {
        return $query->orderBy('name', 'desc');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    // Laravel Global Query Scope
    protected static function booted(): void
    {
        /*
            if you have External file for global query scope then use below line.
            this is first way to register the Global query scope file below like this

        */
        // static::addGlobalScope(new AnchorScope);

        static::addGlobalScope('anchordeta', function (Builder $builder) {
            // $builder->where('status', 1);
        });
        // We can directly access in the controller
        // Anchor::get()
    }
    // one to many relationship
    public function news()
    {
        return $this->hasMany(News::class);
    }

    // one to many reverse relationship
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // one to one polymorphic relationship
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // Inside controller file when using Global Scope
    // Anchor::withoutGlobalScope(AnchorScope::class);
    // Anchor::withoutGlobalScope('userdetails'::class)->get();
    // Anchor::withoutGlobalScope([
    //     fistScope::class,
    //     secondScope::class,
    // ])->get();
    // Anchor::withoutGlobalScope()->get();
}
