<?php

namespace App\Http\Controllers;

use App\Models\BasicUser;
use App\Models\Category;
use App\Models\Product;
use App\Models\VideoSlider;
use App\Models\CodeOfficer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
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
            if($user == null){
                $number = session()->get('user')['PersonalNumber'];
                $user = BasicUser::where('PersonalNumber',$number)->first();

                if($user == null){
                    return redirect()->route('user.login')->withErrors('There is no user!!');
                }
            }
            $PersonalNumber = $user->PersonalNumber;
            $code =Str::before($PersonalNumber,'-');
            $officer= CodeOfficer::where('officecode',$code)->firstOrFail();
            $products = Product::where('featured',true)->take(12)->get();
            $categories = Category::all();
            $videos = VideoSlider::orderBy('id','desc')->get();
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
                'officer' => $officer,
                'recommendedItems' => $recommendedItems,
                'latestItems' => $latestItems,
                'latestItemsAsc' => $latestItemsAsc,
                'latestItemsDesc' => $latestItemsDesc,
                'ExpensiveItemsAsc' => $ExpensiveItemsAsc,
                'ExpensiveItemsDesc' => $ExpensiveItemsDesc,
                'categories' => $categories,
                'videos' => $videos,
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
            if($user == null){
                $number = session()->get('user')['PersonalNumber'];
                $user = BasicUser::where('PersonalNumber',$number)->first();

                if($user == null){
                    return redirect()->route('user.login')->withErrors('There is no user!!');
                }
            }

            return view('profile')->with([
                'user' => $user,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }
}
