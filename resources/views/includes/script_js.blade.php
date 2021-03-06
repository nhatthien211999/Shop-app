
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

{{-- GG Map  --}}
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdA7sj9iKytBL-jVsP4At0DJKBsbpamto&libraries=&v=weekly"
    async
></script>
    
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('assets/js/sweetalert.js') }}"></script>



<script>
    $(document).ready(function(){
    //Shop Cart
    $('body').on('click', '.add-to-cart', function() {
        var id = $(this).data('id');
        var card_product_id = $('.cart_product_id_' + id).val();
        var cart_product_name = $('.cart_product_name_' + id).val();
        var cart_product_image = $('.cart_product_image_' + id).val();
        var cart_product_price = $('.cart_product_price_' + id).val();
        var cart_product_quantity = $('.cart_product_quantity_' + id).val();
        console.log('a');
        if( !cart_product_quantity ){
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
            url: "{{ url('carts/add-to-cart') }}",
            method: 'POST',
            data: data,
            success: function(data){
                $("#total").html(data['total']);
                $("#total_price").html(data['total_price']);
                swal({
                    title: "Th??m v??o gi??? h??ng th??nh c??ng",
                    text: "B???n c?? th??? ti???p t???c mua s???m ho???c ?????n gi??? h??ng",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "??i ?????n gi??? h??ng",
                    closeOnConfirm: false,
                },
                function(){
                    window.location.href = "{{ url('carts/cart')}} "
                });
            },
            error: function (request, status, error) {
                console.log(request.responseText);
            }

        });  




    });

    $('body').on('click', '.add-to-favourite', function() {
        console.log('a1');
        var id = $(this).data('id');
        
        var favourite_product_id = $('.cart_product_id_' + id).val();
        var favourite_product_name = $('.cart_product_name_' + id).val();
        var favourite_product_image = $('.cart_product_image_' + id).val();
        var favourite_product_price = $('.cart_product_price_' + id).val();
        var favourite_product_quantity = $('.cart_product_quantity_' + id).val();
        


        if( !favourite_product_quantity ){
            favourite_product_quantity = 1
        }

        var _token = $('input[name="_token"]').val();
        var data = {'favourite_product_id': favourite_product_id,
                    'favourite_product_name': favourite_product_name,
                    'favourite_product_image': favourite_product_image,
                    'favourite_product_price': favourite_product_price,
                    'favourite_product_quantity': favourite_product_quantity,
                    '_token': _token};
        console.log(data);
        $.ajax({
            url: "{{ url('favourites/add-to-favourite') }}",
            method: 'POST',
            data: data,
            success: function(data){
                $("#total_favourite").html(data['total']);

                swal({
                    title: "Th??m v??o danh muc yeu thich th??nh c??ng",
                    text: "B???n c?? th??? ti???p t???c mua s???m ho???c ?????n danh muc",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Favourite",
                    closeOnConfirm: false,
                },
                function(){
                    window.location.href = "{{ url('favourites/favourite')}} "
                });
            },
            error: function (request, status, error) {
                console.log(request.responseText);
            }

        });  
    });

});
</script>
