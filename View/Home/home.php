<main>

	<!-- banner full  -->
	<div id="carousel-home">
		<div class="owl-carousel owl-theme">
			<div class="owl-slide cover" style="background-image: url(View/img/banner10.jpg);">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-end">
							<div class="col-lg-6 static">
								<div class="slide-text text-end white">
									<h2 class="owl-slide-animated owl-slide-title"><br>Thời Thượng
									</h2>
									<p class="owl-slide-animated owl-slide-subtitle">

									</p>
									<div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
											href="listing-grid-1-full.html" role="button">Mua Sắm Ngay</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/owl-slide-->
			<div class="owl-slide cover" style="background-image: url(View/img/banner8.jpg);">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-6 static">
								<div class="slide-text white">
									<h2 class="owl-slide-animated owl-slide-title"><br>Quý Phái
									</h2>
									<p class="owl-slide-animated owl-slide-subtitle">

									</p>
									<div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
											href="listing-grid-1-full.html" role="button">Mua Sắm Ngay</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/owl-slide-->
			<div class="owl-slide cover" style="background-image: url(View/img/banner9.jpg);">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-12 static">
								<div class="slide-text text-center  white">
									<h2 class="owl-slide-animated owl-slide-title"><br>Phong Cách
									</h2>
									<p class="owl-slide-animated owl-slide-subtitle">

									</p>
									<div class="owl-slide-animated owl-slide-cta"><a class="btn_1"
											href="listing-grid-1-full.html" role="button">Mua Sắm Ngay</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/owl-slide-->
			</div>
		</div>
		<div id="icon_drag_mobile"></div>
	</div>
	<!-- hết banner full  -->

	<!-- banner grid  -->
	<ul id="banners_grid" class="clearfix">
		<li>
			<a href="#0" class="img_container">
				<img src="View/img/banner1.jpg" data-src="View/img/banner1.jpg" alt="" class="lazy">
				<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<h3>Thanh lịch</h3>
					<div><span class="btn_1">Mua Sắm Ngay</span></div>
				</div>
			</a>
		</li>
		<li>
			<a href="#0" class="img_container">
				<img src="View/img/banner3.jpg" data-src="View/img/banner3.jpg" alt="" class="lazy">
				<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<h3>Lãng Mạn</h3>
					<div><span class="btn_1">Mua Sắm Ngay</span></div>
				</div>
			</a>
		</li>
		<li>
			<a href="#0" class="img_container">
				<img src="View/img/banner4.jpg" data-src="View/img/banner4.jpg" alt="" class="lazy">
				<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<h3>Quyến rũ</h3>
					<div><span class="btn_1">Mua Sắm Ngay</span></div>
				</div>
			</a>
		</li>
	</ul>
	<!-- hết banner grid  -->

	<!-- sp mới  -->
	<div class="container margin_60_35">
		<div class="main_title">
			<h2>Sản Phẩm Mới</h2>
			<p>Chúng tôi luôn cập nhật những sản phẩm mới cho quý khách hàng lựa chọn</p>
		</div>
		<div class="row small-gutters">
			<?php foreach ($loadall_sanpham as $key => $value):
				extract($value);
				?>

				<div class="col-sl-6 col-md-4 col-xl-3 pb-4">
					<form action="index.php?act=addtocart" method="post" class="">

						<div class="grid_item boxsp">
							<span class="ribbon new">New</span>
							<figure>
								<a href="index.php?act=chitietsp&idct_sp=<?= $product_id ?>">
									<img class="img-fluid lazy " src="image/<?= explode(',', $image)[0] ?>"
										data-src="image/<?= explode(',', $image)[0] ?>" alt="">
									<img class="img-fluid lazy" src="image/<?= explode(',', $image)[0] ?>"
										data-src="image/<?= explode(',', $image)[0] ?>" alt="">
								</a>
							</figure>
							<a href="index.php?act=chitietsp&idct_sp=<?= $product_id ?>">
								<h3>
									<?= $product_name ?>
								</h3>
							</a>
							<div class="price_box">
								<span class="new_price">
									<?=
										number_format($price, 0, '.', ','); ?> VND
								</span>
							</div>
						</div>
						<?php if ($user) { ?>
							<div class="spacer-20 d-flex justify-content-center	">
								<input type="submit" name="addcart" id="" value="Thêm vào giỏ hàng " class="btn_1">
							</div>
						<?php } else { ?>
							<div class="spacer-20 d-flex justify-content-center	">
								<!-- <input type="submit" name="addcart" id="" value="Thêm vào giỏ hàng " class="btn_1"> -->
							</div>
						<?php } ?>
						<input type="hidden" name="product_id" id="" value="<?= $product_id ?>">
						<input type="hidden" name="product_name" id="" value="<?= $product_name ?>">
						<input type="hidden" name="img" id="" value="<?= $image ?>">
						<input type="hidden" name="price" id="" value="<?= $price ?>">
					</form>
				</div>


			<?php endforeach; ?>


		</div>

	</div>
	<!-- hết sp mới  -->

	<!-- sản phẩm bán chạy  -->
	<div class="container margin_60_35">
		<div class="main_title">
			<h2>Sản phẩm bán chạy</h2>

			<p>Xu hướng với sản phẩm hot nhất</p>
		</div>
		<div class="owl-carousel owl-theme products_carousel">
			<?php foreach ($sp_banchay as $key => $value):
				extract($value);

				?>
				<form action="index.php?act=addtocart" method="post" class="">
					<div class="item">
						<div class="grid_item">
							<figure>
								<a href="index.php?act=chitietsp&idct_sp=<?= $product_id ?>">
									<img class="owl-lazy lazy" src="image/<?= explode(',', $image)[0] ?>"
										data-src="image/<?= explode(',', $image)[0] ?>" alt="">
								</a>
							</figure>

							<a href="index.php?act=chitietsp&idct_sp=<?= $product_id ?>">
								<h3>
									<?= $product_name ?>
								</h3>
							</a>
							<div class="price_box">
								<span class="new_price">
									<?=
										number_format($price, 0, '.', ','); ?> VND
								</span>
							</div>

						</div>

					</div>
					<?php if ($user) { ?>
						<div class="spacer-20 d-flex justify-content-center	">
							<input type="submit" name="addcart" id="" value="Thêm vào giỏ hàng " class="btn_1">
						</div>
					<?php } else { ?>
						<div class="spacer-20 d-flex justify-content-center	">
							<!-- <input type="submit" name="addcart" id="" value="Thêm vào giỏ hàng " class="btn_1"> -->
						</div>
					<?php } ?>
					<input type="hidden" name="product_id" id="" value="<?= $product_id ?>">
					<input type="hidden" name="product_name" id="" value="<?= $product_name ?>">
					<input type="hidden" name="img" id="" value="<?= $image ?>">
					<input type="hidden" name="price" id="" value="<?= $price ?>">
				</form>
			<?php endforeach; ?>


		</div>
	</div>
	<!-- hết sp đặc sắc  -->
</main>