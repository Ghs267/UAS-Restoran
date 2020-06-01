<body>
            
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
                                            <div class="d-flex personal_text paddingtambahlagi">
                                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" style="border-radius: 5%" width="400px" height="400px">
                                            </div>        
                                        </div>
                                    </div>
                                    <div class="col-md-6-2">
                                        <div class="menu-wrap">
                                            <div class="row justify-content-center mb-5">
                                                <div class="col-md-12-2 heading-section ftco-animate">
                                                    <span class="subheading">Hello, I am</span>
                                                    <h2><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h2>
                                                    <h5 class="mb-4>">Customer</h5>
                                                    <h6><?= $user['email'] ?></h6>
                                                    <h6 class="mb-4"><?= $user['alamat'] ?></h6>
                                                    <p><a href="<?= base_url('home/editprofile') ?>" class="btn btn-primary btn-outline-primary px-3py-2">Edit Profile</a></p>
                                                    <p><a href="<?= base_url('home/changepassword') ?>" class="btn btn-primary btn-outline-primary px-3 py-2">Change Password</a></p>
                                                    <p><a href="<?= base_url('Auth/logout') ?>" class="btn btn-primary btn-outline-primary px-3 py-2">Logout</a></p>
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
  </body>