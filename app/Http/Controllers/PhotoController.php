<?php

namespace App\Http\Controllers;

use App\Http\Traits\ImageTrait;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    use ImageTrait;
    //========== Image Upload using Trait ==========//


    public function store2(Request $request)
    {
        $path = $this->manageUpload($request, 'public/avatars');

        $photo = new Photo();
        $photo->name = $path;
        $result = $photo->save();
        if ($result) {
            return Response()->json([
                "success" => true,
                "file" => $path
            ]);
        }else{
            return Response()->json([
                "success" => false,
                "file" => ''
          ]);
        }

    }

    public function index()
    {
        $photos = Photo::all();
        return view('photo.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* request()->validate([
            'file'  => 'required|mimes:doc,docx,pdf,txt|max:2048',
          ]); */
          $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'
          ]);

          if ($files = $request->file('photo')) {
             
            //store file into document folder
            $file = $request->photo->store('public/photos');
 
            //store your file into database
            $photo = new Photo();
            $photo->name = $file;
            $photo->save();
              
            return Response()->json([
                "success" => true,
                "file" => $file
            ]);
  
        }
  
        return Response()->json([
                "success" => false,
                "file" => ''
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);
        
        return Storage::download($photo->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        Storage::delete($photo->name);

        return back();

    }
}
