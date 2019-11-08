<?php

namespace App\Http\Controllers\Front;

use App\Model\About;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        // Get about data from DB
        $about = About::first();
        return view('front.about.index', ['about' => $about]);
    }
}
