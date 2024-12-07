<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacyRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to submit
    }

    public function rules()
    {
        return [
            'name' =>'required|string|max:255',
            'address' => 'required|string|max:255',
        ];
    }
}
