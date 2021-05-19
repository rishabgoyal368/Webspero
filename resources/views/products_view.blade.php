@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Product View</h1>
    <div class="row">
        <div class="col-sm-4">
            @forelse (@$product['images'] as $image)
            <img src="{{$image['image']}}" alt="{{$product['name']}}" style="width:200px;height:200px">
            @empty
            <img src="{{ env('APP_URL') . '/image-not-found.jpg'}}" alt="{{$product['name']}}" style="width:200px;height:200px">
            @endforelse

            <h3>{{$product['name']}}</h3>
            <p><b>Size:- </b>{{ $product['size'] }}</p>

            <p><b>Color:- </b>{{ $product['color'] }}</p>
            <p><b>Price:- </b>{{ $product['price'] }}</p>

            <form action="{{ route('add_to_cart') }}" method="post">
                @csrf
                <p><b>Quantity:- </b>
                    <select name="qty" id="" required>
                        @for ($i=1;$i<=$product['quantity'];$i++) <option value="{{$i}}"> {{$i}}</option>
                            @endfor
                    </select>
                    @if ($errors->has('qty'))
                    <span class="text-danger">{{ $errors->first('qty') }}</span>
                    @endif
                </p>
                <input type="hidden" name="product_id" value="{{$product['id']}}">
                @if ($errors->has('product_id'))
                <span class="text-danger">{{ $errors->first('product_id') }}</span>
                @endif
                @if ($product['is_stock'] == 'instock')
                <button class="btn btn-success add_cart" type="submit">Add to card</button>
                @else
                <a class="btn btn-danger">{{ $product['is_stock'] }}</a>
                @endif
            </form>


        </div>



    </div>
</div>
@endsection