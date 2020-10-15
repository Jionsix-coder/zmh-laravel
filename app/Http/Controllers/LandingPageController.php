<?php

namespace App\Http\Controllers;

use App\Models\BasicUser;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
            $products = Product::where('featured',true)->take(8)->get();
            $categories = Category::all();
            $recommendedItems = Product::inRandomOrder()->take(3)->get();
            $recommendedItems2 = Product::inRandomOrder()->take(3)->get();
            $promotionsItem = Product::where('promotions',true)->take(6)->get();

            return view('landing-page')->with([
                'products' =>$products,
                'recommendedItems' => $recommendedItems,
                'recommendedItems2' => $recommendedItems2,
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

}
