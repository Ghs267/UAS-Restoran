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
                    <th scope="col">Menu</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total Price</th>

                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($history as $f) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $f['name_u'] ?></td>
                            <td><?= $f['name']; ?></td>
                            <td><?= $f['qty']; ?></td>
                            <td><?= $f['total']; ?></td>
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