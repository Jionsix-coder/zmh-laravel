<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;
use App\Models\BasicUser;
use App\Models\Order;
use App\Models\OrderCode;
use App\Models\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $number = session()->get('user')['NationalNumber'];
        $user = BasicUser::where('NationalNumber',$number)->first();
        if($user->AddressLine1 !== null){
            $order_code = $request->ordercode;
            $dbordercode = OrderCode::where('ordercode',$order_code)->first();
            
            if($dbordercode === null ){
                return redirect()->route('cart.index')->withErrors('ကုဒ်မှားယွင်းနေပါသည်!!!');
            }else{
                $number = session()->get('user')['NationalNumber'];
                $user = BasicUser::where('NationalNumber',$number)->first();
        
                $order = $this->addToOrderTables($user,null);

                $dborder = Order::find($order->id);
                $totalPrice = $order->total;
                $totalQuantity = Cart::count();
                $products = $dborder->products->all();
                //dd($products);
                foreach($products as $key => $product):
                    $OrderId = $order->id;
                    $Name[$key] = $product->name;
                    $Price[$key] = $product->price;
                    $Quantity[$key] = $product->pivot->quantity;
                endforeach;

                $ProductName = implode(" , ",$Name);
                $ProductPrice = implode(" , ",$Price);
                $ProductQuantity = implode(" , ",$Quantity);
                // dd($totalQuantity);

                //sending order sms
                //SMSPoh Authorization Token
                $token = "6F5vmaxSvlg73g6Aq5kkn95CQBajbh3QqdnZyWg8hiyGrBr7l4vS-8Cp4M6o3bG6";

                // Prepare data for POST request
                $data = [
                    "to"      => "0"."$user->PhNumber",
                    "message" => "Unicode(ယူနီကုဒ်): 
သင့်အော်ဒါကိုဇေမင်းထက်ကုမ္ပဏီမှလက်ခံရရှိပါသည်။ သင်တင်လိုက်သောအော်ဒါများမှာ- 
( အော်ဒါနံပါတ် : $OrderId , 
ဝယ်ယူသည့်ပစ္စည်းအမည် :$ProductName , 
ပစ္စည်းအရေအတွက် : $ProductQuantity , 
ပစ္စည်းဈေးနူန်း : $ProductPrice , 
စုစုပေါင်းအရေအတွက် : $totalQuantity , 
စုစုပေါင်းကျသင့်ငွေ : $totalPrice ) 
ဝယ်ယူသည့်အတွက်အထူးပင်ကျေးဇူးတင်ရှိပါသည်။
Zawgyi(ေဇာ္ဂ်ီ):
သင့္ေအာ္ဒါကိုေဇမင္းထက္ကုကုမၸဏီမွလက္ခံရရွိပါသည္။ သင္တင္လိုက္ေသာေအာ္ဒါမ်ားမွာ- 
(  ေအာ္ဒါနံပါတ္ : $OrderId , 
ဝယ္ယူသည့္ပစၥည္းအမည္ :$ProductName , 
ပစၥည္းအေရအတြက္ : $ProductQuantity ,
ပစၥည္းေဈးႏူန္း : $ProductPrice , 
စုစုေပါင္းအေရအတြက္ : $totalQuantity , 
စုစုေပါင္းက်သင့္ေငြ : $totalPrice ) 
ဝယ္ယူသည့္အတြက္အထူးပင္ေက်းဇူးတင္ရွိပါသည္။ ",
                    "sender"  => "Zay Min Htet Co.Ltd"
                ];


                $ch = curl_init("https://smspoh.com/api/v2/send");
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Authorization: Bearer ' . $token,
                        'Content-Type: application/json'
                    ]);

                curl_exec($ch);
                // 
                
                //Successful
                Cart::instance('default')->destroy();
                session()->forget('coupon');

                //delete selected order code
                OrderCode::where('ordercode',$order_code)->delete();

        
                return redirect()->route('confirmation.index')->with('success_message','Thanks you! Your order has been successfully accepted!');
            }
        }else{
            return redirect()->route('cart.index')->withErrors('အကောင့်သို့ဝင်၍သင့်နေရပ်လိပ်စာထည့်သွင်းရန်လိုအပ်ပါသည်။');
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

        return $order;
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
