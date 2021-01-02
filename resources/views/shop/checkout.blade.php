@extends('shop.shared.layout')
@section('content')

@section('css')
<link rel="stylesheet" type="text/css" href="{!! asset('shop/styles/checkout.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! asset('shop/styles/checkout_responsive.css')!!}">
@endsection

<!-- Home -->

<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Đặt hàng</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="{{route('index-shop')}}">Home</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Checkout -->
		@if(Session::has("cart")!=null)
		<div class="checkout">
			<div class="container">
				<div class="row">
					
					<!-- Billing -->
					<div class="col-lg-6">
						<div class="billing">
							<div class="checkout_title">Thông tin hóa đơn</div>
							<div class="checkout_form_container">
								<form action="{{route('postCheckOut')}}" method="post" id="checkout_form" class="checkout_form">
								@csrf
									<div>
										<!-- Name -->
										<input type="text" id="checkout_company" placeholder="Họ tên" name="customer_name" class="checkout_input">
									</div>
									<div class="row" style="margin-left: 8px">
										<div class="col-lg-4">
											<span>Giới tính:</span>
										</div>
										<div class="col-lg-4">
											<input type="radio" id="male" name="gender" value="Nam">
											<label for="male">Nam</label><br>
										</div>
										<div class="col-lg-4">
											<input type="radio" id="female" name="gender" value="Nữ">
											<label for="female">Nữ</label><br>
										</div>
									</div>
									<div>
										<!-- Phone no -->
										<input type="phone" id="checkout_phone" class="checkout_input" placeholder="Số điện thoại." name="customer_phone" required="required">
									</div>
									<div>
										<!-- Email -->
										<input type="phone" id="checkout_email" class="checkout_input" placeholder="Email" name="customer_email" required="required">
									</div>
									<div>
										<!-- Address -->
										<input type="text" id="checkout_address" class="checkout_input" placeholder="Địa chỉ" name="adress" required="required">
									</div>

									<input type="submit" value="Xác nhận đặt hàng"  class="checkout_button trans_200" style="color: white; font-weight:bold; font-size: 24px; border: none">

								</form>
							</div>
						</div>
					</div>
					
					<!-- Cart Total -->
					<div class="col-lg-6 cart_col">
						<div class="cart_total">
							<div class="cart_extra_content cart_extra_total">
								<div class="checkout_title">Giỏ hàng</div>
								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Tổng tiền giỏ hàng</div>
										<div class="cart_extra_total_value ml-auto">{{number_format(Session::get('cart')->totalPrice)}}đ</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Giao hàng</div>
										<div class="cart_extra_total_value ml-auto">Free</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Tổng cộng</div>
										<div class="cart_extra_total_value ml-auto">{{number_format(Session::get('cart')->totalPrice)}}đ</div>
									</li>
								</ul>
								<div class="payment_options">
									<div class="checkout_title">Hình thức thanh toán</div>
									<ul>
										<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
											<label class="radio_container">
												<input type="radio" id="radio_1" name="payment_radio" class="payment_radio">
												<span class="radio_mark"></span>
												<span class="radio_text">Tiền mặt</span>
											</label>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		@endif
@endsection

@section('script')
<script src="{!! asset('shop/js/checkout.js') !!}"></script>
@endsecsion