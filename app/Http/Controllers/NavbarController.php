<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function armakhan()
    {
        return view('armakhan');
    }

    public function discipline()
    {
        return view('discipline');
    }

    public function member()
    {
        return view('member');
    }

    public function contact()
    {
        return view('contact-us');
    }
}
