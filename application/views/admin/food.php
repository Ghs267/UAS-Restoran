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

            <a href="" class="btn btn-primary mb-3 " data-toggle="modal" data-target="#newFoodModal">Add Menu</a>

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
                            <td><?= $f['stock']; ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#editSubMenuModal<?= $f['id'] ?>" class="badge badge-success"><i class="far fa-fw fa-edit"></i></a>
                                <a href="<?= base_url('admin/deleteFood/' . $f['id']) ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete <?= $f['name']; ?> ?')"><i class="far fa-fw fa-trash-alt"></i></a>
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
            <form action="<?= base_url('admin/food'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Food Menu">
                    </div>
                    <div class="form-group">
                        <select name="category" id="category" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($cat as $c) : ?>
                                <option value="<?= $c['id']; ?>"><?= $c['category']; ?></option>
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
<?php foreach ($food as $fd) : ?>
    <div class="modal fade" id="editSubMenuModal<?= $fd['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editSubMenuModal<?= $fd['id'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubMenuModal<?= $fd['id'] ?>Label">Edit Menu</h5>
                    <buttond type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </buttond>
                </div>
                <form action="<?= base_url('admin/editFood/' . $fd['id']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $fd['name'] ?>" id="name" name="name" placeholder="Submenu Menu">
                        </div>
                        <div class="form-group">
                            <select name="category" id="category" class="form-control">
                                <option>Select Category</option>
                                <?php foreach ($cat as $ct) : ?>
                                    <?php if ($fd['category'] == $ct['category']) : ?>
                                        <option value="<?= $ct['id']; ?>" selected> <?= $ct['category']; ?> </option>
                                    <?php else : ?>
                                        <option value="<?= $ct['id']; ?>"> <?= $ct['category']; ?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $fd['price'] ?>" id="price" name="price" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?= $fd['stock'] ?>" id="stock" name="stock" placeholder="Stock">
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