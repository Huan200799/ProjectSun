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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="order-summary clearfix">
                <div class="section-title">
                    <h3 class="title">{{ trans('message.order')}}</h3>
                </div>
                    <table class="shopping-cart-table table">
                        <thead>
                            <tr>
                                <th class="text-center">{{ trans('message.image')}}</th>
                                <th class="text-center">{{ trans('message.name')}}</th>
                                <th class="text-center">{{ trans('message.price')}}</th>
                                <th class="text-center">{{ trans('message.quantity')}}</th>
                                <th class="text-center">{{ trans('message.total')}}</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $data_c = Cart::content();
                            $total = 0;
                        @endphp
                            @if(isset($data_c))
                                @foreach($data_c as $data)
                                    <tr>
                                        <td class="thumb text-center"><img src="{{asset('/image/'.$data->options->image)}}" width="80px" alt=""></td>
                                        <td class="details text-center">
                                            <a href="#">{{$data->name}}</a>
                                        </td>
                                        <td class="price text-center"><strong>{{number_format($data->price) }} {{ trans('message.vnd')}}</strong></td>
                                        <form action="cart/update_quantity" method="POST">
                                        {{csrf_field()}}
                                        <td class="qty text-center">
                                            <input class="input" type="number" min="1" name="quantity" value="{{$data->qty}}">
                                            <input class="btn" type="hidden" value="{{$data->rowId}}" name="rowId">
                                            <input class="btn btn-info" type="submit" value="Cập nhật" name="update_quantity">
                                        </td>
                                        </form>
                                        <td class="total text-center"><strong class="primary-color">{{number_format($data->qty * $data->price)}} {{ trans('message.vnd')}}</strong></td>
                                        <td class="text-right"><a href="{{route('card.delete',$data->rowId)}}"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></a></td>
                                        @php
                                        $total += $data->qty * $data->price;
                                        @endphp
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="empty" colspan="2"></th>
                                <th>{{ trans('message.total')}}</th>
                                <th colspan="2" class="total">{{number_format($total)  }} {{ trans('message.vnd')}}</th>
                                @php
                                    $total = 0;
                                @endphp
                            </tr>
                        </tfoot>
                    </table>
                <div class="pull-right">
                    <a href="{{route('place.order')}}"> <button class="primary-btn">{{ trans('message.placeorder')}}</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.components.footer')
