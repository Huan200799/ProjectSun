@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ trans('message.Product')}}</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ trans('message.id')}}</th>
                            <th scope="col">{{ trans('message.ProductName')}}</th>
                            <th scope="col">{{ trans('message.Image')}}</th>
                            <th scope="col">{{ trans('message.description')}}</th>
                            <th scope="col">{{ trans('message.price')}}</th>
                            <th scope="col">{{ trans('message.cate')}}</th>
                            <th scope="col">{{ trans('message.Edit')}}</th>
                            <th scope="col">{{ trans('message.Delete')}}</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_img}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->categories_id}}</td>
                            <td ><a href="{{asset('admin/product/'.$product->id.'/edit')}}"><input type="submit" name="submit" value="Edit" class="btn btn-primary" id="button"></a></td>
                            <form method="POST" action="{{asset('admin/product/'.$product->id)}}">
                                {{csrf_field()}}
                                @method('DELETE')
                                <td><input type="submit" name="submit" value="Delete" class="btn btn-primary" id="button"></td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($products->hasPages())
                    {{ $products->links() }}
                @endif
            </div>
        </div>
    </div>
@stop
