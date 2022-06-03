<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function signupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $data = $request->all();
        $data['is_admin'] = 1;
        User::create($data);
        return "Stored Succeessfully";
    }
}
