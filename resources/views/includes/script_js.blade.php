<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>sweetalert.js
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('assets/js/sweetalert.js') }}"></script>

<script>
    $(document).ready(function(){
        // console.log('aaaaaaaaaa')

        $('.add-to-cart').click(function(){
            var id = $(this).data('id');
            var card_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var _token = $('input[name="_token"]').val();
            var data = {'card_product_id': card_product_id,
                        'cart_product_name': cart_product_name,
                        'cart_product_image': cart_product_image,
                        'cart_product_price': cart_product_price,
                        '_token': _token};
            $.ajax({
                url: "{{ url('/add-to-cart') }}",
                method: 'POST',
                data: data,
                success: function(data){
                    alert("Thanh cong")
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                }

            })
        });

    });
</script>
