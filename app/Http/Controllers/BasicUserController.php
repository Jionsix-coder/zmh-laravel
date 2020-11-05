<?php

namespace App\Http\Controllers;

use App\Models\BasicUser;
use App\Models\BasicUserZawgyi;
use App\Models\BasicUserEng;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use SteveNay\MyanFont\MyanFont;
use Illuminate\Support\Facades\Validator;
use IntlBreakIterator;
use MyanRabbit;

class BasicUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.login');
    }

    public function indexzawgyi()
    {
        return view('login.loginzawgyi');
    }

    public function indexenglish()
    {
        return view('login.logineng');
    }

    /**
     * Checking login Crendotional.
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $number = $request->NationalNumber;
        $user = BasicUser::where('NationalNumber',$number)->first();
        if($user){
            if($user->Name === $request->Name){
                if($user->PositionDepartment === $request->PositionDepartment){
                    if($user->NationalNumber === $request->NationalNumber){
                        if($user->PersonalNumber === $request->PersonalNumber){
                            if($user->CityTineState === $request->CityTineState){
                                if($user->CurrentOffice === $request->CurrentOffice){
                                    session()->put('user',[
                                        'NationalNumber' => $user->NationalNumber,
                                        'MoneyLeft' => $user->MoneyLeft,
                                    ]);
                                    
                                    return redirect()->route('landing.page');
                                }else{
                                    return back()->withInput()->withErrors('လက်ရှိတာဝန်ထမ်းဆောင်သောရုံးမှားယွင်းနေပါသည်။');
                                }
                            }else{
                                return back()->withInput()->withErrors('မြို့ | တိုင်း | ပြည်နယ်မှားယွင်းနေပါသည်။');
                            }
                        }else{
                            return back()->withInput()->withErrors('ကိုယ်ပိုင်အမှတ်မှားယွင်းနေပါသည်။');
                        }
                    }else{
                        return back()->withInput()->withErrors('မှတ်ပုံတင်အမှတ်မှားယွင်းနေပါသည်။');
                    }
                }else{
                    return back()->withInput()->withErrors('ရာထူး | ဋ္ဌာန မှားယွင်းနေပါသည်။');
                }
            }else{
                return back()->withInput()->withErrors('အမည်မှားယွင်းနေပါသည်။');
            }
        }else{
            return back()->withInput()->withErrors('မှတ်ပုံတင်အမှတ်မှားယွင်းနေပါသည်။');
        }
    }

    public function checkzawgyi(Request $request)
    {
        $number = $request->NationalNumber;
        $user = BasicUserZawgyi::where('NationalNumber',$number)->first();
        if($user){
            $NationalNumber = MyanFont::zg2uni($user->NationalNumber);
        }else{
            return back()->withInput()->withErrors('မွတ္ပုံတင္အမွတ္မွားယြင္းေနပါသည္။');
        }
        if($user){
            if($user->Name === $request->Name){
                if($user->PositionDepartment === $request->PositionDepartment){
                    if($user->NationalNumber === $request->NationalNumber){
                        if($user->PersonalNumber === $request->PersonalNumber){
                            if($user->CityTineState === $request->CityTineState){
                                if($user->CurrentOffice === $request->CurrentOffice){
                                    session()->put('user',[
                                        'NationalNumber' => $NationalNumber,
                                        'PersonalNumber' => $user->PersonalNumber,
                                        'MoneyLeft' => $user->MoneyLeft,
                                    ]);
                                    
                                    return redirect()->route('landing.page');
                                }else{
                                    return back()->withInput()->withErrors('လက္ရွိတာဝန္ထမ္းေဆာင္ေသာ႐ုံးမွားယြင္းေနပါသည္။');
                                }
                            }else{
                                return back()->withInput()->withErrors('ၿမိဳ႕ | တိုင္း | ျပည္နယ္မွားယြင္းေနပါသည္။');
                            }
                        }else{
                            return back()->withInput()->withErrors('ကိုယ္ပိုင္အမွတ္မွားယြင္းေနပါသည္။');
                        }
                    }else{
                        return back()->withInput()->withErrors('မွတ္ပုံတင္အမွတ္မွားယြင္းေနပါသည္။');
                    }
                }else{
                    return back()->withInput()->withErrors('ရာထူး | ႒ာန မွားယြင္းေနပါသည္။');
                }
            }else{
                return back()->withInput()->withErrors('အမည္မွားယြင္းေနပါသည္။');
            }
        }else{
            return back()->withInput()->withErrors('မွတ္ပုံတင္အမွတ္မွားယြင္းေနပါသည္။');
        }
    }

    public function checkenglish(Request $request)
    {
        $number = $request->NationalNumber;
        $enguser = BasicUserEng::where('NationalNumber',$number)->first();
        if($enguser){
            $personalNumber = $enguser->PersonalNumber;
            $user = BasicUser::where('PersonalNumber',$personalNumber)->first();
            if($enguser->Name === $request->Name){
                if($enguser->PositionDepartment === $request->PositionDepartment){
                    if($enguser->NationalNumber === $request->NationalNumber){
                        if($enguser->PersonalNumber === $request->PersonalNumber){
                            if($enguser->CityTineState === $request->CityTineState){
                                if($enguser->CurrentOffice === $request->CurrentOffice){
                                    $personalNumber = $enguser->PersonalNumber;
                                    $user = BasicUser::where('PersonalNumber',$personalNumber)->firstOrFail();
                                    session()->put('user',[
                                        'NationalNumber' => $user->NationalNumber,
                                        'MoneyLeft' => $user->MoneyLeft,
                                    ]);
                                    
                                    return redirect()->route('landing.page');
                                }else{
                                    return back()->withInput()->withErrors('လက္ရွိတာဝန္ထမ္းေဆာင္ေသာ႐ုံးမွားယြင္းေနပါသည္။');
                                }
                            }else{
                                return back()->withInput()->withErrors('ၿမိဳ႕ | တိုင္း | ျပည္နယ္မွားယြင္းေနပါသည္။');
                            }
                        }else{
                            return back()->withInput()->withErrors('ကိုယ္ပိုင္အမွတ္မွားယြင္းေနပါသည္။');
                        }
                    }else{
                        return back()->withInput()->withErrors('မွတ္ပုံတင္အမွတ္မွားယြင္းေနပါသည္။');
                    }
                }else{
                    return back()->withInput()->withErrors('ရာထူး | ႒ာန မွားယြင္းေနပါသည္။');
                }
            }else{
                return back()->withInput()->withErrors('အမည္မွားယြင္းေနပါသည္။');
            }
        }else{
            return back()->withInput()->withErrors('မွတ္ပုံတင္အမွတ္မွားယြင္းေနပါသည္။');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $number = session()->get('user')['NationalNumber'];
        $user = BasicUser::where('NationalNumber',$number)->first();

        $this->validate($request,[
            'PhNumber' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'AddressLine1' => 'required',
            'AddressLine2' => 'required',
            'City' => 'required',
            'State' => 'required',
        ]);
        $user = BasicUser::find($user->id);

        $user->PhNumber = $request->PhNumber;
        $user->AddressLine1 = $request->AddressLine1;
        $user->AddressLine2 = $request->AddressLine2;
        $user->City = $request->City;
        $user->State = $request->State;
        $user->save();

        return redirect()->route('profile.index')->with('success_message','Your account has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Cart::destroy();
        session()->forget('user','coupon');

        return redirect()->route('user.login');
    }
}
