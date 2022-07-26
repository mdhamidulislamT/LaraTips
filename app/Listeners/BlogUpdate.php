<?php

namespace App\Listeners;

use App\Events\BigDataProcessed;
use App\Models\Blog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class BlogUpdate implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BigDataProcessed  $event
     * @return void
     */
    public function handle(BigDataProcessed $event)
    {

        $blogs = Blog::all();

         foreach ($blogs as $key => $blog) {
            $blogId = $blog->id;
            $content = "Updated Content Again 2 ";
            $affected = DB::table('blogs')
              ->where('id', $blogId)
              ->update(['content' => $content, 'updated_time' => date('Y-m-d H:i:s')]);
        }
        
    }
}
