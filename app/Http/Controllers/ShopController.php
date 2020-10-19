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
        if(session()->has('user')){
            $pagination = 16;
            $categories = Category::all();
            $promotionsItem = Product::where('promotions',true)->take(6)->get();
            $latestItems = Product::orderBy('id','desc')->take(3)->get();

            if(request()->category){
                $products = Product::with('categories')->whereHas('categories',function($query){
                    $query->where('slug',request()->category);    
                });
                $categories;
                $categoryName = optional($categories->where('slug', request()->category)->first())->name;
            }else{
                $products = Product::inRandomOrder();
                $categories;
                $categoryName = 'သင့်အတွက်';
            }

            if(request()->sort == 'low_high'){
                $products = Product::distinct();
                $products = $products->orderBy('price')->paginate($pagination);
            }elseif(request()->sort == 'high_low'){
                $products = Product::distinct();
                $products = $products->orderBy('price','desc')->paginate($pagination);
            }else{
                $products = $products->paginate($pagination);
            }

            return view('shop')->with([
                'products' => $products,
                'categories' => $categories,
                'latestItems' => $latestItems,
                'categoryName' => $categoryName,
                'promotionsItem' => $promotionsItem,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if(session()->has('user')){
            $product = Product::where('slug',$slug)->firstOrFail();
            $categories = Category::all();
            $categoriesForProduct = $product->categories()->get();
            foreach($categoriesForProduct as $key => $category):

                $Name[$key] = $category->name;
            endforeach;
            $CategoryName = implode(' , ',$Name);
            $recommendedItems = Product::inRandomOrder()->take(3)->get();
            $latestItems = Product::orderBy('id','desc')->take(3)->get();
            $ExpensiveItems = Product::where('price','>=',200000)->take(3)->get();
            $promotionsItem = Product::where('promotions',true)->take(6)->get();


            $stockLevel = getStockLevel($product->quantity);

            return view('product')->with([
                'product' => $product,
                'recommendedItems' => $recommendedItems,
                'latestItems' => $latestItems,
                'CategoryName' => $CategoryName,
                'ExpensiveItems' => $ExpensiveItems,
                'categories' => $categories,
                'stockLevel' => $stockLevel,
                'promotionsItem' => $promotionsItem,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }

    public function search(Request $request)
    {
        if(session()->has('user')){
            $request->validate([
                'query' => 'required|min:3',
            ]);
    
            $query = $request->input('query');
            $categories = Category::all();
            $promotionsItem = Product::where('promotions',true)->take(6)->get();
            $products = Product::where('name', 'like' , "%$query%")
                                 ->orWhere('details' ,'like' ,"%$query%")
                                 ->paginate(16);
    
            return view('search-results')->with([
                'products' => $products,
                'categories' => $categories,
                'promotionsItem' => $promotionsItem,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }

    
}
