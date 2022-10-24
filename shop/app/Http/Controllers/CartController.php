<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\UserAddress;

class CartController extends Controller
{
    public function cart()
    {
        $userAddress = UserAddress::all();
        return view('cart', [
            'status' => Orders::STATUS ,
            'addresses' => $userAddress
        ]);
    }
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $item = Items::findOrFail($id);
           
        $cart = session()->get('cart', []);
   
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $item->title,
                "quantity" => 1,
                "price" => $item->price,
                "image" => $item->photo
            ];
        }
           
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function numb(){
        $cart = session()->get('cart');
        $number = 0;
       foreach ($cart as $cart->quantity) {
        $number = $number+$cart->quantity;
       }
       return $number;
    }
}