<script type="text/javascript">
    <?php
      if(isset($_SESSION['rate_order'])){
    ?>
     $(document).ready(function(){
        $("#ratingModal").modal('show');
    });
    <?php
      }
    ?>
</script>

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
              <th>No</th>
              <th>Tanggal Order</th>
              <th>Total</th>
              <th>Rating</th>
              <th>Detail</th>
              </tr>
            </thead>
            <tbody>
            <?php if($order==''){ ?>
              <td class="price" colspan='4'>Order History is empty...</td>
            <?php }else
            { ?>
            <?php 
            $i = 1;
            foreach ($order as $o) : ?>
                <tr>
                    <td class="price"><?= $i ?></td>
                    <td class="price"><?= $o['tanggal_order'] ?></td>
                    <td class="price"><?= $o['price'] ?></td>
                    <td>
                    <div style="display:flex; justify-content:space-around">
                    <?php for($j = 0; $j < $o['rating']; $j++){
                    ?>
                      <p style="font-size:3em;">✰<p>
                    <?php
                    }
                    ?>
                    </div>
                    </td>
                    <td>
                    <form action="HistoryDetail" method="GET">
                      <button type="submit" name="id" value="<?= $o['id_order'] ?>" class="btn btn-primary btn-outline-primary">View Detail</button>
                    </form>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="modal-title" id="myModalLabel" style="color: black;">
                    Enjoy Your Meal
                </h2>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
            <h5 style="color:black;">Tell us how would you rate your experience with us</h2>
                <form class="user" method="post" action="<?= base_url('Food/rate'); ?>" role="form">
                    <div style="display=flex; justify-content: space-between;" class="center">
                      <button type="submit" value="1" name="rating" style="background-color: Transparent; border:none; font-size:3em;">✰</button>
                      <button type="submit" value="2" name="rating" style="background-color: Transparent; border:none; font-size:3em;">✰</button>
                      <button type="submit" value="3" name="rating" style="background-color: Transparent; border:none; font-size:3em;">✰</button>
                      <button type="submit" value="4" name="rating" style="background-color: Transparent; border:none; font-size:3em;">✰</button>
                      <button type="submit" value="5" name="rating" style="background-color: Transparent; border:none; font-size:3em;">✰</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

