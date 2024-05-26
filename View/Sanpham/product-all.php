<main>

	<div class="container margin_30">


		<!-- /toolbox -->
		<div class="row small-gutters">
			<?php foreach ($dssp as $value): ?>
				<?php extract($value);
				?>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>
							<a href="index.php?act=chitietsp&idct_sp=<?= $product_id ?>">
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
								<?= number_format($price, 0, '.', ',') ?> VND
							</span>

						</div>

					</div>
					<!-- /grid_item -->
				</div>
			<?php endforeach; ?>

			<!-- /col -->
		</div>
		<!-- /row -->

		<!-- phân trang  -->
		<div class="pagination__wrapper">

			<!-- phân trang nếu tồn tại danh mục  -->
			<?php if (isset($_GET['id_cate']) && $_GET['id_cate'] > 0): ?>
				<ul class="pagination">
					<li><a href="index.php?act=sanpham&page=<?= $page > 1 ? $page - 1 : 1 ?>&id_cate=<?= $_GET['id_cate'] ?>"
							class="prev" title="Trang trước">&#10094;</a></li>
					<?php
					$Pagepagination = ceil($countsp / $limit);

					for ($i = 1; $i <= $Pagepagination; $i++):
						?>
						<li>
							<a href="index.php?act=sanpham&page=<?= $i ?>&id_cate=<?= $_GET['id_cate'] ?>"
								class="<?= $i == $page ? 'active' : '' ?>">
								<?= $i ?>
							</a>
						</li>
					<?php endfor; ?>
					<li> <a href="index.php?act=sanpham&page=<?= $page < $Pagepagination ? $page + 1 : $page ?>&id_cate=<?= $_GET['id_cate'] ?>"
							class="next" title="Trang tiếp theo">&#10095;</a></li>
				</ul>

			<?php else: ?>


				<!-- phân trang nếu 0 tồn tại danh mục  -->

				<ul class="pagination">
					<li><a href="index.php?act=sanpham&page=<?= $page > 1 ? $page - 1 : 1 ?>" class="prev"
							title="Trang trước">&#10094;</a></li>
					<?php
					$Pagepagination = ceil($countsp / $limit);

					for ($i = 1; $i <= $Pagepagination; $i++):
						?>
						<li>
							<a href="index.php?act=sanpham&page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>">
								<?= $i ?>
							</a>
						</li>
					<?php endfor; ?>
					<li><a href="index.php?act=sanpham&page=<?= $page < $Pagepagination ? $page + 1 : $page ?>" class="next"
							title="Trang tiếp theo">&#10095;</a></li>
				</ul>
			<?php endif; ?>


		</div>

	</div>
	<!-- /container -->
</main>