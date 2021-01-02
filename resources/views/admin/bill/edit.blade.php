@extends('admin.shared.layout')
@section('content')
<section class="content-header">
    <h1>
        Chi tiết đơn hàng
    </h1>
    <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('bill.index') }}"> Trở lại</a>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="container123  col-md-6" style="">
                        <h4></h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-md-4">Thông tin khách hàng</th>
                                    <th class="col-md-6"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tên khách hàng</td>
                                    <td>{{$customer->customer_name}}</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td>{{$customer->phone_number}}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>{{$customer->ardress}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$customer->customer_email}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($billDetail as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{$item->productName}}</td>
                                    <td><img width="100vh" src="{{asset('images/'.$item->productImage)}}" class="img-thumbnail" alt=""></td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->unit_price}}</td>
                                    <td>{{number_format($item->total)}}VNĐ</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5"><b>Tổng tiền</b></td>
                                    <td><b class="text-red">{{number_format($bills->total)}} VNĐ</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection