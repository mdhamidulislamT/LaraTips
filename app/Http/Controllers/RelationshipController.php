<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Mechanic;
use App\Models\Phone;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function oneToOne()
    {
        session(['type' => "OneToOne"]);

        //$user = User::find(1);
        //$phone = User::find(1)->phone;
        //$user = Phone::find(1)->user;
        //$users = User::with('phone')->get();         
        $users = User::all(); 
        //$users = []; 
        return view('relationship.one-to-one', compact('users'));
    }

    public function oneToMany()
    {
        session(['type' => "OneToMany"]);
        
        //return $post = Comment::find(34)->post;
        //return $comment = Post::find(2)->comments;

        /* $post = Post::find(9);
        return $post->comments; */

        //$posts = Post::all();
        $posts = Post::with('comments')->get();
        //$comments = Comment::all();
        //$posts = []; 
        return view('relationship.one-to-many', compact('posts'));
    }

    public function manyToMany()
    {
        session(['type' => "ManyToMany"]);
        $posts = Post::with('categories')->get();
        $categories = Category::with('posts')->get();
        //return $posts;
        //$posts = []; 
        //$categories = []; 
        return view('relationship.many-to-many', compact('posts', 'categories'));
    }
    public function hasOneThrough()
    {
        session(['type' => "hasOneThrough"]);
        //return $mechanics = Mechanic::all();
         $mechanics = Mechanic::with('carOwner')->get();
        //$mechanics = []; 
        return view('relationship.has-one-through', compact('mechanics'));
    }
    public function hasManyThrough()
    {
        session(['type' => "hasManyThrough"]);
        $mechanics = []; 
        return view('relationship.has-many-through', compact('mechanics'));
    }
}
