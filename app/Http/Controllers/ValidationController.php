<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Rules\Uppercase;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        return view('validation.form');
    }

    public function store(ContactUsRequest $request)
    {
        $validatedData = $request->safe()->all();
       //$fName = $validatedData['fname'];
       return $validatedData;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
