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


        </div>
        <!-- /page_header -->
        <form action="index.php?act=bill" method="post">
            <div class="row">

                <!-- form đặt hàng  -->
                <div class="col-lg-4 col-md-6">
                    <div class="step first">
                        <h3>1. Thông tin và địa chỉ thanh toán</h3>

                        <div class="tab-content checkout">

                            <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
                                <?php
                                if ($user) { ?>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="email"
                                            value="<?= $user['email'] ?>">
                                    </div>


                                    <div class="form-group pr-1">
                                        <input type="text" class="form-control" placeholder="Tên người nhận" name="name"
                                            value="<?= $user['user_name'] ?>">
                                    </div>


                                    <!-- /row -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Địa chỉ" name="address"
                                            value="<?= $user['address'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Số điện thoại" name="tel"
                                            value="<?= $user['tel'] ?>">
                                    </div>
                                <?php }


                                ?>
                                <hr>
                            </div>

                        </div>
                    </div>
                    <!-- /step -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="step middle payments">
                        <h3>2. Hình thức thanh toán </h3>
                        <ul>
                            <li>
                                <label class="container_radio">Thanh toán khi nhận hàng <a href="#0" class="info"
                                        data-bs-toggle="modal" data-bs-target="#payments_method"></a>
                                    <input type="radio" name="payment" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </li>

                        </ul>
                        <div class="payment_info d-none d-sm-block">
                            <figure><img src="img/cards_all.svg" alt=""></figure>
                            <p>Hình thức thanh toán này mang lại sự tiện lợi và an tâm, giúp bạn tránh được những phiền
                                toái có thể xảy ra khi thanh toán trước. Đồng thời, nó còn tạo ra một trải nghiệm mua
                                sắm trực tuyến an toàn và linh hoạt, đặc biệt là khi bạn muốn đảm bảo rằng sản phẩm đáp
                                ứng đúng những mong đợi của mình trước khi chi trả bất kỳ số tiền nào. </p>
                        </div>



                    </div>
                    <!-- /step -->

                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="step last">
                        <h3>3. Tóm tắt đơn hàng</h3>
                        <div class="box_general summary">
                            <ul>
                                <?php
                                $Tongthanhtoan = 0;
                                $tong = 0;
                                foreach ($_SESSION['cart'] as $key => $value):
                                    extract($value);
                                    $image = explode(',', $value[2])[0];
                                    $ttien = $value[3] * $value[5];
                                    $tong += $ttien;
                                    $Tongthanhtoan = $tong + 29000; ?>
                                    <li class="clearfix"><em>
                                            <?= $value[5]; ?> x
                                            <?= $value[4] ?> x
                                            <?= $value[1] ?>
                                        </em> <span>
                                            <?= number_format($value[3], 0, '.', ',') ?> VND
                                        </span></li>

                                <?php endforeach; ?>
                            </ul>
                            <ul>
                                <li class="clearfix"><em><strong>Tổng phụ</strong></em> <span>
                                        <?= number_format($tong, 0, '.', ',') ?> VND
                                    </span></li>
                                <li class="clearfix"><em><strong>Phí vận chuyển</strong></em> <span>29,000 VND</span>
                                </li>

                            </ul>
                            <div class="total clearfix">Tổng tiền <span>
                                    <?= number_format($Tongthanhtoan, 0, '.', ',') ?> VND
                                </span></div>

                            <input type="submit" name="bill_Comfirm" id="" value="Xác nhận đặt hàng"
                                class="btn_1 full-width">

                        </div>
                        <!-- /box_general -->
                    </div>
                    <!-- /step -->
                </div>

            </div>
        </form>
        <!-- /row -->
    </div>

    <!-- /container -->
</main>