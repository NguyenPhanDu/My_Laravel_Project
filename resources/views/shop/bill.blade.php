@extends('shop.shared.layout')
@section('content')

@section('css')
<link rel="stylesheet" type="text/css" href="{!! asset('shop/styles/checkout.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! asset('shop/styles/checkout_responsive.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! asset('shop/styles/cart.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! asset('shop/styles/cart_responsive.css')!!}">
@endsection

<!-- Home -->

<div class="home">
    <div class="home_container d-flex flex-column align-items-center justify-content-end">
        <div class="home_content text-center">
            <div class="home_title">Đơn hàng của bạn</div>
            <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                    <li><a href="{{route('index-shop')}}">Trang chủ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="cart_container">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Ngày đặt hàng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Xem chi tiết</th>
                                    <th scope="col">Hủy đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bill as $item)
                                <tr>
                                    <td>{{$item->customerName}}</td>
                                    <td>{{number_format($item->total)}}đ</td>
                                    <td>{{$item->ardress}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <div><a href="{{route('billDetail',$item->id)}}"><button class="du-btn" name="btn-save">Chi tiết đơn hàng</button></a></div>
                                    </td>
                                    <td>
                                        <div><a href="{{route('userCancelBill',$item->id)}}"><button class="du-btn" name="btn-delete">Hủy đơn hàng</button></a></div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection

@section('script')
<script src="{!! asset('shop/js/checkout.js') !!}"></script>
<script src="{!! asset('shop/js/cart.js')!!}"></script>
@endsecsion