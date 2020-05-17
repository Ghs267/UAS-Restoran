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
                            <button style="display:block; width:7em;" id="shop_cart_btn<?= $f['id'] ?>" class="add_cart btn btn-success btn-block" data-productid="<?= $f['id'] ?>" data-productname="<?= $f['name'] ?>" data-productprice="<?= $f['price'] ?>" onClick="shopping_<?= $f['id'] ?>();">
                                <i class="fas fa-fw fa-shopping-cart"></i>
                            </button>
                            <!-- insert PHP IF for isset cookie here -->
                            
                            <!-- make a loop to check each cookie element, break if found??? maybe I haven't figured that out halp TwT -->

                            <!-- Below should become else statement from the PHP isset cookie -->
                            <div id="qty_div<?= $f['id'] ?>" style="display:none; width:7em;">
                                <button onClick="change_qty_<?= $f['id'] ?>(-1);" class="btn btn-success" id="minus<?= $f['id'] ?>">-</button>
                                <input type="text" value="0" id="qty<?= $f['id'] ?>" name="qty" readonly style="width:3em;">
                                <button onClick="change_qty_<?= $f['id'] ?>(1);" class="btn btn-success" id="plus<?= $f['id'] ?>">+</button></div>
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

<!-- End of Main Content -->

<!-- Shopping Cart Button below -->
<?php foreach ($food as $fo): ?>
    <script type="text/javascript">
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

        function change_qty_<?= $fo['id'] ?>(count){
            var qty = parseInt(document.getElementById('qty<?= $fo['id'] ?>').value);
            qty += count;
            document.getElementById('qty<?= $fo['id'] ?>').value = qty;

            if(qty<=0){
                document.getElementById('shop_cart_btn<?= $fo['id'] ?>').style.display = "block";
                document.getElementById('qty_div<?= $fo['id'] ?>').style.display = "none";
            }
        }
    </script>
<?php endforeach; ?>
