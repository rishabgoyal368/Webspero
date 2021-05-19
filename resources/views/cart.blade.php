@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Cart</h1>
    <div class="row">
        <div class="col-sm-2">Name</div>
        <div class="col-sm-2">Qty</div>
        <div class="col-sm-2">Price</div>
        <div class="col-sm-2">Action</div>
    </div>
    @forelse ($cart_items as $item)
    <div class="row">
        <div class="col-sm-2">
            <p>{{$item->product ? $item->product->name : ''}}</p>
        </div>
        <div class="col-sm-2">
            <p><span class="update_cart" data-id="{{$item->id}}" data-product_id="{{ $item->product_id }}" data-value="minus">-</span> &nbsp;&nbsp;&nbsp;
                <span class="cart_value">{{$item->qty}}</span>
                &nbsp;&nbsp;&nbsp;
                <span class="update_cart" data-id="{{$item->id}}" data-product_id="{{ $item->product_id }}" data-value="add">+</span>
            </p>
        </div>
        <div class="col-sm-2">
            <p>{{$item->product ? $item->product->price * $item->qty : ''}}</p>
        </div>
        <div class="col-sm-2">
            <a class="btn btn-danger delete_cart" data-id="{{ $item->id }}">Delete</a>
        </div>
    </div>
    @empty
    <div class="row">
        <div class="col-sm-2">
            <p>No data found!</p>
        </div>
    </div>
    @endforelse

</div>
@endsection