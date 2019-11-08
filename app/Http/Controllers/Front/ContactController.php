<?php

namespace App\Http\Controllers\Front;

use App\Model\Contact;
use App\Model\Messages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\SendMSG\Store;
use Illuminate\Support\Facades\Session;
use Mail;

class ContactController extends Controller
{


    /**
     * Get data contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Get Contact Data
        $contact = Contact::first();
        return view('front.contact.index', ['contact' => $contact]);
    }


    /**
     * Send Message
     * @param Store $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function message(Store $request)
    {
        // get data from request
        $data = $request->all();
        // Store Message in DB
        Messages::create($data);
        // Set email info in data array
        $data['email_info'] = Contact::first()->email_1;
        // set name message to details
        $data['details'] = $data['message'];

        // Send Mail
        Mail::send('front.contact.send',$data, function($message) use($data)
        {
            $message->from($data['email'], 'Contact Form Shopping Handmade');

            $message->to($data['email_info'], 'Shopping Handmade')->subject('Contact Form Shopping Handmade');
        });

        Session::flash('success', 'Message Sent Successfully, Thank You :)');
        return redirect()->back();
    }


}
