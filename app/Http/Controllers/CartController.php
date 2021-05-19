<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart_items = Cart::where('user_id', 1)->get();
        return view('cart', compact('cart_items'));
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
        $inputs =  $request->all();
        $validator =  Validator::make($inputs, [
            'qty' => 'required',
            'product_id' => 'required|exists:products,id',
        ]);
        if ($validator->fails()) {
            return back()->withInput($request->all())->withErrors($validator->errors());
        }
        $data['user_id'] = 1;
        $data['product_id'] = $inputs['product_id'];
        $data['qty'] = $inputs['qty'];
        Cart::store($data);
        return redirect('/show-cart')->with('success','Product addedd successfully');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $inputs =  $request->all();
        $validator =  Validator::make($inputs, [
            'id' => 'required',
            'product_id' => 'required',
            'type' => 'required',
            'value' => 'required',
        ]);
        if ($validator->fails()) {
            $response['code'] = 404;
            $response['status'] = $validator->errors()->first();
            return $response;
        }
        if ($request->type == 'add') {
            $value = (int) $request->value + 1;
        } else if ($request->type == 'minus') {
            $value = (int) $request->value - 1;
        }
        if ($value == 0) {
            Cart::where('id', $request->id)->delete();
        } else {
            $data['user_id'] = 1;
            $data['product_id'] = $inputs['product_id'];
            $data['qty'] = $value;
            Cart::store($data);
        }
        $response['code'] = 200;
        $response['status'] = 'Cart update successfully';
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $inputs =  $request->all();
        $validator =  Validator::make($inputs, [
            'id' => 'required|exists:carts,id',
        ]);
        if ($validator->fails()) {
            $response['code'] = 404;
            $response['status'] = $validator->errors()->first();
            return $response;
        }
        Cart::where('id', $request->id)->delete();
        $response['code'] = 200;
        $response['status'] = 'Cart delete successfully';
        return $response;
    }
}
