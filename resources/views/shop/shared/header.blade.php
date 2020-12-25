<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href="{{route('index-shop')}}">
					<div class="d-flex flex-row align-items-center justify-content-start">
							<div><img src="{{asset('shop/images/logo_1.png')}}" alt=""></div>
							<div>Little Closet</div>
					</div>
				</a>	
			</div>
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					@foreach($categories as $item)
					<li><a href="{{route('category',$item->id)}}">{{$item->name}}</a></li>
					@endforeach
				</ul>
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				<div class="header_search">
					<form action="#" id="header_search_form">
						<input type="text" class="search_input" placeholder="Search Item" required="required">
						<button class="header_search_button"><img src="{{asset('shop/images/search.png')}}" alt=""></button>
					</form>
				</div>
				<!-- User -->
				<div class="user">
					<a href="{{route('listCart')}}">
						<div>
							<img src="{{asset('shop/images/cart.svg')}}" alt="https://www.flaticon.com/authors/freepik">
							@if(Session::has("cart")!=null)
							<div id="total-cart-quantity">
								{{Session::get('cart')->totalQuantity}}
							</div>
							@else
							<div id="total-cart-quantity">
								0
							</div>
							@endif
						</div>
					</a>
				</div>
				<!-- Cart -->
				<div class="cart" id="chang-item-card"><a href="#"><div><img class="svg" src="{{asset('shop/images/user.svg')}}" alt="https://www.flaticon.com/authors/freepik"></div></a></div>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><img src="{{asset('shop/images/phone.svg')}}" alt="https://www.flaticon.com/authors/freepik"></div></div>
					<div>+1 912-252-7350</div>
				</div>
			</div>
		</div>
	</header>