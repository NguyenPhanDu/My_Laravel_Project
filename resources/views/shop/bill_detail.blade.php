@extends('shop.shared.layout')
@section('css')
<link rel="stylesheet" type="text/css" href="{!! asset('shop/styles/cart.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! asset('shop/styles/cart_responsive.css')!!}">
@endsection

@section('content')
<!-- Home -->

<div class="home">
    <div class="home_container d-flex flex-column align-items-center justify-content-end">
        <div class="home_content text-center">
            <div class="home_title">Chi tiết hóa đơn</div>
            <div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
                <ul class="d-flex flex-row align-items-start justify-content-start text-center">
                    <li><a href="{{route('index-shop')}}">Home</a></li>
                    <li id="cc">Your Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Cart -->

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="cart_container">

                    <!-- Cart Bar -->
                    <div class="cart_bar">
                        <ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
                            <li class="mr-auto">Sản phẩm</li>
                            <li>Đơn giá</li>
                            <li>Số lượng</li>
                            <li>Tổng tiền</li>
                        </ul>
                    </div>

                    <!-- Cart Items -->
                    <div class="cart_items" id="list-cart-item">
                        <ul class="cart_items_list">
                            @foreach($billDetail as $item)
                            <!-- Cart Item -->
                            <li
                                class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                <div
                                    class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                    <div>
                                        <div class="product_image"><img src="{{asset('images/'.$item->productImage)}}"
                                                alt=""></div>
                                    </div>
                                    <div class="product_name_container">
                                        <div class="product_name"><a href="#">{{$item->productName}}</a></div>
                                        <div class="product_text">{{$item->description}}</div>
                                    </div>
                                </div>
                                <div class="product_price product_text"><span>Price:
                                    </span>{{number_format($item->unit_price)}}đ</div>
                                <div class="product_quantity_container">
                                    <div class="product_quantity ml-lg-auto mr-lg-auto text-center">
                                        <span class="product_text product_num">{{$item->quantity}}</span>
                                    </div>
                                </div>
                                <div class="product_total product_text"><span>Total:
                                    </span>{{number_format($item->total)}}đ</div>
                            </li>
                            @endforeach
                        </ul>


                    </div>

                </div>
            </div>
        </div>

        <div class="row cart_extra_row">
            
            <div class="col-lg-6 cart_extra_col">
                @foreach($bills as $item)
                <div class="cart_extra cart_extra_2">
                    <div class="cart_extra_content cart_extra_total">
                        <div class="cart_extra_title">Tổng hóa đơn</div>
                        <ul class="cart_extra_total_list">
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_extra_total_title">Tổng tiền sản phẩm</div>
                                <div class="cart_extra_total_value ml-auto">{{number_format($item->total)}}</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_extra_total_title">Phí vận chuyển</div>
                                <div class="cart_extra_total_value ml-auto">Miễn phí</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_extra_total_title">Tổng tiền hóa đơn</div>
                                <div class="cart_extra_total_value ml-auto">{{number_format($item->total)}}</div>
                            </li>
                        </ul>
                        
                    </div>
                </div>
                @endforeach
            </div>


            <div class="col-lg-6 cart_extra_col">
                @foreach($customer as $item)
                <div class="cart_extra cart_extra_2">
                    <div class="cart_extra_content cart_extra_total">
                        <div class="cart_extra_title">Thông tin khách hàng</div>
                        <ul class="cart_extra_total_list">
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_extra_total_title">Tên khách hàng</div>
                                <div class="cart_extra_total_value ml-auto">{{$item->customer_name}}</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_extra_total_title">Giới tính</div>
                                <div class="cart_extra_total_value ml-auto">{{$item->sex}}</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_extra_total_title">Số điện thoại</div>
                                <div class="cart_extra_total_value ml-auto">{{$item->phone_number}}</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_extra_total_title">Địa chỉ Email</div>
                                <div class="cart_extra_total_value ml-auto">{{$item->customer_email}}</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_extra_total_title">Địa chỉ giao hàng</div>
                                <div class="cart_extra_total_value ml-auto">{{$item->ardress}}</div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="checkout_button trans_200"><a href="{{ url()->previous() }}">Trở lại</a></div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script src="{!! asset('shop/js/cart.js')!!}"></script>
@endsection