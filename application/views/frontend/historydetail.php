<section class="ftco-section2">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Order</span>
        <h2 class="mb-4">History</h2>
      </div>
    </div>
  </div>
</section>
<!--History table-->
<section class="ftco-section4 ftco-cart">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="cart-list">
          <table class="table">
            <thead class="thead-primary">
              <tr class="text-center">
              <th>&nbsp;</th>
              <th>Product</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($history as $h): ?>
                <tr class="text-center">
                    <td><img style="width:5em;height:5em;" src="<?= base_url().$h['gambar'] ?>" alt="Food Picture"></td>
                    <td><?= $h['name'] ?></td>
                    <td>x<?= $h['qty'] ?></td>
                    <td><?= $h['price'] ?></td>
                    <td><?= $h['total'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <a href='<?= base_url('home/history') ?>'><button class='btn btn-outline-primary btn-primary'>Back to History</button></a>
      </div>
    </div>
  </div>
</section>