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
                        <span data-quantity="{{$item['productInfo']->id}}" id="quantity-item-{{$item['productInfo']->id}}" class="product_text product_num">{{$item['quantity']}}</span>
                        <div class="qty_sub qty_button trans_200 text-center"><span>-</span></div>
                        <div class="qty_add qty_button trans_200 text-center"><span>+</span></div>
                    </div>
                </div>
                <div class="product_total product_text"><span>Total: </span>{{number_format($item['price'])}}đ</div>
                <div><span onclick="saveListItemQuantity({{$item['productInfo']->id}})">Save</span></div>
                <!-- <div><a href="{{route('deleteListCartItem',$item['productInfo']->id)}}">delete</a></div> -->
                <div><button name="btn-delete" value="{{$item['productInfo']->id}}">Delete</button></div>
            </li>
        </ul>
    @endforeach
@endif