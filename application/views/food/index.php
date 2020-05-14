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
                    <th scope="col">Category</th>
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
                            <td><?= $f['category']; ?></td>
                            <td>Rp. <?= $f['price']; ?></td>
                            <?php if ($f['stock'] >= 10) : ?>
                                <td>Tersedia</td>
                            <?php elseif ($f['stock'] >= 5) : ?>
                                <td>Terbatas</td>
                            <?php elseif ($f['stock'] <= 4) : ?>
                                <td>Hampir habis</td>
                            <?php endif; ?>
                            <td>
                                <a href="" class="badge badge-primary" data-toggle="modal" data-target="#addShop<?= $f['id'] ?>"><i class="fas fa-fw fa-shopping-cart"></i></a>
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
<?php foreach ($food as $fd) : ?>
    <div class="modal fade" id="addShop<?= $fd['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="addShop<?= $fd['id'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addShop<?= $fd['id'] ?>Label">Add Menu to Shopping Cart</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $fd['name'] ?>" id="name" name="name" placeholder=" Menu" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $fd['price'] ?>" id="price" name="price" placeholder="Price" readonly>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="Qty">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add to Chart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>