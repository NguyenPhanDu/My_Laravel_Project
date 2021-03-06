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
				<!-- Cart -->
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
				<!-- User -->
				<div class="cart header__user--auth" id="chang-item-card" >
					<a href="#">
						<div>
							<img class="svg" src="{{asset('shop/images/user.svg')}}" alt="https://www.flaticon.com/authors/freepik">
						</div>
					</a>
					<div class="header__user">
						@if(Session::has('userLogin'))
						<header class="header__user-header">
							<p>User</p>
						</header>
						<div class="header__user-username">
							<a href="#">{{Session::get('userLogin')->username}}</a>
						</div>
						
						<div class="header__user-btn-logout">
							<a href="{{route('userLogout')}}">Log out</a>
						</div>
						@else
						<div class="header__user-btn-signin">
							<a href="{{route('userGetLogin')}}" >Sign In</a>
						</div>
						@endif
					</div>
				</div>
				@if(Session::has('userLogin'))
				<div class="user">
					<a href="{{route('showBill',Session::get('userLogin')->id)}}">
						<div>
							<img src="{{asset('shop/images/bill.png')}}" alt="https://www.flaticon.com/authors/freepik">
						</div>
					</a>
				</div>
				@endif
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><img  src="{{asset('shop/images/phone.svg')}}" alt="https://www.flaticon.com/authors/freepik"></div></div>
					<div>0336685195</div>
				</div>
			</div>
		</div>
	</header>