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
                            <input type="number" value="1" style="display:none;" id="qty<?= $f['id'] ?>" name="qty">
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
        document.getElementById('qty<?= $fo['id'] ?>').style.display = "block";
    }
<?php endforeach; ?>
</script>