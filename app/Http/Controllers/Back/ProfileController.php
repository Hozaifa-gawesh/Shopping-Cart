<?php

namespace App\Http\Controllers\Back;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    /**
     * Show Page Profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.profile');
    }


    /**
     * Update Profile
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        // Get ID Admin From Auth
        $getId = Auth::guard('admin')->user()->id;
        // Get Admin By ID
        $admin = Admin::find($getId);


        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|unique:admins,email,'.$admin->id,
            'phone' => 'required'
        ]);

        $data = $request->all();

        if(!empty($request->input('password'))) {
            $data['password'] =  bcrypt($request->input('password'));
        } else {
            unset($data['password']);
        }

        $admin->update($data);

        Session::flash('success', 'Profile Updated Successfully');
        return redirect('admin/profile');
    }

}
