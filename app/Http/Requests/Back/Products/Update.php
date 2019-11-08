<?php

namespace App\Http\Requests\Back\Products;

use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required|max:191',
            'description' => 'required',
            'colors' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'image' => 'image|mimes:jpeg,jpg,png|max:1000',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
        ];
    }
}
