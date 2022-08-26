<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait ImageTrait {

    //public function Image(Request $request, $fieldname = 'image', $directory = 'images')
    public function manageUpload(Request $request, $directory = 'avatars')
    {
        
        if ($request->hasFile('photo')) {
            $path = $request->photo->store($directory);
            return $path;
        } else {
            return null;
        }
    }
}
