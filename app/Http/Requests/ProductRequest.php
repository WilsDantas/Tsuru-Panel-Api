<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

            // Product

            'name'          => "required|string|min:3|max:255",
            'quantity'      => "required|integer",
            'price'         => "required|regex:/^\d+(\.\d{1,2})?$/",

            // Product Image
            'images'        => 'required | image',
            'images.*'      => "image",

            // Relations Identify

            'brand'         => "required",
            'sub_category'  => "required",

            // Details Product

            'pet'           => "nullable|min:3|max:250",
            'size'          => "nullable|min:3|max:250",
            'age'           => "nullable|integer",
            'material'      => "nullable|min:3|max:250",
            'dimension'     => "nullable|min:3|max:250",
            'description'   => "nullable|min:3|max:250",
            'weight'        => "nullable|min:3|max:250",            
        ];
    }
}
