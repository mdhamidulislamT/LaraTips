<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fname' => ['required', 'string', new Uppercase],
            'lname' => ['required', 'string', new Uppercase],
            'address1' => ['required'],
            'address2' => 'required|max:30',
            'phone' => 'required|numeric',
        ];
    }

    // Customizing The Error Messages
    public function messages()
    {
        return [
            'fname.required' => 'first name is required',
            'lname.required' => 'last name is required',
            'address1.required' => 'this field is required',
            'address2.required' => 'this field is required',
            'phone.required' => 'phone number is required',
            'phone.min' => 'phone number must be greater than 8 chars',
        ];
    }
    // Customizing The Input Field Name
    public function attributes()
    {
        return [
            'address2' => 'second address',
            'phone' => 'phone number',
        ];
    }
}
