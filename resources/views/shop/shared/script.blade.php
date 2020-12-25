<!-- <script src="js/jquery-3.2.1.min.js"></script> -->
<script src="{!! asset('shop/js/jquery-3.2.1.min.js') !!}"></script>

<!-- <script src="styles/bootstrap-4.1.2/popper.js"></script> -->
<script src="{!! asset('shop/styles/bootstrap-4.1.2/popper.js') !!}"></script>

<!-- <script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script> -->
<script src="{!! asset('shop/styles/bootstrap-4.1.2/bootstrap.min.js') !!}"></script>

<!-- <script src="plugins/greensock/TweenMax.min.js"></script> -->
<script src="{!! asset('shop/plugins/greensock/TweenMax.min.js') !!}"></script>

<!-- <script src="plugins/greensock/TimelineMax.min.js"></script> -->
<script src="{!! asset('shop/plugins/greensock/TimelineMax.min.js') !!}"></script>

<!-- <script src="plugins/scrollmagic/ScrollMagic.min.js"></script> -->
<script src="{!! asset('shop/plugins/scrollmagic/ScrollMagic.min.js') !!}"></script>

<!-- <script src="plugins/greensock/animation.gsap.min.js"></script> -->
<script src="{!! asset('shop/plugins/greensock/animation.gsap.min.js') !!}"></script>

<!-- <script src="plugins/greensock/ScrollToPlugin.min.js"></script> -->
<script src="{!! asset('shop/plugins/greensock/ScrollToPlugin.min.js') !!}"></script>

<!-- <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script> -->
<script src="{!! asset('shop/plugins/OwlCarousel2-2.2.1/owl.carousel.js') !!}"></script>

<!-- <script src="plugins/easing/easing.js"></script> -->
<script src="{!! asset('shop/plugins/easing/easing.js') !!}"></script>

<!-- <script src="plugins/progressbar/progressbar.min.js"></script> -->
<script src="{!! asset('shop/plugins/progressbar/progressbar.min.js') !!}"></script>

<!-- <script src="plugins/parallax-js-master/parallax.min.js"></script> -->
<script src="{!! asset('shop/plugins/parallax-js-master/parallax.min.js') !!}"></script>


<!-- <script src="js/custom.js"></script> -->
<script src="{!! asset('shop/js/custom.js') !!}"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
    function addCart(id){
        console.log(id);
        $.ajax({
            url: '../fashionshop/AddCart/'+id,
            type: 'GET',
        }).done(function(respone){
            console.log(respone);
            $("#total-cart-quantity").empty();
            $("#total-cart-quantity").html(respone);
            alertify.success('Add product to Cart sucess');
        });
    }
</script>