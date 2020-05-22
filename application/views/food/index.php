<?php //unset($_COOKIE['shopping_cart']); 
    //echo $_COOKIE['shopping_cart'];
?>
<body onload="load_avalaible_cart();">   
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('messages'); ?>
            <input type="hidden" id="hdnSession" data-value="<?= $_SESSION['email'] ?>">
            <table class="table table-hover">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th style="width:8em;">Action</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($food as $f) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $f['name']; ?></td>
                            <td><div><img src="<?= $f['gambar']; ?>" style="width:5em;height:5em;"></div></td>
                            <td>Rp. <?= $f['price']; ?></td>
                            <?php if ($f['stock'] >= 10) : ?>
                                <td>Tersedia</td>
                            <?php elseif ($f['stock'] >= 5) : ?>
                                <td>Terbatas</td>
                            <?php elseif ($f['stock'] <= 4) : ?>
                                <td>Hampir habis</td>
                            <?php endif; ?>
                            <td>
                            
                            <?php
                            
                            if(isset($_COOKIE['shopping_cart'])){
                                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                $cart_data = json_decode($cookie_data, true);
                                $flag = false;

                                foreach($cart_data as $keys => $values){
                                    if($f['id'] == $values['product_id']){
                                    ?>
                                    <button style="display:none; width:7em;" id="shop_cart_btn<?= $f['id'] ?>" class="add_cart btn btn-success btn-block" data-productid="<?= $f['id'] ?>" data-productname="<?= $f['name'] ?>" data-productprice="<?= $f['price'] ?>" data-productpic="<?= $f['gambar'] ?>" onClick="shopping_<?= $f['id'] ?>();">
                                        <i class="fas fa-fw fa-shopping-cart"></i>
                                    </button>
                                    <div id="qty_div<?= $f['id'] ?>" style="display:flex; width:7em;">
                                        <button onClick="change_qty_<?= $f['id'] ?>(-1);" class="btn btn-success" id="minus<?= $f['id'] ?>">-</button>
                                        <input type="text" value="<?= $values['product_qty'] ?>" id="qty<?= $f['id'] ?>" name="qty" readonly style="width:3em;">
                                        <button onClick="change_qty_<?= $f['id'] ?>(1);" class="btn btn-success" id="plus<?= $f['id'] ?>">+</button>
                                    </div>
                                    <?php
                                        $flag = true;
                                        break;
                                    }
                                }

                                if(!$flag){
                            ?>
                                <button style="display:block; width:7em;" id="shop_cart_btn<?= $f['id'] ?>" class="add_cart btn btn-success btn-block" data-productid="<?= $f['id'] ?>" data-productname="<?= $f['name'] ?>" data-productprice="<?= $f['price'] ?>" data-productpic="<?= $f['gambar'] ?>" onClick="shopping_<?= $f['id'] ?>();">
                                    <i class="fas fa-fw fa-shopping-cart"></i>
                                </button>
                                <div id="qty_div<?= $f['id'] ?>" style="display:none; width:7em;">
                                    <button onClick="change_qty_<?= $f['id'] ?>(-1);" class="btn btn-success" id="minus<?= $f['id'] ?>">-</button>
                                    <input type="text" value="0" id="qty<?= $f['id'] ?>" name="qty" readonly style="width:3em;">
                                    <button onClick="change_qty_<?= $f['id'] ?>(1);" class="btn btn-success" id="plus<?= $f['id'] ?>">+</button>
                                </div>
                            <?php
                                }
                            }else{
                                ?>

                                <button style="display:block; width:7em;" id="shop_cart_btn<?= $f['id'] ?>" class="add_cart btn btn-success btn-block" data-productid="<?= $f['id'] ?>" data-productname="<?= $f['name'] ?>" data-productprice="<?= $f['price'] ?>" data-productpic="<?= $f['gambar'] ?>" onClick="shopping_<?= $f['id'] ?>();">
                                    <i class="fas fa-fw fa-shopping-cart"></i>
                                </button>
                                <div id="qty_div<?= $f['id'] ?>" style="display:none; width:7em;">
                                    <button onClick="change_qty_<?= $f['id'] ?>(-1);" class="btn btn-success" id="minus<?= $f['id'] ?>">-</button>
                                    <input type="text" value="0" id="qty<?= $f['id'] ?>" name="qty" readonly style="width:3em;">
                                    <button onClick="change_qty_<?= $f['id'] ?>(1);" class="btn btn-success" id="plus<?= $f['id'] ?>">+</button>
                                </div>

                                <?php
                            }

                            ?>
                            
                            <!-- make a loop to check each cookie element, break if found??? maybe I haven't figured that out halp TwT -->

                            <!-- Below should become else statement from the PHP isset cookie -->
                            
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>

            </table>
            <button onClick="getCart();">Check shopping cart array</button>
            <button onClick="delete_cookie('shopping_cart');">Delete i guess</button>
        </div>
    </div>
