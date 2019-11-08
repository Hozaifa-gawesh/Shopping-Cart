<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\UploadFilesTrait;
use App\Http\Requests\Front\Users\Update;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{


    /**
     * View page Profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('front.profile');
    }


    /**
     * Update Profile User
     * @param Update $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Update $request)
    {
        // Get user data
        $user = User::find(auth()->user()->id);
        // if not get user data
        if(!$user)
            abort(404);
        // Get data from request
        $data = $request->all();
        // set item image
        $data['image'] = UploadFilesTrait::updateFile($request->file('image'), 'users', 'image', auth()->user()->image);
        // set item password
        if(!empty($request->input('password'))) {
            $data['password'] = bcrypt($request->input('password'));
        } else {
            unset($data['password']);
        }
        // Update Data in DB
        $user->update($data);

        Session::flash('success', 'Profile Updated Successfully');
        return redirect()->back();
    }

}
