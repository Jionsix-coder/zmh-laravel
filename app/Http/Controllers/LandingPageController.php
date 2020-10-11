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
            $MoneyLeft = session()->get('user')['MoneyLeft'];
            $promotionsItem = Product::where('promotions',true);

            return view('landing-page')->with([
                'products' =>$products,
                'recommendedItems' => $recommendedItems,
                'recommendedItems2' => $recommendedItems2,
                'categories' => $categories,
                'MoenyLeft' => $MoneyLeft,
                'promotionsItem' => $promotionsItem,
            ]);
        }else{
           return redirect()->route('user.login');
        }
    }

    public function profile()
    {
        $number = session()->get('user')['NationalNumber'];
        $user = BasicUser::where('NationalNumber','LIKE','%'.$number.'%')->first();

        return view('profile')->with([
            'user' => $user,
        ]);
    }

}