</div>
</body>
<!-- /.container-fluid -->

<!-- End of Main Content -->

<!-- Shopping Cart Button below -->
<script type="text/javascript">
    var cart = [];
    <?php foreach($food as $f): ?>
        var item_<?= $f['id'] ?> = "";
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
                    var qty = parseInt(document.getElementById('qty<?= $fd['id'] ?>').value);
                    var email = $("#hdnSession").data('value');
                    var product_id    = $('#shop_cart_btn<?= $fd['id'] ?>').data("productid");
                    var product_name  = $('#shop_cart_btn<?= $fd['id'] ?>').data("productname");
                    var product_price = $('#shop_cart_btn<?= $fd['id'] ?>').data("productprice");
                    var product_pic = $('#shop_cart_btn<?= $fd['id'] ?>').data("productpic");
                    
                    item_<?= $fd['id'] ?> = {'email':email, 
                                    'product_id':product_id, 
                                    'product_name':product_name,
                                    'product_price':product_price,
                                    'product_qty':qty,
                                    'product_pic':product_pic
                    };

                    cart.push(item_<?= $fd['id'] ?>);
                    setCookie(cart, 1);

        <?php
                    }
                }
            }
        }
            ?>
             
            
    }
    <?php foreach ($food as $fo): ?>
        
        function shopping_<?= $fo['id'] ?>(){
            document.getElementById('shop_cart_btn<?= $fo['id'] ?>').style.display = "none";
            document.getElementById('qty_div<?= $fo['id'] ?>').style.display = "flex";
            var qty = parseInt(document.getElementById('qty<?= $fo['id'] ?>').value);
            qty++;
            document.getElementById('qty<?= $fo['id'] ?>').value = qty;

            var email = $("#hdnSession").data('value');
            var product_id    = $('#shop_cart_btn<?= $fo['id'] ?>').data("productid");
            var product_name  = $('#shop_cart_btn<?= $fo['id'] ?>').data("productname");
            var product_price = $('#shop_cart_btn<?= $fo['id'] ?>').data("productprice");
            var product_pic = $('#shop_cart_btn<?= $fo['id'] ?>').data("productpic");

            item_<?= $fo['id'] ?> = {'email':email, 
                                    'product_id':product_id, 
                                    'product_name':product_name,
                                    'product_price':product_price,
                                    'product_qty':qty,
                                    'product_pic':product_pic
            };

            cart.push(item_<?= $fo['id'] ?>);
            setCookie(cart, 1);

        }
        function change_qty_<?= $fo['id'] ?>(count){
            var qty = parseInt(document.getElementById('qty<?= $fo['id'] ?>').value);
            qty += count;
            document.getElementById('qty<?= $fo['id'] ?>').value = qty;
            //console.log(qty);
            if(qty<=0){
                document.getElementById('shop_cart_btn<?= $fo['id'] ?>').style.display = "block";
                document.getElementById('qty_div<?= $fo['id'] ?>').style.display = "none";
                //remove from cart
                remove_item(item_<?= $fo['id'] ?>['product_id']);
                //kalo cart kosong, cookie dihapus
                if(!cart.length){
                    delete_cookie('shopping_cart');
                }
            }
            update_qty(item_<?= $fo['id'] ?>['product_id'], qty);
            console.log(item_<?= $fo['id']?>);
            setCookie(cart, 1);
        }

        
    <?php endforeach; ?>

    function remove_item(product_id){
        for (var i =0; i < cart.length; i++){
            if (cart[i].product_id === product_id) {
                cart.splice(i,1);
                break;
            }
        }
    }

    function update_qty(product_id, qty){
            for (var i in cart){
                if (cart[i].product_id == product_id) {
                    cart[i].product_qty = qty;
                    break;
                 }
            }
        }

    function setCookie(cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = 'shopping_cart' + "=" + JSON.stringify(cvalue) + ";" + expires + ";path=/";
    }

    function delete_cookie( name ) {
        document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        //console.log(ca);
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                console.log(c.substring(name.length, c.length));
                //return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function getCart(){
        console.log(cart);
    }

    function clear_cart(){
        cart = "";
    }

</script>