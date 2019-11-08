<?php

namespace App\Http\Requests\Front\CheckOut;

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
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|max:191|email',
            'phone' => 'required|digits_between:7,12',
            'address' => 'required',
        ];
    }
}
