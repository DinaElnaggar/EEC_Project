<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to submit
    }

    public function rules()
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg,webp,avif|max:2048',
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'desc' => 'nullable|string',
        ];
    }
}
