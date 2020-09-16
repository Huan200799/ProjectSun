@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-xs-9 col-sm-9">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ trans('message.cate')}}</strong> <small>{{ trans('message.addcate')}}</small>
                    </div>
                    <div class="card-body card-block">
                        @include('errors.note')
                        <form method="post" action="{{asset('admin/categories')}}">
                            {{csrf_field()}}
                            <div class="form-group" action="{{asset('admin/categories')}}">
                                <label class=" form-control-label">{{ trans('message.catename')}}</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="text" name="categories_name" required>
                                    </div>
                                <small class="form-text text-muted">ex. Sữa đổ vào trà.</small>
                            </div>
                            <label class=" form-control-label">{{ trans('message.parent')}}</label>
                            <select data-placeholder="Choose a Country..." class="standardSelect mt-3" tabindex="1" name="parent_id">
                                <option value="" label="Chọn Category"></option>
                                @foreach($catelist as $cate)
                                    <option value="{{$cate->id}}">{{$cate->categories_name}}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Add Category" class="btn btn-primary mt-5">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@stop
