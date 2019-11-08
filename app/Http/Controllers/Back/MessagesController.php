<?php

namespace App\Http\Controllers\Back;

use App\Model\Messages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MessagesController extends Controller
{

    /**
     * Get all data messages
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Get data messages
        $messages = Messages::orderBy('id', 'DESC')->get();
        return view('admin.messages.index', ['messages' => $messages]);
    }


    /**
     * View details msg
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // get data msg
        $message = Messages::find($id);
        // if not get data
        if(!$message)
            abort(404);

        return view('admin.messages.view', ['message' => $message]);
    }


    /**
     * Delete MSG
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        // get data msg
        $message = Messages::find($id);
        // if not get data
        if(!$message)
            abort(404);

        // delete msg
        $message->delete();

        Session::flash('success', 'Message Deleted Successfully');
        return redirect('admin/messages');
    }


    /**
     * Delete Message Select
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function multiDelete(Request $request)
    {
        $this->validate($request, [
            'messages' => 'required|array'
        ]);
        // Delete Selected MSG
        Messages::whereIn('id', $request->input('messages'))->delete();

        Session::flash('success', 'Messages Selected Deleted Successfully');
        return redirect('admin/messages');
    }
}
