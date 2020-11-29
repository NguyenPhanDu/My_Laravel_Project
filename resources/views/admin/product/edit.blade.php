@extends('admin.shared.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Chỉnh sửa danh mục</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('product.index')}}"> Trở lại</a>
        </div>
    </div>
</div>


<form action="{{route('product.update',$product->id)}}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')

     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên sản phẩm:</strong>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Tên sản phẩm">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hình ảnh:</strong>
                <input type="text" name="mainImage" value="{{ $product->mainImage }}"class="form-control" placeholder="Hình ảnh">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Giá bán:</strong>
                <input type="text" name="price"value="{{ $product->price }}"class="form-control" placeholder="Giá bán">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Danh mục:</strong>
                {{-- <input type="text" name="categoryId" class="form-control" placeholder="Name"> --}}
                <select name="categoryId" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mô tả: </strong>
                <input type="text" name="description" value="{{ $product->description }}" class="form-control" placeholder="Mô tả">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
        </div>
    </div>

</form>
@endsection
