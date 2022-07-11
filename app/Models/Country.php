<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // hasManyThrough
    public function posts()
    {
        // Post is  Final table
        // User is  intermediate table
        return $this->hasManyThrough(Post::class, User::class);
    }
}
