@if(Session::has("cart") !=null)
<div>{{Session::get('cart')->totalQuantity}}</div>
@endif