<main class="bg_gray">

	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
			</div>
			<h1>User Information</h1>
		</div>
		<!-- /page_header -->
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Information</h3> <small class="float-right pt-2">* Required Fields</small>
					<form action="index.php?act=user" onsubmit="return sendDangky()" method="post">
						<div class="form_container">
							<div class="form-group">
								<input type="email" value="<?= $load__thontin['email'] ?>" class="form-control email"
									name="email" id="email_2" placeholder="Email*">
							</div>
							<div class="err__login">
								<div class="email__err"></div>
							</div>
							<div class="form-group">
								<input type="password" class="form-control password" name="password" id="password_in_2"
									value="<?= $load__thontin['password'] ?>" placeholder="Password*">
							</div>
							<div class="err__login">
								<div class="pass__err"></div>
							</div>
							<div class="private box">
								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<input type="text" value="<?= $load__thontin['user_name'] ?>"
												class="form-control name" name="name" placeholder="Name*">
										</div>
										<div class="err__login">
											<div class="name__err"></div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" value="<?= $load__thontin['address'] ?>"
												class="form-control address" name="address" placeholder="Full Address*">
										</div>
										<div class="err__login">
											<div class="address__err"></div>
										</div>
									</div>
								</div>
								<!-- /row -->

								<div class="row no-gutters">
									<div class="col-6 pl-1">
										<div class="form-group">
											<input type="text" value="<?= $load__thontin['tel'] ?>"
												class="form-control phone" name="phone" placeholder="Telephone *">
										</div>
										<div class="err__login">
											<div class="phone__err"></div>
										</div>
									</div>
								</div>
								<!-- /row -->

							</div>
							<!-- /private -->
							<!-- /company -->
							<div class="text-center"><input type="submit" value="Confirm" name="signup"
									class="btn_1 full-width"></div>
						</div>
					</form>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</main>