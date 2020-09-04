<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name'          => "required|string|min:3|max:255",
            'profile'       => "required",
            'salary'        => "required|regex:/^\d+(\.\d{1,2})?$/|max: 25",
            'phone'         => "required",
        ];

        if($this->method() == 'POST'){
            $rules['email'] = ['required', 'string', 'email', 'min: 3', 'max: 40', 'unique:users'];
            $rules['password'] = ['required', 'string', 'min: 6', 'max: 20', 'confirmed'];
        }

        if($this->method() == 'PUT'){
            $rules['active'] = ['required'];
        }

        return $rules;
    }
}
