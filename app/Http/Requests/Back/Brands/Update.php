<?php

namespace App\Http\Requests\Back\Brands;

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
            'title' => [
                'required',
                'max:191',
                Rule::unique('brands', 'title')->ignore($this->route('id'))

            ],
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:1000',
        ];
    }
}
