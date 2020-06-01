< onload="load_avalaible_cart();">

	<!--START header -->
	<section class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url(<?= base_url('assets/gambar/bg6.jpg') ?> );">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-md-8 col-sm-12 text-center ftco-animate">
						<span class="subheading">Welcome</span>
						<h1 class="mb-4">The Best Boba Experience</h1>
						<!-- <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p> -->
					</div>

				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image: url(<?= base_url('assets/gambar/bg2.jpg') ?>);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-md-8 col-sm-12 text-center ftco-animate">
						<span class="subheading">Welcome</span>
						<h1 class="mb-4">Amazing Taste </br> &amp; </br> Beautiful Place</h1>
						<!-- <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p> -->
					</div>

				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image: url(<?= base_url('assets/gambar/bg3.jpg') ?>);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-md-8 col-sm-12 text-center ftco-animate">
						<span class="subheading">Welcome</span>
						<h1 class="mb-4">Ready to Serve</h1>
						<!-- <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p> -->
					</div>

				</div>
			</div>
		</div>
	</section>

	<!-- DESC HEADER -->
	<section class="ftco-intro">
		<div class="container-wrap">
			<div class="wrap d-md-flex align-items-xl-end">
				<div class="info">
					<div class="row no-gutters">
						<div class="col-md-4 d-flex ftco-animate">
							<div class="icon"><span class="icon-phone"></span></div>
							<div class="text">
								<h3>+62 123 456 789</h3>
								<p>A small river named Duden flows by their place and supplies.</p>
							</div>
						</div>
						<div class="col-md-4 d-flex ftco-animate">
							<div class="icon"><span class="icon-my_location"></span></div>
							<div class="text">
								<h3>Kampus UMN</h3>
								<p>Jl. Scientia Boulevard, Gading, Kec. Serpong, Tangerang, Banten, Indonesia</p>
							</div>
						</div>
						<div class="col-md-4 d-flex ftco-animate">
							<div class="icon"><span class="icon-clock-o"></span></div>
							<div class="text">
								<h3>Open Monday-Saturday</h3>
								<p>8:00am - 9:00pm</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-menu mb-5 pb-5">
		<div class="container">
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Discover</span>
					<h2 class="mb-4">Our Products</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
				</div>
			</div>
			<div class="row d-md-flex">
				<div class="col-md-9 ftco-animate">
					<div class="sidebar-box">
						<form action="#" class="search-form">
							<div class="form-group">
								<div class="icon">
									<span class="icon-search"></span>
								</div>
								<input type="text" class="form-control" placeholder="Search...">
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row d-md-flex">
				<div class="col-lg-12 ftco-animate p-md-5">
					<div class="row">
						<div class="col-md-12 nav-link-wrap mb-5">
							<div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							</div>
						</div>
						<div class="col-md-12 d-flex align-items-center">
							<div class="tab-content ftco-animate" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
									<div class="row">

										<!--per satu menu-->
										<?php foreach ($food as $f) : ?>
											<div class="col-md-4 text-center">
												<div class="menu-wrap" style="align-items: center; justify-content: center;">
													<a href="#" class="menu-img img mb-4" style="background-image: url(<?= base_url() . $f['gambar'] ?>);"></a>
													<div class="text">
														<h3><a href="#"><?= $f['name'] ?></a></h3>
														<p class="price"><span><?= $f['price'] ?></span></p>
														<?php
														if (isset($_COOKIE['shopping_cart'])) {
															$cookie_data = stripslashes($_COOKIE['shopping_cart']);
															$cart_data = json_decode($cookie_data, true);
															$flag = false;

															foreach ($cart_data as $keys => $values) {
																if ($f['id'] == $values['product_id']) {
														?>
																	<button style="display:none; width:7em;" id="shop_cart_btn<?= $f['id'] ?>" class="add_cart btn btn-primary btn-outline-primary2 btnaddtocart paddingtambahan" data-productid="<?= $f['id'] ?>" data-productname="<?= $f['name'] ?>" data-productprice="<?= $f['price'] ?>" data-productpic="<?= $f['gambar'] ?>" onClick="shopping_<?= $f['id'] ?>();">
																		Add to Cart
																	</button>
																	<div id="qty_div<?= $f['id'] ?>" style="display:flex; width:7em;" class="paddingtambahan">
																		<button onClick="change_qty_<?= $f['id'] ?>(-1);" class="btn btn-primary" id="minus<?= $f['id'] ?>">-</button>
																		<input type="text" value="<?= $values['product_qty'] ?>" id="qty<?= $f['id'] ?>" name="qty" readonly style="width:3em;">
																		<button onClick="change_qty_<?= $f['id'] ?>(1);" class="btn btn-primary" id="plus<?= $f['id'] ?>">+</button>
																	</div>
																<?php
																	$flag = true;
																	break;
																}
															}

															if (!$flag) {
																?>
																<button style="display:block; width:7em;" id="shop_cart_btn<?= $f['id'] ?>" class="add_cart btn btn-primary btn-outline-primary2 btnaddtocart paddingtambahan" data-productid="<?= $f['id'] ?>" data-productname="<?= $f['name'] ?>" data-productprice="<?= $f['price'] ?>" data-productpic="<?= $f['gambar'] ?>" onClick="shopping_<?= $f['id'] ?>();">
																	Add to Cart
																</button>
																<div id="qty_div<?= $f['id'] ?>" style="display:none; width:7em;" class="paddingtambahan">
																	<button onClick="change_qty_<?= $f['id'] ?>(-1);" class="btn btn-primary" id="minus<?= $f['id'] ?>">-</button>
																	<input type="text" value="0" id="qty<?= $f['id'] ?>" name="qty" readonly style="width:3em;">
																	<button onClick="change_qty_<?= $f['id'] ?>(1);" class="btn btn-primary" id="plus<?= $f['id'] ?>">+</button>
																</div>
															<?php
															}
														} else {
															?>

															<button style="display:block; width:7em;" id="shop_cart_btn<?= $f['id'] ?>" class="add_cart btn btn-primary btn-outline-primary2 btnaddtocart paddingtambahan" data-productid="<?= $f['id'] ?>" data-productname="<?= $f['name'] ?>" data-productprice="<?= $f['price'] ?>" data-productpic="<?= $f['gambar'] ?>" onClick="shopping_<?= $f['id'] ?>();">
																Add to Cart
															</button>
															<div id="qty_div<?= $f['id'] ?>" style="display:none; width:7em;" class="paddingtambahan">
																<button onClick="change_qty_<?= $f['id'] ?>(-1);" class="btn btn-primary" id="minus<?= $f['id'] ?>">-</button>
																<input type="text" value="0" id="qty<?= $f['id'] ?>" name="qty" readonly style="width:3em;">
																<button onClick="change_qty_<?= $f['id'] ?>(1);" class="btn btn-primary" id="plus<?= $f['id'] ?>">+</button>
															</div>

														<?php
														}

														?>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<script type="text/javascript">
		var cart = [];
		<?php foreach ($food as $f) : ?>
			var item_<?= $f['id'] ?> = "";
		<?php endforeach; ?>

		function load_avalaible_cart() {
			<?php
			if (isset($_COOKIE['shopping_cart'])) {
				$cookie_data = stripslashes($_COOKIE['shopping_cart']);
				$cart_data = json_decode($cookie_data, true);

				foreach ($cart_data as $keys => $values) {
					foreach ($food as $fd) {
						if ($values['product_id'] == $fd['id']) {
			?>
							//console.log('hey');
							var qty = parseInt(document.getElementById('qty<?= $fd['id'] ?>').value);
							var id = $("#hdnSession").data('value');
							var product_id = $('#shop_cart_btn<?= $fd['id'] ?>').data("productid");
							var product_name = $('#shop_cart_btn<?= $fd['id'] ?>').data("productname");
							var product_price = $('#shop_cart_btn<?= $fd['id'] ?>').data("productprice");
							var product_pic = $('#shop_cart_btn<?= $fd['id'] ?>').data("productpic");

							item_<?= $fd['id'] ?> = {
								'user_id': id,
								'product_id': product_id,
								'product_name': product_name,
								'product_price': product_price,
								'product_qty': qty,
								'product_pic': product_pic
							};

							cart.push(item_<?= $fd['id'] ?>);
							setCookie(cart, 1);

			<?php
						}
					}
				}
			}
			?>


		}
		<?php foreach ($food as $fo) : ?>

			function shopping_<?= $fo['id'] ?>() {
				<?php if (!isset($_SESSION['email'])) {
				?>
					$('#myModalNorm1').modal('show');
					return false;
				<?php
				} else {
				?>
					document.getElementById('shop_cart_btn<?= $fo['id'] ?>').style.display = "none";
					document.getElementById('qty_div<?= $fo['id'] ?>').style.display = "flex";
					var qty = parseInt(document.getElementById('qty<?= $fo['id'] ?>').value);
					qty++;
					document.getElementById('qty<?= $fo['id'] ?>').value = qty;

					var id = $("#hdnSession").data('value');
					var product_id = $('#shop_cart_btn<?= $fo['id'] ?>').data("productid");
					var product_name = $('#shop_cart_btn<?= $fo['id'] ?>').data("productname");
					var product_price = $('#shop_cart_btn<?= $fo['id'] ?>').data("productprice");
					var product_pic = $('#shop_cart_btn<?= $fo['id'] ?>').data("productpic");

					item_<?= $fo['id'] ?> = {
						'user_id': id,
						'product_id': product_id,
						'product_name': product_name,
						'product_price': product_price,
						'product_qty': qty,
						'product_pic': product_pic
					};

					cart.push(item_<?= $fo['id'] ?>);
					setCookie(cart, 1);
				<?php } ?>

			}

			function change_qty_<?= $fo['id'] ?>(count) {
				var qty = parseInt(document.getElementById('qty<?= $fo['id'] ?>').value);
				var limit = parseInt(<?= $fo['stock'] ?>);
				if ((qty + count) > limit) {
					alert('Maximum quantity reached');
					return false;
				}
				qty += count;
				document.getElementById('qty<?= $fo['id'] ?>').value = qty;
				//console.log(qty);
				if (qty <= 0) {
					document.getElementById('shop_cart_btn<?= $fo['id'] ?>').style.display = "block";
					document.getElementById('qty_div<?= $fo['id'] ?>').style.display = "none";
					//remove from cart
					remove_item(item_<?= $fo['id'] ?>['product_id']);
					//kalo cart kosong, cookie dihapus
					if (!cart.length) {
						delete_cookie('shopping_cart');
					}
				}
				update_qty(item_<?= $fo['id'] ?>['product_id'], qty);
				console.log(item_<?= $fo['id'] ?>);
				setCookie(cart, 1);
			}


		<?php endforeach; ?>

		function remove_item(product_id) {
			for (var i = 0; i < cart.length; i++) {
				if (cart[i].product_id === product_id) {
					cart.splice(i, 1);
					break;
				}
			}
		}

		function update_qty(product_id, qty) {
			for (var i in cart) {
				if (cart[i].product_id == product_id) {
					cart[i].product_qty = qty;
					break;
				}
			}
		}

		function setCookie(cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
			var expires = "expires=" + d.toUTCString();
			document.cookie = 'shopping_cart' + "=" + JSON.stringify(cvalue) + ";" + expires + ";path=/";
		}

		function delete_cookie(name) {
			document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';
		}

		function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			//console.log(ca);
			for (var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					console.log(c.substring(name.length, c.length));
					//return c.substring(name.length, c.length);
				}
			}
			return "";
		}

		function getCart() {
			console.log(cart);
		}

		function clear_cart() {
			cart = "";
		}
	</script>