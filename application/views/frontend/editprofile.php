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
                                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" style="border-radius: 5%;  padding-top: 80px" width="300px" height="380px">
                                            </div>        
                                        </div>
                                    </div>
                                    <div class="col-md-6-2">
                                        <div class="menu-wrap">
                                            <div class="row justify-content-center mb-5">
                                                <div class="col-md-12 heading-section ftco-animate">
                                                        <ul class="list basic_info">
                                                        <?= form_open_multipart('user/edit'); ?>
                                                            <div class="form-group row">
                                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                                            </div>
                                                            <div class="form-group form-input">
                                                                <input type="text" name="fname" id="fname" value="<?= $user['first_name']; ?>" required/>
                                                                <label for="fname" class="form-label">First Name</label>
                                                            </div>
                                                            <div class="form-group form-input">
                                                                <input type="text" name="lname" id="lname" value="<?= $user['last_name']; ?>" required/>
                                                                <label for="lname" class="form-label">Last Name</label>
                                                            </div>
                                                            <div class="form-group form-input">
                                                                <input class="selectedit" type="date" id="tgllahir" name="tgllahir" value="<?= $user['tgl_lahir']; ?>" readonly>
                                                                <label for="alamat" class="form-label">Birth Date</label>
                                                            </div>
                                                            <div class="form-group form-input">
                                                                <input type="text" name="address" class="lnr lnr-home" id="address" value="<?= $user['alamat']; ?>" />
                                                                <?= form_error('address', '<small class="text-danger pl-3 ">', '</small>'); ?>
                                                                <label for="alamat" class="form-label">Address</label>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-2">Picture</div>
                                                                <div class="col-sm-10">
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                                                        </div>
                                                                        <div class="col-sm-9">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                                                <label class="custom-file-label" for="image">Choose file</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group form-input">
                                                            <button type="submit" class="submit btn btn-primary btn-outline-primary px-4 py-3 " id="submit" name="submit">Edit Profile</button>
                                                        </div>
                                                            <p><a href="<?= base_url('home/changepassword') ?>" class="margintop">Change Password ?</a></p>
                                                            <?= form_close() ?>
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