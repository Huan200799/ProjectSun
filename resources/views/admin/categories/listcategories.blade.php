@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ trans('message.cate')}}</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th scope="col">{{ trans('message.id')}}</th>
                            <th scope="col">{{ trans('message.categoriesname')}}</th>
                            <th scope="col">{{ trans('message.parentid')}}</th>
                            <th scope="col">{{ trans('message.Edit')}}</th>
                            <th scope="col">{{ trans('message.Delete')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($catelist as $cate)
                        <tr>
                            <th scope="row">{{$cate->id}}</th>
                            <td>{{$cate->categories_name}}</td>
                            <td>{{$cate->parent_id}}</td>
                            <td ><a href="{{asset('admin/categories/'.$cate->id.'/edit')}}"><input type="submit" name="submit" value="Edit" class="btn btn-primary" id="button"></a></td>
                            <form method="POST" action="{{asset('admin/categories/'.$cate->id)}}">
                                {{csrf_field()}}
                                @method('DELETE')
                                <td><input type="submit" name="submit" value="Delete" class="btn btn-primary" id="button"></td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($catelist->hasPages())
                    {{ $catelist->links() }}
                @endif
            </div>
        </div>
    </div>
@stop
