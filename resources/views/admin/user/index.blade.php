@extends('admin.shared.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
        <a class="btn btn-success" href="{{route('user.create')}}"> Tạo tài khoản mới </a>
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
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    @foreach ($users as $item)
    <tr>
        <td>{{ $item->username }}</td>
        <td>{{$item->email}}</td>
        <td>
            <form action="{{route('user.destroy',$item->id)}}" method="POST">
                <a class="btn btn-primary" href="{{route('user.edit',$item->id)}}">Edit</a>
                <a class="btn btn-warning" href="#">Block</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection