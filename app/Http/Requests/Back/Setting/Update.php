<?php

namespace App\Http\Requests\Back\Setting;

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
            'phone_1' => 'required|max:15',
            'phone_2' => 'nullable|max:15',
            'email_1' => 'required|email|max:191',
            'email_2' => 'nullable|email|max:191',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
            'instagram' => 'nullable|url',
            'address' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png|max:1000',
            'favicon' => 'nullable|image|mimes:jpeg,jpg,png|max:1000',
            'map_link' => 'nullable|url',

        ];
    }
}
