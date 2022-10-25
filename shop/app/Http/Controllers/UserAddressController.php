<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Models\User;


class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('address.index', [
            'addresses' => UserAddress::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    public function list()
    {
        
        return view('address.list', [
            'addresses' => UserAddress::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserAddressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userAddress = new UserAddress;
        $userAddress->user_id = $request->user_id;
        $userAddress->address = $request->address;
        $userAddress->city = $request->city;
        $userAddress->postal_code = $request->postal_code;
        $userAddress->phone = $request->phone;
        $userAddress->save();
        return redirect()->route('ua_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function show(UserAddress $userAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAddress $userAddress)
    {
        return view('address.edit', [
            'userAddress' => $userAddress
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserAddressRequest  $request
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserAddress $userAddress)
    {
        $userAddress->update([
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'phone' => $request->phone,
    ]);
        return redirect()->route('ua_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAddress $userAddress)
    {
        $userAddress->delete();
        return redirect()->route('ua_list')->with('ok', 'Order deleted');
    }
}
