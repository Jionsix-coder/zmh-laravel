<?php

namespace App\Http\Controllers;

use App\Models\BasicUser;
use App\Models\Order;
use App\Models\OrderCode;
use App\Models\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order_code = $request->ordercode;
        $dbordercode = OrderCode::where('ordercode',$order_code)->first();
        
        if($dbordercode === null ){
            return redirect()->route('cart.index')->withErrors('ကုဒ်မှားယွင်းနေပါသည်!!!');
        }else{
            $number = session()->get('user')['NationalNumber'];
            $user = BasicUser::where('NationalNumber',$number)->first();
    
            $this->addToOrderTables($user,null);
    
            //Successful
            Cart::instance('default')->destroy();
            session()->forget('coupon');

            //delete selected order code
            OrderCode::where('ordercode',$order_code)->delete();

    
            return redirect()->route('confirmation.index')->with('success_message','Thanks you! Your order has been successfully accepted!');
        }
       
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
    public function destroy($id)
    {
        //
    }

    protected function addToOrderTables($user,$error)
    {
        //Insert into order table
        $order = Order::create([
            'user_id' => $user->id,
            'account_name' => $user->Name,
            'position_department' => $user->PositionDepartment,
            'city_tine_state' => $user->CityTineState,
            'personal_number' => $user->PersonalNumber,
            'national_number' => $user->NationalNumber,
            'current_office' => $user->CurrentOffice,
            'discount' => $this->getNumbers()->get('discount'),
            'discount_code' => $this->getNumbers()->get('discount_code'),
            'subtotal' => $this->getNumbers()->get('newSubtotal'),
            'total' => $this->getNumbers()->get('newTotal'),
            'error'=> $error,

        ]);
        //insert into order_product table
        foreach(Cart::content() as $item){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }
    }

    private function getNumbers()
    {
        $discount = session()->get('coupon')['discount'] ?? 0;
        $discount_code = session()->get('coupon')['name'] ?? null;
        $newSubtotal = (Cart::subtotal() - $discount );
        $newTotal = $newSubtotal;
        return collect([
            'discount' => $discount,
            'discount_code' => $discount_code,
            'newSubtotal' => $newSubtotal,
            'newTotal' => $newTotal,
        ]); 
    }
}
