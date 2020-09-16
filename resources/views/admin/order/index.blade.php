@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ trans('message.manageorder')}}</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ trans('message.id')}}</th>
                            <th scope="col">{{ trans('message.username')}}</th>
                            <th scope="col">{{ trans('message.total_price')}}</th>
                            <th scope="col">{{ trans('message.status')}}</th>
                            <th scope="col">{{ trans('message.action')}}</th>
                            </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <form method="post" action="{{asset('admin/order/'.$order->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('PUT')
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->user_id}}</td>
                            <td>{{$order->total_price}}</td>
                            <td scope="row">
                            @if($order->status == 'Ordered')
                                {{ 'Orderede' }}
                            @endif
                            @if($order->status == 'Being')
                                {{ 'Being transported' }}
                            @endif
                            </td>
                            <input type="text" name="email" value="{{$order->email}}" hidden>
                            @if($order->status == 'Ordered')
                                <td ><a href=""><input type="submit" name="submit" value="Accept" class="btn btn-primary" id="button"></a></td>
                            @else
                                <td class="btn btn-danger mt-2">Watched</td>
                            @endif
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($orders->hasPages())
                    {{ $orders->links() }}
                @endif
            </div>
        </div>
    </div>
@stop
