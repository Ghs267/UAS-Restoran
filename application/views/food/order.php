<body>
    <table>
        <thead>
            <th scope="col">Id Order</th>
            <th scope="col">Tanggal Order</th>
            <th scope="col">Total</th>
        </thead>
        <tbody>
            <?php foreach ($order as $o) : ?>
                <tr>
                    <td><?= $o['id_order'] ?></td>
                    <td><?= $o['tanggal_order'] ?></td>
                    <td><?= $o['price'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>