<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart');
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
}