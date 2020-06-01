<section class="ftco-menu mb-5 pb-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            </div>
                <div class="row d-md-flex">
                    <div class="col-lg-12 ftco-animate p-md-5-2">
                      <div class="col-md-12 d-flex align-items-center">
                        
                        <div class="tab-content ftco-animate" id="">
                          <div class="tab-pane fade show active" id="">
                              <div class="row">
                                  <div class="col-md-4 text-center">
                                      <div class="menu-wrap">
                                            <div class="d-flex personal_text">
                                                <p><a href="<?= base_url('home/profile') ?>" class="btn btn-primary btn-outline-primary px-3 py-2">Back</a></p>
                                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" style="border-radius: 5%;  padding-top: 80px;" width="300px" height="380px">
                                            </div>        
                                        </div>
                                    </div>
                                    <div class="col-md-6-2">
                                        <div class="menu-wrap">
                                            <div class="row justify-content-center mb-5">
                                                <div class="col-md-12-2 heading-section ftco-animate">
                                                        <ul class="list basic_info">
                       
                                                        <?= $this->session->flashdata('message'); ?>
                                                            <form action="<?= base_url('user/changepassword'); ?>" method="post">
                                                                <div class="form-group">
                                                                    <label for="current_password">Current Password</label>
                                                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                                                    <?= form_error('current_password', '<small style="color:red">', '</small>'); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="new_password1">New Password</label>
                                                                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                                                                    <?= form_error('new_password1', '<small style="color:red">', '</small>'); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="new_password2">Repeat New Password</label>
                                                                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                                                                    <?= form_error('new_password2', '<small style="color:red">', '</small>'); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                                                </div>
                                                            </form>
                                                        </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>