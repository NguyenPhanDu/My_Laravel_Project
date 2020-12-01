@extends('admin.shared.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
        <a class="btn btn-success" href="{{route('product.create')}}"> Tạo sản phẩm mới </a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá bán</th>
        <th>Danh mục</th>
        <th>Mô tả</th>
        <th>Action</th>
    </tr>
    @foreach ($products as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td><img width="100vh" src="{{asset('images/'.$item->mainImage)}}" class="img-thumbnail" alt=""></td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->categoryId }}</td>
        <td>{{ $item->description }}</td>
        <td>
            <form action="{{route('product.destroy',$item->id)}}" method="POST">
                <a class="btn btn-info" href="">Show</a>

                <a class="btn btn-primary" href="{{route('product.edit',$item->id)}}">Edit</a>

                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
