<body onload="load_avalaible_cart();">
<section class="ftco-section2">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Order</span>
        <h2 class="mb-4">Shopping Cart</h2>
      </div>
    </div>
  </div>
</section>

<!--SHOPPING CART table-->
<section class="ftco-section5 ftco-cart">
<input type="hidden" id="hdnSession" data-value="<?= $_SESSION['user_id'] ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="cart-list">
          <table class="table">
            <thead class="thead-primary">
              <th>&nbsp;</th>
              <th>Product</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total</th>
              <th>Remove</th>
            </thead>
            <tbody>

            <?php 
            if(isset($_COOKIE['shopping_cart']))
            {
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
                $total = 0;

                foreach($cart_data as $keys => $values)
                {
            ?>
                <tr class="text-center">
                    <input type="hidden" id="product_id_<?= $values['product_id'] ?>" data-value="<?= $values['product_id'] ?>">
                    <td class="image-prod" id="product_pic_<?= $values['product_id'] ?>" data-value="<?= $values['product_pic'] ?>"><img style="width:5em;height:5em;" src="<?= base_url().$values['product_pic'] ?>" alt="Food Picture"></td>
                    <td class="product-name" id="product_name_<?= $values['product_id'] ?>" data-value="<?= $values['product_name'] ?>"><?= $values['product_name'] ?></td>
                    <td class="quantity" id="product_qty_<?= $values['product_id'] ?>" data-value="<?= $values['product_qty'] ?>">x<?= $values['product_qty'] ?></td>
                    <td class="price" id="product_price_<?= $values['product_id'] ?>" data-value="<?= $values['product_price'] ?>"><?= $values['product_price'] ?></td>
                    <td class="price"><b><?php echo ($values['product_price'] * $values['product_qty']); ?></b></td>
                    <td class="product-remove">
                        <div>
                            <button class="btn btn-primary btn-outline-primary" name="delete" onClick="remove_item_<?= $values['product_id'] ?>();"><b>-</b></button>
                        </div>
                    </td>
                </tr>
                
            <?php
                $total = $total + ($values['product_price'] * $values['product_qty']);
                }

                if($total == 0){
                    echo '<tr><td colspan="6" class="price">Shopping cart is empty...</td></tr>';
                }else
                {
            ?>
                <tr>
                    <td colspan="5" align="right" class="total">Total</td>
                    <td align="right" class="price"><b><?= $total ?></b></td>
                </tr>
            <?php

                }
            }
            else{
                echo '<tr><td colspan="6">Shopping cart is empty...</td></tr>';
            }
            ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php if(isset($_COOKIE['shopping_cart']))
    {
    ?>
    <div class="row justify-content-end">
      <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
        <p class="text-center"><a class="btn btn-primary py-3 px-4" data-toggle="modal" data-target="#order">Order Now</a></p>
      </div>
    </div>
    <?php } ?>
  </div>
</section>


<button onClick="clear_cart();">Clear cart</button>

<!-- ORDER Modal -->
<div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title" id="myModalLabel" style="color: black;">
          Your Order
        </h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <p class="d-flex">
          <span>Subtotal</span>
          <span>&nbsp;<?= $total ?></span>
        </p>
        <p class="d-flex">
          <span>Delivery</span>
          <span>&nbsp; 9000</span>
        </p>
        <hr>
        <p class="d-flex total-price">
          <span>Total</span>
          <span>&nbsp;<?= ($total + 9000) ?></span>
        </p>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          Cancel
        </button>
        <?= form_open('Food/checkout'); ?>
        <?php foreach($cart_data as $keys => $values): ?>
            <input type="hidden" name="product_id[]" value="<?= $values['product_id'] ?>">
            <input type="hidden" name="product_qty[]" value="<?= $values['product_qty'] ?>">
        <?php endforeach; ?>
            <button type="submit" class="btn btn-primary">Confirm Order</button>
        <?= form_close() ?>
      </div>
    </div>
  </div>
</div>

</body>

<script type="text/javascript">
 var cart = [];
    <?php foreach($cart_data as $keys => $values): ?>
        var item_<?= $values['product_id'] ?> = "";
    <?php endforeach; ?>
    function load_avalaible_cart(){
        <?php
            if(isset($_COOKIE['shopping_cart'])){
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
                
            foreach($cart_data as $keys => $values){
                foreach($food as $fd){
                    if($values['product_id'] == $fd['id']){
        ?>
                    //console.log('hey');
                    var qty = $("#product_qty_<?= $values['product_id'] ?>").data('value');
                    var id = $("#hdnSession").data('value');
                    var product_id    = $("#product_id_<?= $values['product_id'] ?>").data('value');
                    var product_name  = $("#product_name_<?= $values['product_id'] ?>").data('value');
                    var product_price = $("#product_price_<?= $values['product_id'] ?>").data('value');
                    var product_pic = $("#product_pic_<?= $values['product_id'] ?>").data('value');
                    
                    item_<?= $values['product_id'] ?> = {
                                    'user_id':id, 
                                    'product_id':product_id, 
                                    'product_name':product_name,
                                    'product_price':product_price,
                                    'product_qty':qty,
                                    'product_pic':product_pic
                    };

                    cart.push(item_<?= $values['product_id'] ?>);
                    setCookie(cart, 1);

        <?php
                    }
                }
            }
        }
            ?>
            
    }
    
    <?php foreach($cart_data as $keys => $values): ?>
    
    function remove_item_<?= $values['product_id'] ?>(){
        var product_id = <?= $values['product_id'] ?>;
        for (var i =0; i < cart.length; i++){
            if (cart[i].product_id === product_id) {
                cart.splice(i,1);
                break;
            }
        }
        setCookie(cart, 1);
        location.reload();
        return false;
    }

    <?php endforeach; ?>

    function setCookie(cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = 'shopping_cart' + "=" + JSON.stringify(cvalue) + ";" + expires + ";path=/";
    }
    function clear_cart(){
        document.cookie = 'shopping_cart=; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';
        location.reload();
        return false;
    }

    function checkout(){
        $.ajax({
            url:"<?= base_url() ?>Food/checkout_AJAX",
            method:"POST",
            data: {
                cart_data: cart
            },
            success: function(){
                alert('success!');
                clear_cart();
                window.href('<?= base_url() ?>');
            }
        })
    }

</script>
