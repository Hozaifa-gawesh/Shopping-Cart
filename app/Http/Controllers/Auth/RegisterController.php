<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\UploadFilesTrait;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use UploadFilesTrait;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|max:191|confirmed',
            'phone' => 'required|digits_between:7,12',
            'birthday' => 'nullable|date',
            'gender' => 'required|in:male,female',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:1000'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        if(!empty($data['image'])) {
            $data['image'] = UploadFilesTrait::storeFile($data['image'], 'users', 'image');
        } else {
            unset($data['image']);
        }
        return User::create($data);
    }
}
