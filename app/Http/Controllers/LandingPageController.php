<?php

namespace App\Http\Controllers;

use App\Models\BasicUser;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('user')){
            App::setLocale('unicode');
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();
            $products = Product::where('featured',true)->take(12)->get();
            $categories = Category::all();
            $recommendedItems = Product::inRandomOrder()->take(3)->get();
            $latestItems = Product::orderBy('id','desc')->take(3)->get();
            $ExpensiveItems = Product::where('price','>=',200000)->take(3)->get();
            $promotionsItem = Product::where('promotions',true)->take(6)->get();
            return view('landing-page')->with([
                'products' =>$products,
                'user' => $user,
                'recommendedItems' => $recommendedItems,
                'latestItems' => $latestItems,
                'ExpensiveItems' => $ExpensiveItems,
                'categories' => $categories,
                'promotionsItem' => $promotionsItem,
            ]);
        }else{
           return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }

    public function profile()
    {
        if(session()->has('user')){
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();

            return view('profile')->with([
                'user' => $user,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }

    public function zawgyi()
    {
        if(session()->has('user')){
            App::setLocale('zawgyi');
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();
            $products = Product::where('featured',true)->take(12)->get();
            $categories = Category::all();
            $recommendedItems = Product::inRandomOrder()->take(3)->get();
            $latestItems = Product::orderBy('id','desc')->take(3)->get();
            $ExpensiveItems = Product::where('price','>=',200000)->take(3)->get();
            $promotionsItem = Product::where('promotions',true)->take(6)->get();
            return view('landing-page')->with([
                'products' =>$products,
                'user' => $user,
                'recommendedItems' => $recommendedItems,
                'latestItems' => $latestItems,
                'ExpensiveItems' => $ExpensiveItems,
                'categories' => $categories,
                'promotionsItem' => $promotionsItem,
            ]);
        }else{
           return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }

}
