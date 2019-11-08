<?php

namespace App\Http\Requests\Back\Admins;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
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
            'username' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('admins', 'email')->ignore($this->route('id'))
            ],
            'password' => 'nullable|min:6',
            'phone' => 'required|min:6'
        ];
    }
}
