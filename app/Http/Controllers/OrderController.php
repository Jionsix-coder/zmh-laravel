<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;
use App\Models\BasicUser;
use App\Models\Order;
use App\Models\OrderCode;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\CodeOfficer;
use Illuminate\Support\Str;
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
        $request->validate([
            'ordercode' => 'required',
        ]);
        //check race condition when there are lsee items available to purchase
        if($this->productAreNotLongerAvailable()){
            return back()->withErrors('Sorry! One of the item in your cart is no longer available.');
        }

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

                //decrease the quantity of all the products in the cart
                $this->decreaseQuantity();

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

                //getting codeofficer ph number
                $PersonalNumber = $user->PersonalNumber;
                $code =Str::before($PersonalNumber,'-');
                $officer= CodeOfficer::where('officecode',$code)->first();
                //dd($officer);
                $date =date('d-m-y');

                // end of getting coeofficer ph number

                $ProductName = implode(" , ",$Name);
                $ProductPrice = implode(" , ",$Price);
                $ProductQuantity = implode(" , ",$Quantity);
                // dd($totalQuantity);
// Start Of Sending Customer , Code Officer & Company //

                //sending order sms to customer
                //SMSPoh Authorization Token
                $token = setting('site.smspoh_token');

                // Prepare data for POST request
                $data = [
                    "to"      => "0"."$user->PhNumber",
                    "message" => "Zay Min Htet Co.,Ltd
Your order is received by Zay Min Htet Co.,Ltd. Your orders are:
(Order Number: $OrderId,
Product Name: $ProductName,
Item Quantity: $ProductQuantity,
Price: $ProductPrice,
Total Quantity: $totalQuantity,
Total Amount: $totalPrice)
Thank you very much for your purchase.",
                    "sender"  => "Zay Min Htet Co.,Ltd"
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

                //sending order sms to CodeOfficer
                //SMSPoh Authorization Token
                $token = setting('site.smspoh_token');

                // Prepare data for POST request
                $data = [
                    "to"      => "0"."$officer->phnumber",
                    "message" => "Zay Min Htet Co.,Ltd
(Mingalarpar)
We have purchased a total amount ($totalPrice) at Zay Min Htet Co.,Ltd.
Date - ($date).
Customer Name - ($user->Name),
Customer Ph No. - (0$user->PhNumber),
Customer Position - ($user->PositionDepartment)",
                    "sender"  => "Zay Min Htet Co.,Ltd"
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

                //sending order sms to ZMH Company
                //SMSPoh Authorization Token
                $token = setting('site.smspoh_token');

                // Prepare data for POST request
                $companyData = [
                    "to"      => "09775545655",
                    "message" => "Zay Min Htet Co.,Ltd
Order Received!!!
(Order Id: $OrderId,
Customer Name: $user->Name,
Customer Ph No. : 0$user->PhNumber,
Office: $user->CurrentOffice,
Product Name: $ProductName,
Quantity: $ProductQuantity
Total Amount : $totalPrice)",
                    "sender"  => "Zay Min Htet Co.,Ltd"
                ];


                $ch = curl_init("https://smspoh.com/api/v2/send");
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($companyData));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Authorization: Bearer ' . $token,
                        'Content-Type: application/json'
                    ]);

                curl_exec($ch);
                //

                //sending order sms to ZMH Company
                //SMSPoh Authorization Token
                $token = setting('site.smspoh_token');

                // Prepare data for POST request
                $companyData = [
                    "to"      => "09253888809",
                    "message" => "Zay Min Htet Co.,Ltd
Order Received!!!
(Order Id: $OrderId,
Customer Name: $user->Name,
Customer Ph No. : 0$user->PhNumber,
Office: $user->CurrentOffice,
Product Name: $ProductName,
Quantity: $ProductQuantity,
Total Amount : $totalPrice)",
                    "sender"  => "Zay Min Htet Co.,Ltd"
                ];


                $ch = curl_init("https://smspoh.com/api/v2/send");
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($companyData));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Authorization: Bearer ' . $token,
                        'Content-Type: application/json'
                    ]);

                curl_exec($ch);
                //

//End Of Sending SMS To Customer, Code Officer & Company//

                //Updating user Moneyleft
                $user->MoneyLeft = $user->getOriginal('MoneyLeft') + $this->getNumbers()->get('newTotal');
                $user->save();
                
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

    protected function decreaseQuantity()
    {
        foreach(Cart::content() as $item){
            $product = Product::find($item->model->id);


            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    protected function productAreNotLongerAvailable()
    {
        foreach(Cart::content() as $item){
            $product = Product::find($item->model->id);
            if($product->quantity < $item->qty){
                return true;
            }
        }

        return false;
    }
}
