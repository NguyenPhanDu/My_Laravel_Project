@extends('admin.shared.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Sửa tài khoản</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('user.index') }}"> Trở lại</a>
        </div>
    </div>
</div>  
<form action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username</strong>
                <input type="text" name="username" class="form-control" require placeholder="Username">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password</strong>
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
        </div>
    </div>
</form
@endsection