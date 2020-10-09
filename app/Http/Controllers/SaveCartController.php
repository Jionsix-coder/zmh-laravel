<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SaveCartController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('saveCart')->remove($id);

        return back()->with('success_message','Item has been Removed!');
    }

    /**
     * switch item from save cart to cart
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($id)
    {
        $item = Cart::instance('saveCart')->get($id);

        Cart::instance('saveCart')->remove($id);

        $duplicates = Cart::instance('default')->search(function( $cartItem, $rowId) use ($id){
            return $rowId === $id;
        });
        
        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.save')->with('success_message','Item is already in your savecart');
        }

        Cart::instance('default')->add($item->id, $item->name,1,$item->price)
              ->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('success_message','Item has been moved to cart');
    }
}

