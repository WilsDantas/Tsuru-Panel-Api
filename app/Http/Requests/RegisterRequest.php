<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'cnpj'          => "required|string|digits:14|unique:tenants",
            'tenant'        => "required|string|min:3|max:255|unique:tenants,name",
            'email'         => "required|string|email|min:3|max:255|unique:users",
            'password'      => "required|string|min:6|max:20|confirmed",
            'name'          => "required|string|min:3|max:255",
        ];
    }
}
