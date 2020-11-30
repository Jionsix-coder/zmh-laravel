<?php

namespace App\Http\Controllers;

use App\Models\BasicUser;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\VideoSlider;
use App\Models\CodeOfficer;
use App\Models\Promotion;
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
            $categories = Category::orderBy('id','desc')->take(8)->get();
            $videos = VideoSlider::orderBy('id','desc')->get();
            $recommendedItems = Product::inRandomOrder()->take(12)->get();
            $latestItems = Product::orderBy('id','desc')->take(12)->get();
            $categories1 = Category::where('p_id',0)->orderBy('id','desc')->first();
            $categories2 = Category::where('p_id',1)->orderBy('id','desc')->first();
            $categories3 = Category::where('p_id',2)->orderBy('id','desc')->first();
            $promotionsItems = Product::where('promotions',true)->orderBy('id','desc')->take(12)->get();
            $promotion = Promotion::orderBy('id','desc')->take(2)->get();
            
            $categoryProduct1 = Product::with('categories')->whereHas('categories',function (Builder $query) {
                $categories1 = Category::where('p_id',0)->orderBy('id','desc')->first();
                $query->where('slug',$categories1->slug);
            })->take(8)->get();

            $categoryProduct2 = Product::with('categories')->whereHas('categories',function (Builder $query) {
                $categories2 = Category::where('p_id',1)->orderBy('id','desc')->first();
                $query->where('slug',$categories2->slug);
            })->take(8)->get();

            $categoryProduct3 = Product::with('categories')->whereHas('categories',function (Builder $query) {
                $categories3 = Category::where('p_id',2)->orderBy('id','desc')->first();
                $query->where('slug',$categories3->slug);
            })->take(8)->get();

            return view('landing-page')->with([
                'products' =>$products,
                'user' => $user,
                'officer' => $officer,
                'recommendedItems' => $recommendedItems,
                'latestItems' => $latestItems,
                'categories' => $categories,
                'videos' => $videos,
                'promotionsItems' => $promotionsItems,
                'promotion' => $promotion,
                'categories1' => $categories1,
                'categories2' => $categories2,
                'categories3' => $categories3,
                'categoryProduct1' => $categoryProduct1,
                'categoryProduct2' => $categoryProduct2,
                'categoryProduct3' => $categoryProduct3,
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
            $personalNumber = session()->get('user')['PersonalNumber'];

            $orders = Order::where('personal_number',$personalNumber)->get();
            if($user == null){
                $number = session()->get('user')['PersonalNumber'];
                $user = BasicUser::where('PersonalNumber',$number)->first();

                if($user == null){
                    return redirect()->route('user.login')->withErrors('There is no user!!');
                }
            }

            return view('profile')->with([
                'user' => $user,
                'orders' => $orders,
            ]);
        }else{
            return redirect()->route('user.login')->withErrors('အကောင့်ဝင်ရန်လိုအပ်ပါသည်။');
        }
    }
}
