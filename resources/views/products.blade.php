@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Products</h1>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-sm-4">
            <img src="{{@$product['image']['image'] ?: env('APP_URL') . '/image-not-found.jpg'}}" alt="{{$product['name']}}" style="width:200px;height:200px">
            <h3>{{$product['name']}}</h3>
            <p><b>Availablity:- </b>{{ @$product['is_stock'] }}</p>
            <p><b>Size:- </b>{{ $product['size'] }}</p>
            <a href="{{ url('/product/view') }}/{{$product['id']}}" class="btn btn-primary">View</a>


        </div>
        @endforeach


    </div>
</div>
@endsection