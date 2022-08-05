<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Product extends Model
{
    use HasFactory;


    public function getTitleAttribute($value)
    {
        // Title will be converted into Camel-Case
        return Str::title($value);
    }


    // How to use scope 
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }
    public function scopePrice($query)
    {
        return $query->where('price', '>', 1200);
    }
    public function scopeCanBeBought($query)
    {
        return $query->active()->price();
    }

    //Global Scope 
    protected static function booted()
    {
        static::addGlobalScope(new ActiveScope);
    }

    // Many to many (Category)
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    

}
