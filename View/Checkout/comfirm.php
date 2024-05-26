<main class="bg_gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div id="confirm">
                    <div class="icon icon--order-success svg add_bottom_15">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                            <g fill="none" stroke="#8EC343" stroke-width="2">
                                <circle cx="36" cy="36" r="35"
                                    style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                <path d="M17.417,37.778l9.93,9.909l25.444-25.393"
                                    style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                            </g>
                        </svg>
                    </div>
                    <h2>Cảm ơn bạn đã đặt hàng</h2>

                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    <div class="container margin_30">
        <?php
        if (isset($bill) && (is_array($bill))) {
            extract($bill);
        } ?>
        <div class="d-flex ">

            <!-- thông tin đơn  hàng  -->
            <div>
                <h4><strong>Thông tin đơn hàng </strong></h4>
                <li>
                    <strong>
                        <em>Mã đơn hàng :</em>
                    </strong>
                    <?= $bill['id_bill'] ?>
                </li>
                <li>
                    <strong>
                        <em>Ngày đặt hàng :</em>
                    </strong>
                    <?= $bill['date'] ?>
                </li>

                <li>
                    <strong>
                        <em>phương thức thanh toán :</strong>
                    </em>
                    <?= $bill['payment'] ?>
                </li>
                <li>
                    <strong>
                        <em>Tổng đơn hàng :</em>
                    </strong>
                    <?= number_format($bill['total'], 0, '.', ',') ?> VND
                </li>
            </div>
            <hr>

            <!-- thông tin người mua  -->
            <div class="mx-5">
                <h4><strong>Thông tin người mua </strong></h4>
                <li>
                    <strong>
                        <em>Tên người mua:</em>
                    </strong>
                    <?= $bill['name'] ?>
                </li>
                <li>
                    <strong>
                        <em>Địa chỉ:</em>
                    </strong>
                    <?= $bill['address'] ?>
                </li>
                <li>
                    <strong>
                        <em>Số điện thoại: </em>
                    </strong>

                    <?= '0' . $bill['tel'] ?>
                </li>
                <li>
                    <strong>
                        <em>Email:</em>
                    </strong>
                    <?= $bill['email'] ?>
                </li>

            </div>
        </div>
        <div class="pt-3"> <a href="index.php?act=my_orders" class="btn_1  btn-width">Xem danh sách đơn hàng</a></div>
        <hr>

        <!-- chi tiết đơn hàng  -->
        <table class="table table-striped cart-list">
            <h4>Chi tiết đơn hàng</h4>
            <thead>
                <tr>

                    <th>Tên sản phẩm</th>
                    <th>Ảnh </th>
                    <th>Giá</th>
                    <th>Size</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>

                </tr>
            </thead>
            <hr>
            <tbody id="cart">
                <?php
                $tong = 0;
                $i = 0;

                foreach ($bill_detail as $key => $value) {
                    extract($value);


                    $tong += $value['total'];

                    echo '<tr>
                                   <td>
                                       <span class="item_cart mb-4">
                                           ' . $value['name'] . '
                                       </span>
                                   </td>
                                   <td>
                                       <div class="thumb_cart">
           
                                           <img src="image/' . explode(',', $image)[0] . '" data-src="image/' . explode(',', $image)[0] . '" class="item-box" alt="">
           
                                       </div>
                                   </td>
                                   <td>
                                       ' . number_format($value['price'], 0, '.', ',') . '
                                   </td>
                                   <td>
                                       ' . $value['size'] . '
                                   </td>
                                   <!-- số lượng  -->
                                   <td>
                                       <div class="numbers">
                                           <input type="number" value="' . $value['quantity'] . '" id="quantity_1" class="qty2" name="quantity_1"
                                               min="1" max="100">
           
                                       </div>
                                   </td>
                                   <!-- tổng  -->
                                   <td id="total">
                                       ' . number_format($value['total'], 0, '.', ',') . '
                                   </td>                                 
                               </tr>';
                    $i += 1;
                }
                ?>
            </tbody>
        </table>
    </div>

</main>