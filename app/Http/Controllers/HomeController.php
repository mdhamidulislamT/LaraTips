<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function profile()
    {
        return view('about-us');
    }

    public function contactUs()
    {
        $data = [
            'teams' => [
                'team A',
                'team B',
                'team C',
                'team D',
                'team E',
                'team F',
            ],
            'users' => []
        ];

        return view('contact-us', $data);
    }
}
