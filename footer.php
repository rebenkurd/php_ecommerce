<script src="./assets/js/jquery.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(e){
    $('.addtocart').click(function(){
        var id = $(this).data('id');
        $.ajax({
            url: './addtocart.php',
            type: 'get',
            data: {id:id},
            success: function(response){
                $('#cart_count').html(response);
            }
        });
    });
});

    $(document).ready(function(){
        $('.remove-item').click(function(){
            var id = $(this).data('id');
            $.ajax({
                url: './remove_item.php',
                type: 'GET',
                data: {id: id},
                success: function(response){
                    $('#cart_count').html(response);
                }
            });
        });

    });
    $(document).ready(function() {
    updateTotalPrice(); 

    $(document).on('input', 'input[name="product_qty"]', function() {
        updateTotalPrice();
    });

    $(document).on('click', '.remove-item', function() {
        $(this).closest('.card').remove();
        updateTotalPrice();
    });

    function updateTotalPrice() {
        var totalPrice = 0;

        $('.shopping_cart').each(function() {
            var price = parseFloat( $(this).find('.product_price').text()); 
            var quantity = parseInt($(this).find('input[name="product_qty"]').val());
            totalPrice += price * quantity;            
        });

        $('.total_price').text(totalPrice.toFixed(2));
    }

});

$(document).ready(function(){
    $('#checkout').click(function(){
        var total_price = $('.total_price').text();
        var qty = [];
        var product_id = [];
        $('.shopping_cart').each(function(){
            var quantity = $(this).find('input[name="product_qty"]').val();
            var p_id = $(this).find('.remove-item').data('id');
            product_id.push(p_id);
            qty.push(quantity);
        });

        if(product_id.length != 0){
        $.ajax({
            url: './checkout.php',
            type: 'POST',
            data: {
                total_price: total_price,
                qty:qty,
                p_id: product_id,
                status: true
            },
            success: function(response){
                console.log(response);
            }
        });
    }else{
        toastr.error('Your cart is empty.');
    }
    });
});

</script>