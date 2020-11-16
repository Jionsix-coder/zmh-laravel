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
            if($user->NationalNumber === $request->NationalNumber){
                if($user->PersonalNumber === $request->PersonalNumber){
                            session()->put('user',[
                                'PersonalNumber' => $user->PersonalNumber,
                                'NationalNumber' => $user->NationalNumber,
                                'MoneyLeft' => $user->MoneyLeft,
                            ]);
                            
                            return redirect()->route('landing.page');
                }else{
                    return back()->withInput()->withErrors('ကိုယ်ပိုင်အမှတ်မှားယွင်းနေပါသည်။');
                }
            }else{
                return back()->withInput()->withErrors('မှတ်ပုံတင်အမှတ်မှားယွင်းနေပါသည်။');
            }
        }else{
            return back()->withInput()->withErrors('မှတ်ပုံတင်အမှတ်မှားယွင်းနေပါသည်။');
        }
    }

    public function checkenglish(Request $request)
    {
        $number = $request->NationalNumber;
        $enguser = BasicUserEng::where('NationalNumber',$number)->first();
        if($enguser){
            $personalNumber = $enguser->PersonalNumber;
            $user = BasicUser::where('PersonalNumber',$personalNumber)->first();
            
            if($enguser->NationalNumber === $request->NationalNumber){
                if($enguser->PersonalNumber === $request->PersonalNumber){
                            $personalNumber = $enguser->PersonalNumber;
                            $user = BasicUser::where('PersonalNumber',$personalNumber)->firstOrFail();
                            session()->put('user',[
                                'PersonalNumber' => $user->PersonalNumber,
                                'NationalNumber' => $user->NationalNumber,
                                'MoneyLeft' => $user->MoneyLeft,
                            ]);
                            
                            return redirect()->route('landing.page');
                }else{
                    return back()->withInput()->withErrors('Personal Number Wrong!!!');
                }
            }else{
                return back()->withInput()->withErrors('National Number Wrong!!!');
            }
        }else{
            return back()->withInput()->withErrors('National Number Wrong!!!');
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
        $personalNumber =session()->get('user')['PersonalNumber'];
        $user = BasicUser::where('NationalNumber',$number)->first();
        $usereng = BasicUserEng::where('PersonalNumber',$personalNumber)->first();

        $this->validate($request,[
            'PhNumber' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'AddressLine1' => 'required',
            'City' => 'required',
            'State' => 'required',
        ]);
        $user = BasicUser::find($user->id);
        $usereng = BasicUserEng::find($usereng->id);

        $user->PhNumber = $request->PhNumber;
        $user->AddressLine1 = $request->AddressLine1;
        $user->AddressLine2 = $request->AddressLine2;
        $user->City = $request->City;
        $user->State = $request->State;
        $user->save();

        $usereng->PhNumber = $request->PhNumber;
        $usereng->AddressLine1 = $request->AddressLine1;
        $usereng->AddressLine2 = $request->AddressLine2;
        $usereng->City = $request->City;
        $usereng->State = $request->State;
        $usereng->save();

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
