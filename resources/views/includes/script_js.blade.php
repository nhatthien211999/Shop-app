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
    // $(document).ready(function(){
        console.log('aaaaaaaaaa')


        $('.add-to-cart').click(function(){

            var id = $(this).data('id');
            var card_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_quantity = $('.cart_product_quantity_' + id).val();

            if(!cart_product_quantity){
                cart_product_quantity = 1
            }

            var _token = $('input[name="_token"]').val();
            var data = {'card_product_id': card_product_id,
                        'cart_product_name': cart_product_name,
                        'cart_product_image': cart_product_image,
                        'cart_product_price': cart_product_price,
                        'cart_product_quantity': cart_product_quantity,
                        '_token': _token};
            $.ajax({
                url: "{{ url('/add-to-cart') }}",async: false,
                method: 'POST',
                data: data,
                success: function(data){
                    $("#total").html(data['total']);
                    $("#total_price").html(data['total_price']);
                    swal({
                        title: "Thêm vào giỏ hàng thành công",
                        text: "Bạn có thể tiếp tục mua sắm hoặc đến giỏ hàng",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false,
                    },
                    function(){
                        window.location.href = "{{ url('/cart')}} "
                    });
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                }

            })
        });

    // });

    function addCart(id){
        // var id = $(this).data('id');
        // var id=
        var card_product_id = $('.cart_product_id_' + id).val();
        var cart_product_name = $('.cart_product_name_' + id).val();
        var cart_product_image = $('.cart_product_image_' + id).val();
        var cart_product_price = $('.cart_product_price_' + id).val();
        var cart_product_quantity = $('.cart_product_quantity_' + id).val();

        if(!cart_product_quantity){
            cart_product_quantity = 1
        }

        var _token = $('input[name="_token"]').val();
        var data = {'card_product_id': card_product_id,
                    'cart_product_name': cart_product_name,
                    'cart_product_image': cart_product_image,
                    'cart_product_price': cart_product_price,
                    'cart_product_quantity': cart_product_quantity,
                    '_token': _token};
        $.ajax({
            url: "{{ url('/add-to-cart') }}",
            method: 'POST',
            data: data,
            success: function(data){
                $("#total").html(data['total']);
                $("#total_price").html(data['total_price']);
                swal({
                    title: "Thêm vào giỏ hàng thành công",
                    text: "Bạn có thể tiếp tục mua sắm hoặc đến giỏ hàng",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Đi đến giỏ hàng",
                    closeOnConfirm: false,
                },
                function(){
                    window.location.href = "{{ url('/cart')}} "
                });
            },
            error: function (request, status, error) {
                console.log(request.responseText);
            }

        })

    }
</script>
