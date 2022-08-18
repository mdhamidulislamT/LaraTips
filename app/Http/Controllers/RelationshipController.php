<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Mechanic;
use App\Models\Phone;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function testData()
    {
        //=====1=====//
        // return $comment = Post::find(2)->comments; // where deleted = 'No' [comments table]
        // return $post = Comment::find(2)->post; // where deleted = 'No' [posts table]
        //=====2=====//
        //return $posts = Post::with('comments')->where('deleted', 'No')->get(); // where deleted = 'No' [In posts table]
        //return $comments = Comment::with('post')->where('deleted', 'No')->get(); // where deleted = 'No' [In comments table]
        //=====3=====//
        // where deleted = 'No' [In posts table & comments table]
         return $comments = Post::where('deleted', 'No')
        ->with(['comments' => function($query){
                    $query->where('deleted', '=', 'No');
                }
            ])
            ->get();
    }
    public function oneToOne()
    {
        session(['type' => "OneToOne"]);

        //$user = User::find(1);
        //$phone = User::find(1)->phone;
        //$user = Phone::find(1)->user;
        //$users = User::with('phone')->get();
        $users = User::all();
        //$users = []; 
        //return $users = Phone::with('user')->get(); //Inverse
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
        //$posts = Post::with('comments')->get();
        $posts = Post::withCount('comments')->get(); //   total comments of a Post
        ///return $comments = Comment::with('post')->get(); //Inverse

        //$comments = Comment::all();
        //$posts = []; 
        return view('relationship.one-to-many', compact('posts'));
    }

    public function manyToMany()
    {
        // (_required a pivot table_)

        session(['type' => "ManyToMany"]);

        $posts = Post::with('categories')->get();
        $categories = Category::with('posts')->get();

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
        $countries = Country::with('posts')->get();
        //$countries = []; 
        return view('relationship.has-many-through', compact('countries'));
    }
}
