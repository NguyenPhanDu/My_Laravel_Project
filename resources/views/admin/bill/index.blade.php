@extends('admin.shared.layout')
@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Tên khách hàng</th>
        <th>Tổng tiền</th>
        <th>Địa chỉ</th>
        <th>Ngày đặt hàng</th>
        <th>Trạng thái</th>
        <th>Action</th>
    </tr>
    @foreach($bills as $item)
    <tr>
        
        <td>{{$item->id}}</td>
        <td>{{$item->customer_name}}</td>
        <td>{{$item->total}}</td>
        <td>{{$item->ardress}}</td>
        <td>{{$item->created_at}}</td>
        <td>{{$item->status}}</td>
        <td>

                <a class="btn btn-warning" href="{{route('bill.edit',$item->id)}}">Chi tiết đơn hàng</a>
                
                <a class="btn btn-danger" href="{{route('userCancelBill',$item->id)}}">Hủy đơn hàng</a>

            <form action="{{route('bill.update',$item->id)}}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>
            </form>


        </td>
        
    </tr>
    @endforeach
</table>
@endsection