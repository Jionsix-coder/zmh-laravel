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
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();
            $products = Product::where('featured',true)->take(12)->get();
            $categories = Category::all();
            $recommendedItems = Product::inRandomOrder()->take(3)->get();
            $latestItems = Product::orderBy('id','desc')->take(3)->get();
            $latestItemsAsc = Product::orderBy('id','asc')->take(3)->get();
            $latestItemsDesc = Product::orderBy('id','desc')->take(3)->get();
            $ExpensiveItemsAsc = Product::where('price','>=',200000)->orderBy('price','asc')->take(3)->get();
            $ExpensiveItemsDesc = Product::where('price','>=',200000)->orderBy('price','desc')->take(3)->get();
            $promotionsItemsAsc = Product::where('promotions',true)->orderBy('id','asc')->take(6)->get();
            $promotionsItemsDesc = Product::where('promotions',true)->orderBy('id','desc')->take(6)->get();
            return view('landing-page')->with([
                'products' =>$products,
                'user' => $user,
                'recommendedItems' => $recommendedItems,
                'latestItems' => $latestItems,
                'latestItemsAsc' => $latestItemsAsc,
                'latestItemsDesc' => $latestItemsDesc,
                'ExpensiveItemsAsc' => $ExpensiveItemsAsc,
                'ExpensiveItemsDesc' => $ExpensiveItemsDesc,
                'categories' => $categories,
                'promotionsItemsAsc' => $promotionsItemsAsc,
                'promotionsItemsDesc' => $promotionsItemsDesc,
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
