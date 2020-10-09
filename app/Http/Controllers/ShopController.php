<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 16;
        $categories = Category::all();

        if(request()->category){
            $products = Product::with('categories')->whereHas('categories',function($query){
                $query->where('slug',request()->category);    
            });
            $categories;
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        }else{
            $products = Product::where('featured',true);
            $categories;
            $categoryName = 'သင့်အတွက်';
        }

        if(request()->sort == 'low_high'){
            $products = $products->orderBy('price')->paginate($pagination);
        }elseif(request()->sort == 'high_low'){
            $products = $products->orderBy('price','desc')->paginate($pagination);
        }else{
            $products = $products->paginate($pagination);
        }

        return view('shop')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();
        $categories = Category::all();
        $recommendedItems = Product::where('slug','!=',$slug)->inRandomOrder()->take(3)->get();
        $recommendedItems2 = Product::where('slug','!=',$slug && $recommendedItems)->inRandomOrder()->take(3)->get();

        return view('product')->with([
            'product' => $product,
            'recommendedItems' => $recommendedItems,
            'recommendedItems2' => $recommendedItems2,
            'categories' => $categories,
        ]);
    }

    
}
