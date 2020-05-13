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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newFoodModal">Add Menu</a>
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
                    <?php foreach ($drink as $d) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $d['name']; ?></td>
                            <td><?= $d['category']; ?></td>
                            <td>Rp. <?= $d['price']; ?></td>
                            <td><?= $d['stock']; ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#editSubMenuModal<?= $d['id'] ?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
                                <a href="<?= base_url('admin/deleteDrink/' . $d['id']) ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete <?= $d['name']; ?> ?')"><i class="far fa-fw fa-trash-alt"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="newFoodModal" tabindex="-1" role="dialog" aria-labelledby="newFoodModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newFoodModalLabel">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/drink'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Drink Menu">
                    </div>
                    <div class="form-group">
                        <select name="category" id="category" class="form-control">
                            <option value="">Select Category</option>
                            <?php foreach ($cat as $ct) : ?>
                                <option value="<?= $ct['id']; ?>"><?= $ct['category']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach ($drink as $dr) : ?>
    <div class="modal fade" id="editSubMenuModal<?= $dr['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editSubMenuModal<?= $dr['id'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubMenuModal<?= $dr['id'] ?>Label">Edit Menu</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('admin/editDrink/' . $dr['id']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $dr['name'] ?>" id="name" name="name" placeholder="Submenu title">
                        </div>
                        <div class="form-group">
                            <select name="category" id="category" class="form-control">
                                <option>Select Category</option>
                                <?php foreach ($cat as $c) : ?>
                                    <?php if ($dr['category'] == $c['category']) : ?>
                                        <option value="<?= $c['id']; ?>" selected> <?= $c['category']; ?> </option>
                                    <?php else : ?>
                                        <option value="<?= $c['id']; ?>"> <?= $c['category']; ?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $dr['price'] ?>" id="price" name="price" placeholder="Submenu url">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $dr['stock'] ?>" id="stock" name="stock" placeholder="Submenu icon">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>