<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    // ManyToMany 
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    // Many to many (Product)
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
