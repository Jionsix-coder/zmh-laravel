<?php

namespace App\Http\Controllers;

use App\Models\BasicUser;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function armakhan()
    {
        if(session()->has('user')){
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();

            return view('navbar.armakhan')->with([
                'user' => $user,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }

    public function discipline()
    {
        if(session()->has('user')){
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();

            return view('navbar.discipline')->with([
                'user' => $user,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }

    public function member()
    {
        if(session()->has('user')){
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();
            return view('navbar.member')->with([
                'user' => $user,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }

    public function contact()
    {
        if(session()->has('user')){
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();

            return view('navbar.contact-us')->with([
                'user' => $user,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }
}
