<?php

namespace App\Http\Controllers;

use App\Events\BigDataProcessed;
use App\Events\PostCreated;
use App\Models\Blog;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        //$blogs = Blog::all();
        $blogs = Blog::get()->take(7);
        $totalBlog = Blog::count();
        return view('event.index', compact('blogs', 'totalBlog'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $len = $request->number;
            for ($i = 0; $i < $len; $i++) {
                $blog = new Blog();
                $blog->title = $request->title;
                $blog->save();
            }

            $message = $len . ",Blog Created Successfully!";

            $data = ['title' => $len . "New Blog Created!", 'author' => "Md Hamidul Islam"];
            /* event(new PostCreated($data)); // NotifyUser (Listener)
            */

            DB::commit();
            return redirect()->back()->with('success', $message);
        } catch (Throwable $e) {

            DB::rollBack();
            $message = "Error! please try again.";
            return redirect()->back()->with('error', $message);
        }
    }

    public function queueIndex()
    {
        //====Get time difference to update 30,0000 blogs===//

        /* $blog1 = Blog::find(1);
        $blog2 = Blog::find(60000);
        $time = $blog1->updated_at;
        $time2 = $blog2->updated_at;
        return $time->diff($time2)->format('%H:%I:%S'); */
        $totalBlog = Blog::count();
        return view('event.queue', compact('totalBlog'));
    }
    public function updateBigData(Request $request)
    {
        try {

            $numberOfData =  $request->numberOfData;
            $message = $numberOfData . ", Big Data Update Going On...";

            $data = ['title' => $numberOfData . ", Big Data Update Going On...", 'author' => "Md Hamidul Islam"];
            event(new BigDataProcessed($data)); // BlogUpdate (Listener)

            return redirect()->back()->with('success', $message);
        } catch (Throwable $e) {

            $message = "Error In Big Data Update!  Please Try Again.";
            return redirect()->back()->with('error', $message);
        }
    }
}
