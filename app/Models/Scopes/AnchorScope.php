<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class AnchorScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        // $builder->where('status', 1);
        // $builder->select("id","name","email")->with("news:id,title,description")->where("status",1); if you want to use with
    }
    // Do like this More
}
