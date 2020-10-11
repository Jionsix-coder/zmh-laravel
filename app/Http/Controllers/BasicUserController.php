<?php

namespace App\Http\Controllers;

use App\Models\BasicUser;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        // $request->validate([
        //     'Name' => 'required',
        //     // 'PositionDepartment' => 'required',
        //     // 'CityTineState' => 'required',
        //     // 'PersonalNumber' => 'required',
        //     // 'NationalNumber' => 'required',
        // ]);

        $number = $request->NationalNumber;
        $user = BasicUser::where('NationalNumber','LIKE','%'.$number.'%')->first();

        if($user->Name === $request->Name && $user->PositionDepartment === $request->PositionDepartment && $user->NationalNumber === $request->NationalNumber && $user->PersonalNumber === $request->PersonalNumber && $user->CityTineState === $request->CityTineState && $user->CurrentOffice === $request->CurrentOffice){
            session()->put('user',[
                'NationalNumber' => $user->NationalNumber,
                'MoneyLeft' => $user->MoneyLeft,
            ]);

            return redirect()->route('landing.page');
        }else{
            return redirect()->route('user.login')->withErrors('errors','');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('user');

        return redirect()->route('user.login');
    }
}
