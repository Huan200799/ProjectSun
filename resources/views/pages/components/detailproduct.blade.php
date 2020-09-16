<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('message.title')}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

@include('pages.components.header')
@if(isset($products))
    @foreach($products as $product)
    @endforeach
@endif
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <img src="{{'/image/'.$product->product_img}}" alt="error image">
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$product->product_name}}</h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">{{ trans('message.totalreview')}}</span>
                    </div>
                    <p class="product-description">{{$product->description}}</p>
                    <h4 class="price">{{ trans('message.currentprice')}}Current price: <span>{{$product->price}}{{ trans('message.vnd')}}</span></h4>
                    <form action="{{route('cart')}}" method="post">
                        {{csrf_field()}}
                        <div class="product-btns">
                            <div class="qty-input">
                                <span class="text-uppercase">{{ trans('message.qty')}}</span>
                                <input name="quantity" class="input" type="number" min="1" value="1">
                                <input name="product_id_hidden" class="input" type="hidden"  value="{{$product->id}}">
                            </div>
                            <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> {{ trans('message.addtocart')}}</button>
                            <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.components.footer')
