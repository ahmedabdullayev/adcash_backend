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
    public function delete()
    {
        // delete all related photos
        $this->posts()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }
}
