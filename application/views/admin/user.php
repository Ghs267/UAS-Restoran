<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg">


            <table class="table table-hover">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Birth Date</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($user_m as $f) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $f['first_name'] . ' ' . $f['last_name']; ?></td>
                            <td><?= $f['tgl_lahir']; ?></td>
                            <td><?= $f['alamat']; ?></td>
                            <td><?= $f['email']; ?></td>
                            <td><?= $f['role']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/deleteUser/' . $f['id']) ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete <?= $f['first_name']; ?> ?')"><i class="far fa-fw fa-trash-alt"></i></a>
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