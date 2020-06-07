<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'slug';

    protected static function booted()
    {
        self::addGlobalScope('hide_unpublished', function ($query) {
            return $query->where('published_at', '!=', null);
        });
    }
}
