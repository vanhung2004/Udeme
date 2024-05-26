<main class="bg_gray">

	<div class="container margin_30">
		<div class="page_header ">

			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
			</div>
			<h1>Giỏ hàng</h1>
		</div>
		<!-- /page_header -->


		<table class="table table-striped cart-list">
			<form action="index.php?act=submit" method="post">

				<thead>
					<tr>

						<th>
							Tên sản phẩm
						</th>
						<th>Ảnh </th>
						<th>
							Giá
						</th>
						<th>
							Size
						</th>
						<th>
							Số lượng
						</th>
						<th>
							Tổng tiền
						</th>
						<th>

						</th>
					</tr>
				</thead>
				<tbody id="cart">
					<?php

					$tong = 0;
					$i = 0;

					foreach ($_SESSION['cart'] as $key => $value):
						extract($value);
						$image = explode(',', $value[2])[0];
						$ttien = $value[3] * $value[5];
						$tong += $ttien;

						$deleteCart = "index.php?act=deleteCart&idCart=" . $i;




						?>

						<tr>
							<!-- tên  -->
							<td>
								<span class="item_cart mb-4">
									<?= $value[1] ?>
								</span>
							</td>
							<!-- ảnh  -->
							<td>
								<div class="thumb_cart">

									<img src="image/<?= $image ?>" data-src="../image/<?= $image ?>" class="item-box"
										alt="">

								</div>
							</td>

							<!-- đơn giá  -->
							<td>
								<?= number_format($value[3], 0, '.', ','); ?>
							</td>
							<!-- size  -->
							<td>
								<?= $value[4] ?>
							</td>

							<!-- số lượng  -->
							<td>
								<div class="numbers">

									<input type="number" value="<?= $value[5] ?>" id="quantity_1" class="qty2"
										name="quantity[<?= $key ?>]" min="1" max="100">

								</div>


							</td>
							<!-- tổng  -->
							<td id="total">
								<?= number_format($ttien, 0, '.', ','); ?>
							</td>
							<!-- xóa  -->
							<td class="options">
								<a href="<?= $deleteCart ?>" class="delete">
									<i class="ti-trash"></i>
								</a>
							</td>
						</tr>

						<?php
						$i += 1;
					endforeach; ?>

				</tbody>
				<tbody id="tongdonhang">

					<tr>
						<td colspan="6">
							<a href="index.php?act=deleteCart">Xóa Giỏ Hàng</a>
						</td>
						<td> <input type="submit" name="capnhatcart" id="" value="Cập Nhật" class="btn_1"></td>
					</tr>
				</tbody>
			</form>
		</table>
	</div>
	<!-- /container -->

	<div class="box_cart">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
					<ul>
						<li>
							<span>Tổng Tiền</span>
							<?= number_format($tong, 0, '.', ','); ?>VND
						</li>

					</ul>
					<a href="index.php?act=checkout" class="btn_1 full-width cart">Tiến hành thanh toán </a>
				</div>
			</div>
		</div>
	</div>
	<!-- /box_cart -->

</main>