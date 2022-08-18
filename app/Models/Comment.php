<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';


    //Inverse Of (OneToMany)
    public function post()
    {
        return $this->belongsTo(Post::class);
        //return $this->belongsTo(Post::class)->where('deleted', 'No');
    }

}
