<?php

namespace App\Http\Controllers\Back;

use App\Admin;
use App\Http\Requests\Back\Admins\Store;
use App\Http\Requests\Back\Admins\Update;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminsController extends Controller
{

    /**
     * Get All Admins
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $admins = Admin::paginate(10);

        return view('admin.admins.index', ['admins' => $admins]);
    }


    /**
     * Viee Page Add Admins
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.admins.create');
    }


    /**
     * Store Admin in DB
     * @param Store $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Store $request)
    {
        $admin = $request->all();
        $admin['password'] = bcrypt($request->input('password'));
        Admin::create($admin);

        Session::flash('success', 'Admin Added Successfully');
        return redirect('admin/admins');
    }


    /**
     * View page edit admin
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // Get data admin
        $admin = Admin::find($id);
        // if not get admin data => return page not found
        if(!$admin)
            abort(404);

        return view('admin.admins.edit', ['admin' => $admin]);
    }


    /**
     * View page details admin
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // Get data admin
        $admin = Admin::find($id);
        // if not get admin data => return page not found
        if(!$admin)
            abort(404);

        return view('admin.admins.view', ['admin' => $admin]);
    }


    /**
     * Update Admin Data in DB
     * @param Update $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Update $request, $id)
    {
        // Get data admin
        $admin = Admin::find($id);
        // if not get admin data => return page not found
        if(!$admin)
            abort(404);

        $data = $request->all();

        if(!empty($request->input('password'))) {
            $data['password'] = bcrypt($request->input('password'));

        } else {
            unset($data['password']);
        }

        $admin->update($data);

        Session::flash('success', 'Admin Updated Successfully');
        return redirect('admin/admins');
    }


    /**
     * Delete Admin from DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        // Get data admin
        $admin = Admin::find($id);
        // if not get admin data => return page not found
        if(!$admin)
            abort(404);

        $admin->delete();

        Session::flash('success', 'Admin Deleted Successfully');
        return redirect('admin/admins');
    }

}
