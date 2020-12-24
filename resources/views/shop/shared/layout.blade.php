<!DOCTYPE html>
<html lang="en">
<head>
	@include('shop.shared.head')
	@yield('css')
</head>
<body>

<!-- Menu -->

@include('shop.shared.menu')

<div class="super_container">

	<!-- Header -->

	@include('shop.shared.header')

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		@yield('content')

		<!-- Footer -->

		@include('shop.shared.footer')
	</div>
		
</div>

@include('shop.shared.script')
@yield('script')
</body>
</html>