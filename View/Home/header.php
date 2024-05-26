<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Ansonika">
	<title>Unique | Vẻ đẹp của bạn , phong cách của chúng tôi </title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="View/img/logo_4.png" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/logo_4.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="View/img/logo_4.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="View/img/logo_4.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/logo_4.png">

	<!-- GOOGLE WEB FONT -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

	<!-- BASE CSS -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<link href="./View/css/bootstrap.css" rel="stylesheet">
	<link href="./View/css/bootstrap.min.css" rel="stylesheet">
	<link href="./View/css/style.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
	<link href="./View/css/home_1.css" rel="stylesheet">
	<link rel="stylesheet" href="./View/css/leave_review.css">
	<!-- YOUR CUSTOM CSS -->
	<link href="./View/css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="./View/css/cart.css">
	<link rel="stylesheet" href="./View/css/checkout.css">
	<link rel="stylesheet" href=".View/css/account.css">
	<link rel="stylesheet" href=".View/css/home_1.css">
	<link rel="stylesheet" href="./View/css/product_page.css">
	<link rel="stylesheet" href="./View/css/listing.css">
	<link rel="stylesheet" href="./Admin/css/style.css">
	<link rel="stylesheet" href="./View/css/faq.css">
	<link rel="stylesheet" href="./View/css/contact.css">
	<script src="View/js/ajax.googleapis.com_ajax_libs_jquery_3.7.1_jquery.min.js"></script>
	<script src="View/js/libary.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
	<div id="page">
		<header class="version_1">
			<div class="layer"></div><!-- Mobile menu overlay mask -->
			<div class="main_header">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
							<div id="logo">
								<a href="index.php"><img src="View/img/logo_4.png" alt="" width="50" height="50"></a>
							</div>
						</div>
						<nav class="col-xl-6 col-lg-7">
							<a class="open_close" href="javascript:void(0);">
								<div class="hamburger hamburger--spin">
									<div class="hamburger-box">
										<div class="hamburger-inner"></div>
									</div>
								</div>
							</a>
							<!-- Mobile menu button -->
							<div class="main-menu">
								<div id="header_menu">
									<a href="index.php"><img src="View/img/logo_4.png" alt="" width="100"
											height="35"></a>
									<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
								</div>
								<ul>
									<li class="">
										<a href="index.php?act=home" class="show-submenu">Trang Chủ</a>
									</li>
									<li class="">
										<a href="index.php?act=sanpham" class="">Sản Phẩm</a>
									</li>
									<li class="">
										<a href="index.php?act=help" class="show-submenu">Hỗ Trợ</a>
									</li>
									<li class="">
										<a href="index.php?act=lienhe" class="show-submenu">Liên Hệ</a>
									</li>

								</ul>
							</div>
							<!--/main-menu -->
						</nav>
						<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
							<a class="phone_top" href="tel://0343014882"><strong><span>Cần Hỗ Trợ</span>0343014882
								</strong></a>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
			<!-- /main_header -->
			<div class="main_nav Sticky">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 col-md-3">
							<nav class="categories">
								<ul class="clearfix">
									<li>
										<span>
											<a href="#">
												<span class="hamburger hamburger--spin">
													<span class="hamburger-box">
														<span class="hamburger-inner"></span>
													</span>
												</span>
												Danh Mục Sản Phẩm
											</a>
										</span>
										<div id="menu">
											<ul>
												<?php
												foreach ($sellect_categories as $show): ?>
													<?php extract($show); ?>


													<?php $category_detail = "index.php?act=sanpham&id_cate=" . $category_id; ?>
													<li>
														<span><a href="<?= $category_detail ?>">
																<?= $category_name ?>
															</a></span>
													</li>

												<?php endforeach; ?>



											</ul>
										</div>
									</li>
								</ul>
							</nav>
						</div>
						
							
								<!-- tìm kiếm  -->
						<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
							<div class="custom-search-input">
								<form action="index.php?act=sanpham" method="post">
									<input type="text" placeholder="Search ... " name="key">
									<button type="submit" name="timkiem"><i
											class="header-icon_search_custom"></i></button>
								</form>
							</div>
						</div>
						

						<!-- giỏ hàng nhỏ  -->
						<div class="col-xl-3 col-lg-2 col-md-3">
							<ul class="top_tools">
								<li>
									<div class="dropdown dropdown-cart">
										<a href="index.php?act=viewCart" class="cart_bt" id="boxcart"></a>
										<div class="dropdown-menu">
											<ul>
												<?php
												$i = 0;
												$Tongthanhtoan = 0;
												$tong = 0;
												foreach ($_SESSION['cart'] as $key => $value):
													extract($value);

													$ttien = $value[3] * $value[5];
													$tong += $ttien;
													$Tongthanhtoan = $tong + 29000;
													$deleteCart = "index.php?act=deleteCart&idCart=" . $i;
													?>



													<li>
														<a href="index.php?act=chitietsp&idct_sp=<?= $product_id ?>">
															<figure><img src="./image/<?= explode(',', $value[2])[0]; ?>"
																	data-src="./image/<?= explode(',', $value[2])[0]; ?>"
																	alt="" width="50" height="50" class="lazy"></figure>
															<strong><span>
																	<?= $value[5]; ?> x
																	<?= $value[4] ?> x
																	<?= $value[1] ?>
																</span>
																<?= number_format($value[3], 0, '.', ',') ?> VND
															</strong>
														</a>
														<a href="<?= $deleteCart ?>" class="action"><i
																class="ti-trash"></i></a>
													</li>

													<?php
													$i++;
												endforeach; ?>
											</ul>
											<div class="total_drop">
												<div class="clearfix"><strong>Tổng tiền</strong><span>
														<?= number_format($tong, 0, '.', ',') ?> VND
													</span></div>

												<a href="index.php?act=viewCart" class="btn_1 outline">Đến giỏ hàng</a>

											</div>
										</div>
									</div>
									<!-- /dropdown-cart-->
								</li>
								<li>
									<a href="#0" class=""><span></span></a>
								</li>


								<!-- mục tài khoản    -->
								<li>
									<?php
									if ($user) {
										?>
										<div class="dropdown dropdown-access">
											<a href="index.php?act=user" class="">
												<?= $user ? $user['user_name'] : "" ?>
											</a>
											<div class="dropdown-menu">
												<?= $user['role'] == 1 ? '<a href="admin/index.php">Đăng nhập Admin</a>' : '' ?>
												<ul>
													<li>
														<a href="index.php?act=user"><i class="ti-user"></i>
															Thông tin tài khoản
														</a>
													</li>
													<li>
														<a href="index.php?act=my_orders"><i class="ti-truck"></i>Theo dõi
															đơn hàng
														</a>
													</li>


													<li>
														<a href="index.php?act=logout" class="logout_a"><i
																class="ti-lock"></i>Đăng xuất</a>
													</li>
												</ul>
											</div>
										</div>
										<?php
									} else {
										?>
										<div class="dropdown dropdown-access">
											<a href="index.php?act=account" class="access_link"><span>Tài khoản</span></a>
											<div class="dropdown-menu">
												<a href="index.php?act=account" class="btn_1">Đăng nhập / Đăng Kí</a>
												<ul>
													<li>
														<a href="index.php?act=user"><i class="ti-user"></i>Thông tin tài
															khoản</a>
													</li>
													<li>
														<a href="index.php?act=my_orders"><i class="ti-truck"></i>Theo dõi
															đơn hàng
														</a>
													</li>

													<li>
														<a href="index.php?act=help"><i class="ti-help-alt"></i>Hỗ trợ</a>
													</li>
												</ul>
											</div>
										</div>
										<!-- /dropdown-access-->
										<?php
									}
									?>
								</li>
								<!--  -->
							</ul>
						</div>
					</div>
					<!-- /row -->
				</div>

				<!-- /search_mobile -->
			</div>
			<!-- /main_nav -->
		</header>
		<!-- /header -->