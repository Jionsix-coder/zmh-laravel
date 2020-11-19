<?php

namespace App\Http\Controllers;

use App\Models\BasicUser;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
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
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();
            $pagination = 16;
            $categories = Category::all();
            $promotionsItem = Product::where('promotions',true)->take(6)->get();
            $bestsaleproducts = Product::where('quantity','<=','4')->take(12)->get();
            $latestItems = Product::orderBy('id','desc')->take(3)->get();
            $promotion = Promotion::orderBy('id','desc')->take(1)->get();

            if(request()->category){
                $products = Product::with('categories')->whereHas('categories',function($query){
                    $query->where('slug',request()->category);    
                });
                $categories;
                $categoryName = optional($categories->where('slug', request()->category)->first())->name;
            }else{
                $products = Product::orderBy('id','desc');
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
                'user'=>$user,
                'categories' => $categories,
                'latestItems' => $latestItems,
                'bestsaleproducts' => $bestsaleproducts,
                'categoryName' => $categoryName,
                'promotionsItem' => $promotionsItem,
                'promotion' => $promotion,
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
            global $product;
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();
            $product = Product::where('slug',$slug)->firstOrFail();
            $categories = Category::all();
            $categoriesForProduct = $product->categories()->get();
            $CategoryName = '';
            foreach($categoriesForProduct as $key => $category):
                $Name[$key] = $category->name;
            endforeach;
            $CategoryName = implode(' , ',$Name);
            $recommendedItems = Product::inRandomOrder()->take(12)->get();
            $latestItems = Product::orderBy('id','desc')->take(3)->get();
            $promotionsItem = Product::where('promotions',true)->take(6)->get();
            $categoryProduct = Product::with('categories')->whereHas('categories',function ($query) use($product) {
                $categoriesForProduct1 = $product->categories()->first();
                $query->where('slug',$categoriesForProduct1->slug);
            })->take(12)->get();


            $stockLevel = getStockLevel($product->quantity);

            return view('product')->with([
                'product' => $product,
                'user' => $user,
                'recommendedItems' => $recommendedItems,
                'latestItems' => $latestItems,
                'CategoryName' => $CategoryName,
                'categories' => $categories,
                'categoryProduct' => $categoryProduct,
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
    
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();
            $query = $request->input('query');
            $categories = Category::all();
            $bestsaleproducts = Product::where('quantity','<=','4')->take(12)->get();
            $promotionsItem = Product::where('promotions',true)->take(6)->get();
            $promotion = Promotion::orderBy('id','desc')->take(1)->get();
            $products = Product::where('name', 'like' , "%$query%")
                                 ->orWhere('details' ,'like' ,"%$query%")
                                 ->orWhere('description' ,'like' ,"%$query%")
                                 ->paginate(16);
    
            return view('search-results')->with([
                'products' => $products,
                'user' => $user,
                'categories' => $categories,
                'bestsaleproducts' => $bestsaleproducts,
                'promotionsItem' => $promotionsItem,
                'promotion' => $promotion,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }

    public function promotion(Request $request)
    {
        if(session()->has('user')){
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();
            $pagination = 16;
            $categories = Category::all();
            $promotionsItem = Product::where('promotions',true)->take(6)->get();
            $bestsaleproducts = Product::where('quantity','<=','4')->take(12)->get();
            $latestItems = Product::orderBy('id','desc')->take(3)->get();
            $promotion = Promotion::orderBy('id','desc')->take(1)->get();
            $products = Product::where('promotions',true)->paginate($pagination);

            

            return view('promotion-result')->with([
                'products' => $products,
                'user'=>$user,
                'categories' => $categories,
                'latestItems' => $latestItems,
                'bestsaleproducts' => $bestsaleproducts,
                'promotionsItem' => $promotionsItem,
                'promotion' => $promotion,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    } 

    
}
