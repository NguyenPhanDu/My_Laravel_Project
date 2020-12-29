@extends('admin.shared.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Thêm tài khoản mới</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('user.index') }}"> Trở lại</a>
        </div>
    </div>
</div>
    @if(Session::has('passEr'))
        <div class="alert alert-success">
            {{ Session::get('passEr') }}
        </div>
    @endif	   
<form action="{{ route('user.store') }}" enctype="multipart/form-data" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username</strong>
                <input type="text" name="username" class="form-control" require placeholder="Username">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                <input type="text" name="email" class="form-control" require placeholder="Email">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password</strong>
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Xác nhận Password</strong>
                <input type="password" name="password_confirm" class="form-control" placeholder="Xác nhận Mật khẩu">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rule</strong>
                <input type="text" name="rule" class="form-control" placeholder="Vai trò">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
        </div>
    </div>
</form
@endsection