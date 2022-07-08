<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    // OneToMany
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // ManyToMany
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


}
