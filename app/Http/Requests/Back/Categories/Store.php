<?php

namespace App\Http\Requests\Back\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => [
                'required',
                'max:191',
                Rule::unique('categories', 'title')->ignore($this->route('id'))
            ],
            'image' => 'required|image|mimes:jpeg,jpg,png|max:1000',

        ];
    }
}
