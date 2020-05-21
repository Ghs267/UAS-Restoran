
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <table class="table table-hover">
        <!-- <thead>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">QTY</th>
            <th scope="col">Price</th>
            <th scope="col">Total Price</th>
        </thead> -->
        <tbody>
            <?php 
            if(isset($_COOKIE['shopping_cart']))
            {
                $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
                $total = 0;

                foreach($cart_data as $keys => $values)
                {
                    
                    $i = 1;
            ?>
                <tr>
                    <td><img style="width:3em;height:3em;" src="<?= base_url().$values['product_pic'] ?>" alt="Food Picture"></td>
                    <td><?= $values['product_name'] ?></td>
                    <td>x<?= $values['product_qty'] ?></td>
                    <td><?= $values['product_price'] ?></td>
                    <td><b><?php echo ($values['product_price'] * $values['product_qty']); ?></b></td>
                    
                </tr>
                
            <?php
                $total = $total + ($values['product_price'] * $values['product_qty']);
                }

                if($total == 0){
                    echo '<tr><td colspan="5">Shopping cart is empty...</td></tr>';
                }else
                {
            ?>
                <tr>
                    <td colspan="4" align="right">Total</td>
                    <td align="right"><b><?= $total ?></b></td>
                </tr>
            <?php

                }
            }
            ?>
                
        </tbody>

    </table>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->