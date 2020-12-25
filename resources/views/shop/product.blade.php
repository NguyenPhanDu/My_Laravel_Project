@extends('shop.shared.layout')
@section('css')
<link rel="stylesheet" type="text/css" href="{!! asset('shop/plugins/flexslider/flexslider.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! asset('shop/styles/product.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! asset('shop/styles/product_responsive.css')!!}">
@endsection
@section('content')
    <!-- Home -->

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Product Page</div>
					@if($product !=null)
					<p>ok</p>
					@endif
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="#">Home</a></li>
							<li><a href="category.html">Woman</a></li>
							<li>New Products</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		@foreach($product as $item)
			<!-- Product -->
		<div class="product">
			<div class="container">
				<div class="row">
					
					<!-- Product Image -->
					<div class="col-lg-6">
						<div class="product_image">
							<div id="slider" class="flexslider">
								<ul class="slides">
									<li>
										<img src="{{asset('images/'.$item->mainImage)}}" />
									</li>
								</ul>
							</div>
							<div class="carousel_container" hidden='true'>
								<div id="carousel" class="flexslider">
									<ul class="slides">
										<li>
											<div><img src="{{asset('images/'.$item->mainImage)}}" /></div>
										</li>
									</ul>
								</div>
								<div class="fs_prev fs_nav disabled"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
								<div class="fs_next fs_nav"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>

					<!-- Product Info -->
					<div class="col-lg-6 product_col">
						<div class="product_info">
							<div class="product_name">{{$item->name}}</div>
							<div class="product_category">In <a href="category.html">Category</a></div>
							<div class="product_price">{{number_format($item->price)}} Đ</div>
							<div class="product_size">
								<div class="product_size_title">Select Size</div>
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<li>
										<input type="radio" id="radio_1" disabled name="product_radio" class="regular_radio radio_1">
										<label for="radio_1">XS</label>
									</li>
									<li>
										<input type="radio" id="radio_2" name="product_radio" class="regular_radio radio_2" checked>
										<label for="radio_2">S</label>
									</li>
									<li>
										<input type="radio" id="radio_3" name="product_radio" class="regular_radio radio_3">
										<label for="radio_3">M</label>
									</li>
									<li>
										<input type="radio" id="radio_4" name="product_radio" class="regular_radio radio_4">
										<label for="radio_4">L</label>
									</li>
									<li>
										<input type="radio" id="radio_5" name="product_radio" class="regular_radio radio_5">
										<label for="radio_5">XL</label>
									</li>
									<li>
										<input type="radio" id="radio_6" disabled name="product_radio" class="regular_radio radio_6">
										<label for="radio_6">XXL</label>
									</li>
								</ul>
							</div>
							<div class="product_text">
							<div>{!! $item->content !!}</div>
							<input hidden id="detail-product-id" type="text" value="{{$item->id}}">
							</div>
							<div class="product_buttons">
								<div class="text-right d-flex flex-row align-items-start justify-content-start">
									<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
										<div><div><img src="{{ asset('shop/images/heart_2.svg')}}" class="svg" alt=""><div>+</div></div></div>
									</div>
									<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
										<div>
											<div id="add-Cart"><img src="{{ asset('shop/images/cart.svg')}}" class="svg" alt=""><div>+</div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		
@endsection

@section('script')
<script src="{!! asset('shop/plugins/flexslider/jquery.flexslider-min.js')!!}"></script>
<script src="{!! asset('shop/js/product.js')!!}"></script>

<script>
	$("#add-Cart").click(function(){
		let id=document.querySelector('#detail-product-id').value;
		console.log(id);
		$.ajax({
            url: '../AddCart/'+id,
            type: 'GET',
        }).done(function(respone){
            console.log(respone);
            $("#total-cart-quantity").empty();
            $("#total-cart-quantity").html(respone);
            alertify.success('Add product to Cart sucess');
        });
	});
</script>
@endsection