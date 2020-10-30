<?php

namespace App\Http\Controllers;

use App\Models\BasicUser;
use App\Models\Navbar\Armakhan;
use App\Models\Navbar\Discipline;
use App\Models\Navbar\NewMember;
use App\Models\Navbar\AboutMember;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function armakhan()
    {
        if(session()->has('user')){
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();
            $texts = Armakhan::all();

            return view('navbar.armakhan')->with([
                'user' => $user,
                'texts' => $texts,
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
            $texts = Discipline::all();

            return view('navbar.discipline')->with([
                'user' => $user,
                'texts' => $texts,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }

    public function newmember()
    {
        if(session()->has('user')){
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();
            $texts = NewMember::all();

            return view('navbar.newmember')->with([
                'user' => $user,
                'texts' => $texts,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }

    public function aboutmember()
    {
        if(session()->has('user')){
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();
            $texts = AboutMember::all();

            return view('navbar.aboutmember')->with([
                'user' => $user,
                'texts' => $texts,
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
