<?php

namespace App\Http\Controllers;

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
        $products = Product::where('featured',true)->take(8)->get();
        $categories = Category::all();
        $recommendedItems = Product::inRandomOrder()->take(3)->get();
        $recommendedItems2 = Product::inRandomOrder()->take(3)->get();

        return view('landing-page')->with([
            'products' =>$products,
            'recommendedItems' => $recommendedItems,
            'recommendedItems2' => $recommendedItems2,
            'categories' => $categories,
        ]);
    }

}
