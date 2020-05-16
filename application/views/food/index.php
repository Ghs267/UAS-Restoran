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

            <table class="table table-hover">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
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
                            <button style="display:block;" id="shop_cart_btn<?= $f['id'] ?>" class="add_cart btn btn-success btn-block" data-productid="<?php echo $f['id'];?>" data-productname="<?php echo $f['name'];?>" data-productprice="<?php echo $f['price'];?>" onClick="shopping_<?= $f['id'] ?>();"><i class="fas fa-fw fa-shopping-cart"></i></button>
                            <div id="qty_div<?= $f['id'] ?>" style="display:none;"><button onClick="minus_item_<?= $f['id'] ?>();" class="btn btn-success" id="minus<?= $f['id'] ?>">-</button><input type="text" value="0" id="qty<?= $f['id'] ?>" name="qty" readonly style="width:3em;"><button onClick="plus_item_<?= $f['id'] ?>();" class="btn btn-success" id="plus<?= $f['id'] ?>">+</button></div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script type="text/javascript">
    <?php foreach ($food as $fo): ?>
        function shopping_<?= $fo['id'] ?>(){
            // var product_id    = $(this).data("productid");
            // var product_name  = $(this).data("productname");
            // var product_price = $(this).data("productprice");
            // var quantity      = 1;
            document.getElementById('shop_cart_btn<?= $fo['id'] ?>').style.display = "none";
            document.getElementById('qty_div<?= $fo['id'] ?>').style.display = "flex";
            var qty = parseInt(document.getElementById('qty<?= $fo['id'] ?>').value);
            qty++;
            document.getElementById('qty<?= $fo['id'] ?>').value = qty;
        }
        function minus_item_<?= $fo['id'] ?>(){
            var qty = parseInt(document.getElementById('qty<?= $fo['id'] ?>').value);
            if(qty == 1){
                confirm("Doing this will remove the item from shopping cart. Continue?");
            }
            qty--;
            document.getElementById('qty<?= $fo['id'] ?>').value = qty;

            if(qty<=0){
                document.getElementById('shop_cart_btn<?= $fo['id'] ?>').style.display = "block";
                document.getElementById('qty_div<?= $fo['id'] ?>').style.display = "none";
            }
        }

        function plus_item_<?= $fo['id'] ?>(){
            var qty = parseInt(document.getElementById('qty<?= $fo['id'] ?>').value);
            qty++;
            document.getElementById('qty<?= $fo['id'] ?>').value = qty;
        }
<?php endforeach; ?>
</script>