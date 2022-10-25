<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // dd(Orders::orderBy('updated_at', 'desc')->get());
        return view('order.index', [
            'orders' => Orders::orderBy('updated_at', 'desc')->get(),
            'status' => Orders::STATUS 
        ]);
    }

    public function list()
    {


        // dd(Orders::orderBy('updated_at', 'desc')->get());
        return view('order.list', [
            'orders' => Orders::orderBy('updated_at', 'desc')->get(),
            'status' => Orders::STATUS 
        ]);
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
     * @param  \App\Http\Requests\StoreOrdersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Orders::create([
            'user_id' => $request->user_id,
            'status' => $request->status,
            'item_id' => json_encode($request->session()->get('cart')),
            'total' => $request->total,
        ]);
        $request->session()->forget('cart');
        
        return redirect()->route('o_index');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $order)
    {
        return view('order.edit', [
            'orders' => $order,
            'status' => Orders::STATUS 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrdersRequest  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {

        $orders->update([

            'status' => $request->status,

        ]);
        return redirect()->route('o_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $order)
    {
        $order->delete();
        return redirect()->route('o_index')->with('ok', 'Order deleted');
    }
}
