@extends('admin.shared.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Thêm nhóm danh mục mới</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('catgroup.index') }}"> Trở lại</a>
        </div>
    </div>
</div>

<form action="{{ route('catgroup.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên nhóm danh mục:</strong>
                <input type="text" name="name" class="form-control" placeholder="Tên nhóm danh mục">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
        </div>
    </div>
</form
@endsection
