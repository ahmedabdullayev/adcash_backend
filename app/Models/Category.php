<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
