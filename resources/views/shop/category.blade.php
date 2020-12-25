@extends('shop.shared.layout')

@section('content')
	
	<!-- Products -->

	<div class="products">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="section_title text-center">{{$categoryName[0]->name}}</div>
					</div>
				</div>
				
				<div class="row products_row">
					@foreach($products as $item)
					<!-- Product -->
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="product_image"><img src="{{asset('images/'.$item->mainImage)}}" alt=""></div>
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a href="{{route('product',$item->id)}}">{{ $item->name }}</a></div>
											<div class="product_category">In <a href="category.html">Category</a></div>
										</div>
									</div>
									<div class="ml-auto text-right">
										<div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="product_price text-right">{{number_format($item->price)}}</div>
									</div>
								</div>
								<div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><img src="{{asset('shop/images/heart.svg')}}" class="svg" alt=""><div>+</div></div></div>
										</div>
										<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
											<div onclick="addCartCategory({{$item->id}})"><div><img src="{{asset('shop/images/cart.svg')}}" class="svg" alt=""><div>+</div></div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="row load_more_row">
					<div class="col">
						<div class="button load_more ml-auto mr-auto"><a href="#">load more</a></div>
					</div>
				</div>
			</div>
		</div>

@endsection
@section('script')

<script>
	function addCartCategory(id){
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
    }
</script>
@endsection