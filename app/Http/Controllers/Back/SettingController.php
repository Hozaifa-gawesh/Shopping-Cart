<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\UploadFilesTrait;
use App\Http\Requests\Back\Setting\Update;
use App\Model\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{

    use UploadFilesTrait;

    /**
     * Get Data Setting
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $setting = Contact::first();
        return view('admin.setting.edit', ['setting' => $setting]);
    }


    /**
     * Update Setting in DB
     * @param Update $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Update $request)
    {
        // Get data Setting
        $setting = Contact::first();
        // if not get data
        if(!$setting)
            abort(404);

        $data = $request->all();
        $data['logo'] = UploadFilesTrait::updateFile($request->file('logo'), 'setting', 'image', $setting->logo);
        $data['favicon'] = UploadFilesTrait::updateFile($request->file('favicon'), 'setting', 'image', $setting->favicon);

        $setting->update($data);

        Session::flash('success', 'Setting Updated Successfully');
        return redirect('admin/setting');
    }

}
