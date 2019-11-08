<?php

namespace App\Http\Requests\Front\Users;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'username' => 'required|max:191',
            'password' => 'required|confirmed|max:191|min:6',
            'email' => 'required|email|max:191|unique:users',
            'phone' => 'required|digits_between:7,12',
            'gender' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:1000',
        ];
    }
}
