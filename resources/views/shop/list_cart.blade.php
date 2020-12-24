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
					<div class="home_title">Shopping Cart</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="{{route('index-shop')}}">Home</a></li>
							<li>Your Cart</li>
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
									<li class="mr-auto">Product</li>
									<li>Price</li>
									<li>Quantity</li>
                                    <li>Total</li>
                                    <li>Delete</li>
								</ul>
							</div>

							<!-- Cart Items -->
							<div class="cart_items" id="list-cart-item">
                            @if(Session::has("cart")!=null)
                                @foreach(Session::get('cart')->products as $item)
                                <ul class="cart_items_list">

                                    <!-- Cart Item -->
                                    <li
                                        class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
                                        <div
                                            class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
                                            <div>
                                                <div class="product_image"><img src="{{asset('images/'.$item['productInfo']->mainImage)}}" alt=""></div>
                                            </div>
                                            <div class="product_name_container">
                                                <div class="product_name"><a href="product.html">{{$item['productInfo']->name}}</a></div>
                                                <div class="product_text">{{$item['productInfo']->description}}</div>
                                            </div>
                                        </div>
                                        <div class="product_price product_text"><span>Price: </span>{{number_format($item['productInfo']->price)}}đ</div>
                                        <div class="product_quantity_container">
                                            <div class="product_quantity ml-lg-auto mr-lg-auto text-center">
                                                <span class="product_text product_num">{{$item['quantity']}}</span>
                                                <div class="qty_sub qty_button trans_200 text-center"><span>-</span></div>
                                                <div class="qty_add qty_button trans_200 text-center"><span>+</span></div>
                                            </div>
                                        </div>
                                        <div class="product_total product_text"><span>Total: </span>{{number_format($item['price'])}}đ</div>
                                        <div><a href="javascript:" onclick="deleteListCartItem({{$item['productInfo']->id}})">delete</a></div>
                                    </li>
                                </ul>
                                @endforeach
                            @endif
							</div>

							<!-- Cart Buttons -->
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="button button_clear trans_200"><a href="categories.html">clear cart</a></div>
									<div class="button button_continue trans_200"><a href="categories.html">continue shopping</a></div>
								</div>
							</div>
						</div>
					</div>
                </div>
                @if(Session::has("cart")!=null)
				<div class="row cart_extra_row">
					<div class="col-lg-6 cart_extra_col">
						<div class="cart_extra cart_extra_2">
							<div class="cart_extra_content cart_extra_total">
								<div class="cart_extra_title">Cart Total</div>
								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Subtotal</div>
										<div class="cart_extra_total_value ml-auto">{{number_format(Session::get('cart')->totalPrice)}}đ</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Shipping</div>
										<div class="cart_extra_total_value ml-auto">Free</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Total</div>
										<div class="cart_extra_total_value ml-auto">{{number_format(Session::get('cart')->totalPrice)}}đ</div>
									</li>
								</ul>
								<div class="checkout_button trans_200"><a href="checkout.html">proceed to checkout</a></div>
							</div>
						</div>
					</div>
                </div>
                @endif
			</div>
		</div>
@endsection

@section('script')
<script src="{!! asset('shop/js/cart.js')!!}"></script>
<script>
    function deleteListCartItem(id){
        console.log(id);
        $.ajax({
            url: 'fashionshop/ListCart/DeleteListCartItem/'+id,
            type: 'GET',
        }).done(function(respone){

        });
    }
</script>
@endsection
