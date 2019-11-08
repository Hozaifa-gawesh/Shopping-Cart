<?php

namespace App\Http\Controllers\Back;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    /**
     * Get all Users
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(9);
        return view('admin.users.index', ['users' => $users]);
    }


    /**
     * View details user
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // Get data user
        $user = User::find($id);
        // if not get data user
        if(!$user)
            abort(404);

        return view('admin.users.view', ['user' => $user]);
    }


    /**
     * Delete User From DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        // Get data user
        $user = User::find($id);
        // if not get data user
        if(!$user)
            abort(404);

        // Delete User
        $user->delete();

        Session::flash('success', 'User Deleted Successfully');
        return redirect('admin/users');
    }

}
