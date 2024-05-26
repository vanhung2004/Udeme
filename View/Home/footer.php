<footer class="revealed">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<h3 data-bs-target="#collapse_1">Truy Cập Nhanh</h3>
				<div class="collapse dont-collapse-sm links" id="collapse_1">
					<ul>
						<li><a href="about.html">Về Chúng Tôi</a></li>
						<li><a href="help.html">Câu Hỏi Thường Gặp </a></li>
						<li><a href="help.html">Giúp Đỡ</a></li>
						<li><a href="account.html">Tài Khoản</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="contacts.html">Liên Hệ</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<h3 data-bs-target="#collapse_2">Danh Mục</h3>
				<div class="collapse dont-collapse-sm links" id="collapse_2">
					<ul>

						<?php
						foreach ($sellect_categories as $show): ?>
							<?php extract($show); ?>


							<?php $category_detail = "index.php?act=chitietdm&id_cate=" . $category_id; ?>
							<li><a href="<?= $category_detail ?>">
									<?= $category_name ?>
								</a></li>

						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<h3 data-bs-target="#collapse_3">Liên Hệ</h3>
				<div class="collapse dont-collapse-sm contacts" id="collapse_3">
					<ul>
						<li><i class="ti-home"></i>Trinh Van Bo street ,Nam Tu Liem<br>Ha Noi -Viet Nam</li>
						<li><i class="ti-headphone-alt"></i>+84 343 014 882</li>
						<li><i class="ti-email"></i><a href="#0">Unique@gmail.com</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<h3 data-bs-target="#collapse_4">Liên Hệ Với Chúng Tôi</h3>
				<div class="collapse dont-collapse-sm" id="collapse_4">
					<div id="newsletter">
						<div class="form-group">
							<input type="email" name="email_newsletter" id="email_newsletter" class="form-control"
								placeholder="Email Của Bạn">
							<button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
						</div>
					</div>
					<div class="follow_us">
						<h5>Theo dõi chúng tôi </h5>
						<ul>
							<li><a href="#0"><img
										src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
										data-src="View/img/twitter_icon.svg" alt="" class="lazy"></a></li>
							<li><a href="#0"><img
										src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
										data-src="View/img/facebook_icon.svg" alt="" class="lazy"></a></li>
							<li><a href="#0"><img
										src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
										data-src="View/img/instagram_icon.svg" alt="" class="lazy"></a></li>
						
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /row-->
		<hr>
		<div class="row add_bottom_25">
			<div class="col-lg-6">
				<ul class="footer-selector clearfix">
					<li>
						<div class="styled-select lang-selector">
							<select>
								<option value="English" selected>VietNam</option>
								<option value="French">French</option>
								<option value="Spanish">Spanish</option>
								<option value="Russian">English</option>
							</select>
						</div>
					</li>
					<li>
						<div class="styled-select currency-selector">
							<select>
								<option value="US Dollars" selected>VND</option>
								<option value="Euro">Us Dolar</option>
							</select>
						</div>
					</li>
					<li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
							data-src="View/img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
				</ul>
			</div>
			<div class="col-lg-6">
				<ul class="additional_links">
					<li><a href="#0">Các Điều Khoản Và Điều Kiện</a></li>
					<li><a href="#0">Riêng Tư</a></li>
					<li><span>© 2023 VIETNAM</span></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!--/footer-->
</div>
<!-- page -->

<div id="toTop"></div><!-- Back to top button -->

<!-- COMMON SCRIPTS -->
<script src="View/js/common_scripts.min.js"></script>
<script src="View/js/main.js"></script>

<!-- SPECIFIC SCRIPTS -->

<script src="View/js/carousel-home.min.js"></script>
<script src="View/js/sticky_sidebar.min.js"></script>
<script src="View/js/specific_listing.js"></script>

<script src="View/js/carousel-home.js"></script>
<script src="View/js/carousel_with_thumbs.js"></script>
<script src="View/js/account.js"></script>
<script src="View/js/slide.js"></script>
<script src="View/js/libary.js"></script>
<script src="View/js/validateQuanti.js"></script>


<script>
	// Sticky sidebar
	$('#sidebar_fixed').theiaStickySidebar({
		minWidth: 991,
		updateSidebarHeight: false,
		additionalMarginTop: 90
	});
</script>
<script>
	// Other address Panel
	$('#other_addr input').on("change", function () {
		if (this.checked)
			$('#other_addr_c').fadeIn('fast');
		else
			$('#other_addr_c').fadeOut('fast');
	});
</script>
</body>

</html>