@extends('admin.shared.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Thêm sản phẩm mới</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Trở lại</a>
        </div>
    </div>
</div>

<form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên sản phẩm:</strong>
                <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Hình ảnh</strong>
            <div class="custom-file">
                <input type="file" name="mainImage" onchange="loadFile(event)" id="mainImage" class="custom-file-input">
                <label for="mainImage" class="custom-file-label">Choose File</label>
            </div>
            <div class="form-group">
                <img id="output" class="img-thumbnail">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Giá bán:</strong>
                <input type="text" name="price" class="form-control" placeholder="Giá bán">
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
                <input type="text" name="description" class="form-control" placeholder="Mô tả">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
        </div>
    </div>
</form
@endsection
