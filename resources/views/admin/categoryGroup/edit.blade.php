@extends('admin.shared.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Chỉnh sửa danh mục</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('catgroup.index')}}"> Trở lại</a>
        </div>
    </div>
</div>


<form action="{{ route('catgroup.update',$categoryGroup->id) }}" method="POST">
    @csrf
    @method('PUT')

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên danh mục:</strong>
                <input type="text" name="name" value="{{ $categoryGroup->name }}" class="form-control" placeholder="Tên danh mục">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Xác nhận</button>
        </div>
    </div>

</form>
@endsection
