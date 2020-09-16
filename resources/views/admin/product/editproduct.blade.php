@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ trans('message.Product')}}</strong> <small>{{ trans('message.EditProduct')}}</small>
                    </div>
                    <div class="card-body card-block">
                        @include('errors.note')
                        <form method="post" action="{{asset('admin/product/'.$products->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('PUT')
                            <div class="form-group">
                                <label class=" form-control-label">{{ trans('message.ProductName')}}</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="text" name="product_name" required value="{{$products->product_name}}">
                                    </div>
                                <small class="form-text text-muted">ex. Sữa đổ vào trà.</small>
                            </div>
                            <div class="form-group" >
                                <label>{{ trans('message.Image')}}</label>
                                <div class="input-group">
                                    <input type="file" name="product_img" value="" accept="image/*"  onchange="showMyImage(this)" accept=".jpg, .jpeg, .png">
                                    <img id="thumbnil" src="{{asset('image/'.$products->product_img)}}" alt="">
                                </div>
                            </div>
                            <div class="form-group" >
                                <label>{{ trans('message.description')}}</label>
                                <textarea name="description">{{$products->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">{{ trans('message.price')}}</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="number" name="price" required value="{{$products->price}}">
                                    </div>
                                <small class="form-text text-muted">ex. 69.96.</small>
                            </div>
                            <label class=" form-control-label">{{ trans('message.parent')}}</label>
                            <select data-placeholder="Choose a Country..." class="standardSelect mt-3" tabindex="1" name="categories_id">
                                <option value="{{$products->categories_id}}">{{$products->categories_id}}</option>
                                    @foreach ($catelist as $cate)
                                        @if($products->categories_id != $cate->id)
                                        <option value="{{$cate->id}}">{{$cate->categories_name}}</option>
                                        @endif
                                    @endforeach
                            </select>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Edit Product" class="btn btn-primary mt-5">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@stop
