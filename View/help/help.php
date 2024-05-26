<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Danh mục</a></li>
                    <li>Trang hoạt động</li>
                </ul>
            </div>
            <h1>Trợ giúp và Hỗ trợ</h1>
        </div>
        <!-- /page_header -->
        <div class="search-input">
            <input type="text" placeholder="Tìm kiếm câu hỏi hoặc bài viết...">
            <button type="submit"><i class="ti-search"></i></button>
        </div>
        <!-- /search-input -->

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <a class="box_topic" href="#0">
                    <i class="ti-wallet"></i>
                    <h3>Thanh toán</h3>
                    <p>Mô tả chi tiết về thanh toán và cách thức hoạt động của nó.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <?php if ($user): ?>
                    <a class="box_topic" href="index.php?act=user">
                        <i class="ti-user"></i>
                        <h3>Tài khoản</h3>
                        <p>Mô tả chi tiết về quản lý tài khoản và các chức năng liên quan.</p>
                    </a>
                <?php endif; ?>
                <?php if (!$user): ?>
                    <a class="box_topic" href="index.php?act=account">
                        <i class="ti-user"></i>
                        <h3>Tài khoản</h3>
                        <p>Mô tả chi tiết về quản lý tài khoản và các chức năng liên quan.</p>
                    </a>
                <?php endif; ?>

            </div>
            <div class="col-lg-4 col-md-6">
                <a class="box_topic" href="#0">
                    <i class="ti-help"></i>
                    <h3>Trợ giúp chung</h3>
                    <p>Các thông tin hỗ trợ chung và hướng dẫn sử dụng dành cho người dùng.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a class="box_topic" href="#0">
                    <i class="ti-truck"></i>
                    <h3>Vận chuyển</h3>
                    <p>Thông tin về quy trình vận chuyển và các dịch vụ liên quan.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a class="box_topic" href="#0">
                    <i class="ti-eraser"></i>
                    <h3>Huỷ đơn hàng</h3>
                    <p>Hướng dẫn và quy trình liên quan đến việc hủy đơn hàng.</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a class="box_topic" href="#0">
                    <i class="ti-comments"></i>
                    <h3>Đánh giá</h3>
                    <p>Thông tin về cách đánh giá sản phẩm và dịch vụ của chúng tôi.</p>
                </a>
            </div>
        </div>
        <!--/row-->
    </div>
    <!-- /container -->
    <div class="bg_white">
        <div class="container margin_30">
            <h5>Bài viết phổ biến</h5>
            <div class="list_articles add_bottom_15 clearfix">
                <ul>
                    <li><a href="#0"><i class="ti-file"></i><strong>Tài khoản</strong> - Et dicit vidisse epicurei
                            pri</a></li>
                    <li><a href="#0"><i class="ti-file"></i><strong>Tài khoản</strong> - Ad sit virtute rationibus
                            efficiantur</a></li>
                    <li><a href="#0"><i class="ti-file"></i><strong>Hoàn tiền</strong> - Partem vocibus omittam pri
                            ne</a></li>
                    <li><a href="#0"><i class="ti-file"></i><strong>Vận chuyển</strong> - Case debet appareat duo cu</a>
                    </li>
                    <li><a href="#0"><i class="ti-file"></i><strong>Thanh toán</strong> - Impedit torquatos quo in</a>
                    </li>
                    <li><a href="#0"><i class="ti-file"></i><strong>Bảo hành</strong> - Nec omnis alienum no</a></li>
                    <li><a href="#0"><i class="ti-file"></i><strong>Hoàn tiền</strong> - Quo eu soleat facilisi
                            menandri</a></li>
                    <li><a href="#0"><i class="ti-file"></i><strong>Đánh giá</strong> - Et dicit vidisse epicurei
                            pri</a></li>
                </ul>
            </div>
            <!-- /list_articles -->
        </div>
    </div>
    <!-- /bg_white -->
</main>