<?php

namespace App\Http\Controllers;

use App\Models\BasicUser;
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
        return view('login');
    }

    /**
     * Checking login Crendotional.
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $font = MyanFont::fontDetect($request->Name);

        if($font == "zawgyi"){
            $Name = MyanFont::zg2uni($request->Name);
            $PositionDepartment = MyanFont::zg2uni($request->PositionDepartment);
            $NationalNumber = MyanFont::zg2uni($request->NationalNumber);
            $PersonalNumber = MyanFont::zg2uni($request->PersonalNumber);
            $CityTineState = MyanFont::zg2uni($request->CityTineState);
            $CurrentOffice = MyanFont::zg2uni($request->CurrentOffice);

            $number = $NationalNumber;
            $user = BasicUser::where('NationalNumber',$number)->first();
            if($user){
                if($user->Name === $Name){
                    if($user->PositionDepartment === $PositionDepartment){
                        if($user->NationalNumber === $NationalNumber){
                            if($user->PersonalNumber === $PersonalNumber){
                                if($user->CityTineState === $CityTineState){
                                    if($user->CurrentOffice === $CurrentOffice){
                                        session()->put('user',[
                                            'NationalNumber' => $user->NationalNumber,
                                            'MoneyLeft' => $user->MoneyLeft,
                                        ]);
                                        
                                        return redirect()->route('landing.page');
                                    }else{
                                        return redirect()->route('user.login')->withErrors('လက်ရှိတာဝန်ထမ်းဆောင်သောရုံးမှားယွင်းနေပါသည်။');
                                    }
                                }else{
                                    return redirect()->route('user.login')->withErrors('မြို့ | တိုင်း | ပြည်နယ်မှားယွင်းနေပါသည်။');
                                }
                            }else{
                                return redirect()->route('user.login')->withErrors('ကိုယ်ပိုင်အမှတ်မှားယွင်းနေပါသည်။');
                            }
                        }else{
                            return redirect()->route('user.login')->withErrors('မှတ်ပုံတင်အမှတ်မှားယွင်းနေပါသည်။');
                        }
                    }else{
                        return redirect()->route('user.login')->withErrors('ရာထူး | ဋ္ဌာန မှားယွင်းနေပါသည်။');
                    }
                }else{
                    return redirect()->route('user.login')->withErrors('အမည်မှားယွင်းနေပါသည်။');
                }
            }else{
                return redirect()->route('user.login')->withErrors('မှတ်ပုံတင်အမှတ်မှားယွင်းနေပါသည်။');
            }
        }elseif($font == "unicode"){
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
                                        return redirect()->route('user.login')->withErrors('လက်ရှိတာဝန်ထမ်းဆောင်သောရုံးမှားယွင်းနေပါသည်။');
                                    }
                                }else{
                                    return redirect()->route('user.login')->withErrors('မြို့ | တိုင်း | ပြည်နယ်မှားယွင်းနေပါသည်။');
                                }
                            }else{
                                return redirect()->route('user.login')->withErrors('ကိုယ်ပိုင်အမှတ်မှားယွင်းနေပါသည်။');
                            }
                        }else{
                            return redirect()->route('user.login')->withErrors('မှတ်ပုံတင်အမှတ်မှားယွင်းနေပါသည်။');
                        }
                    }else{
                        return redirect()->route('user.login')->withErrors('ရာထူး | ဋ္ဌာန မှားယွင်းနေပါသည်။');
                    }
                }else{
                    return redirect()->route('user.login')->withErrors('အမည်မှားယွင်းနေပါသည်။');
                }
            }else{
                return redirect()->route('user.login')->withErrors('မှတ်ပုံတင်အမှတ်မှားယွင်းနေပါသည်။');
            }
        }else{
                return redirect()->route('user.login')->withErrors('ဇော်ဂျီ(သို့မဟုတ်)ယူနီကုဒ်နှင့်သာရိုက်ထည့်ပါ။');
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
