<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AuthUpdateRequest extends FormRequest
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
            'new_password'          => ['nullable', 'string', 'min:8', 'max: 20'],
            'confirm_new_password'  => ['nullable', 'required_with:new_password', 'same:new_password'],
            'phone'                 => ["required"],
            'image'                 => ["nullable", "image"],
            'password'              => ['nullable', function ($attribute, $value, $fail) {
                                        if (!\Hash::check($value, Auth::user()->password)) {
                                            return $fail(__('The current password is incorrect.'));
                                        }
            }]
        ];
    }
}
