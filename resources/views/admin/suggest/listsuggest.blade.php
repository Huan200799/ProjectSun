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
                            <th scope="col">{{ trans('message.ten')}}</th>
                            <th scope="col">{{ trans('message.anh')}}</th>
                            <th scope="col">{{ trans('message.description')}}</th>
                            <th scope="col">{{ trans('message.gopy')}}</th>
                            <th scope="col">{{ trans('message.price')}}</th>
                            <th scope="col">{{ trans('message.iduser')}}</th>
                            <th scope="col">{{ trans('message.cate')}}</th>
                            <th scope="col">{{ trans('message.chapnhan')}}</th>
                            <th scope="col">{{ trans('message.Delete')}}</th>
                            </tr>
                    </thead>
                    <tbody>
                    @foreach($listsuggest as $suggest)
                        <tr>
                            <form method="post" action="{{asset('admin/suggest/'.$suggest->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('PUT')
                            <th scope="row">{{$suggest->id}}</th>
                            <td>{{$suggest->product_name}}</td>
                            <td>{{$suggest->product_img}}</td>
                            <td>{{$suggest->description}}</td>
                            <td>{{$suggest->reason}}</td>
                            <td>{{$suggest->price}}</td>
                            <td>{{$suggest->categories_id}}</td>
                            <td>{{$suggest->user_id}}</td>
                            @if($suggest->status == 1)
                                <td ><a href=""><input type="submit" name="submit" value="Accept" class="btn btn-primary" id="button"></a></td>
                            @else
                                <td class="btn btn-danger mt-2">Watched</td>
                            @endif
                            </form>
                            <form method="POST" action="{{asset('admin/suggest/'.$suggest->id)}}">
                                {{csrf_field()}}
                                @method('DELETE')
                                <td><input type="submit" name="submit" value="Delete" class="btn btn-primary" id="button"></td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($listsuggest->hasPages())
                    {{ $listsuggest->links() }}
                @endif
            </div>
        </div>
    </div>
@stop
