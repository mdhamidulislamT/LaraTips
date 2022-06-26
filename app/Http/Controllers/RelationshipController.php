<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function index()
    {

        // $user = User::find(2)->phone;
        // return $user;

        return view('relationship');
    }
}
