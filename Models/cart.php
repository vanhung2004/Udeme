<?php
function viewCart() {

    $tong = 0;
    $i = 0;

    foreach($_SESSION['cart'] as $key => $value) {
        extract($value);
        $image = explode(',', $value[2])[0];
        $ttien = $value[3] * $value[5];
        $tong += $ttien;
        $deleteCart = "index.php?act=deleteCart&idCart=".$i;
        echo '<tr>
                        <td>
                            <span class="item_cart mb-4">
                                '.$value[1].'
                            </span>
                        </td>
                        <td>
                            <div class="thumb_cart">

                                <img src="../image/'.$image.'" data-src="../image/'.$image.'" class="item-box" alt="">

                            </div>
                        </td>


                        <td>
                            '.number_format($value[3], 0, '.', ',').'
                        </td>
                        <td>
                            '.$value[4].'
                        </td>
                        <!-- số lượng  -->
                        <td>
                            <div class="numbers">
                                <input type="number" value="'.$value[5].'" id="quantity_1" class="qty2" name="quantity_1"
                                    min="1" max="100">

                            </div>


                        </td>
                        <!-- tổng  -->
                        <td id="total">
                            '.number_format($ttien, 0, '.', ',').'
                        </td>
                        <td class="options">
                            <a href="'.$deleteCart.'" class="delete">
                                <i class="ti-trash"></i>
                            </a>
                        </td>
                    </tr>';


        $i += 1;

    }
}
function show_bill_details($listbill) {

    $tong = 0;
    $i = 0;

    foreach($listbill as $key => $value) {
        extract($value);
        $image = explode(',', $value[2])[0];

        $tong += $value['total'];

        echo '<tr>
                        <td>
                            <span class="item_cart mb-4">
                                '.$value['name'].'
                            </span>
                        </td>
                        <td>
                            <div class="thumb_cart">

                                <img src="../image/'.$image.'" data-src="../image/'.$image.'" class="item-box" alt="">

                            </div>
                        </td>


                        <td>
                            '.number_format($value['price'], 0, '.', ',').'
                        </td>
                        <td>
                            '.$value['size'].'
                        </td>
                        <!-- số lượng  -->
                        <td>
                            <div class="numbers">
                                <input type="number" value="'.$value['quantity'].'" id="quantity_1" class="qty2" name="quantity_1"
                                    min="1" max="100">

                            </div>


                        </td>
                        <!-- tổng  -->
                        <td id="total">
                            '.number_format($value['total'], 0, '.', ',').'
                        </td>
                        
                    </tr>';


        $i += 1;

    }
}

function tongdonhang() {
    $Tongthanhtoan = 0;
    $tong = 0;

    foreach($_SESSION['cart'] as $value) {
        extract($value);
        $ttien = $value[3] * $value[5];
        $tong += $ttien;
        $Tongthanhtoan = $tong + 29000;
    }
    return $Tongthanhtoan;
}

function insert_bill($id_user, $name, $email, $address, $tel, $ngaydathang, $payment, $tongdonhang) {
    $sql = "insert into bill(id_user,name,email,address,tel,date,payment,total) values('$id_user','$name','$email','$address','$tel','$ngaydathang','$payment','$tongdonhang')";
    return pdo_execute_return_lastInsertID($sql);
}
function insert_cart($id_user, $product_id, $image, $quantity, $price, $name, $size, $total, $id_bill) {
    $sql = "insert into cart (id_user,product_id,image,quantity,price,name,size,total,id_bill)
     values('$id_user','$product_id','$image','$quantity','$price','$name','$size','$total','$id_bill')";
    return pdo_execute($sql);
}
function select__billByid($idbill) {
    $sql = "select * from bill where id_bill =".$idbill;
    $bill = pdo_query_one($sql);
    return $bill;
}
function select__billDetailByid($idbill) {
    $sql = "select * from cart where id_bill =".$idbill;
    $bill = pdo_query($sql);
    return $bill;
}
function select_All_billDetailByid($idbill) {
    $sql = "SELECT
    bill.id_bill,
    bill.id_user,
    bill.name,
    bill.tel,
    bill.email,
    bill.address,
    bill.date,
    bill.bill_startus,
    bill.total,
    cart.product_id,
    cart.image,
    cart.quantity,
    cart.price,
    cart.size,  
    product.product_name
  FROM bill
  INNER JOIN cart ON bill.id_bill = cart.id_bill
  INNER JOIN product 
    ON product.product_id = cart.product_id
  WHERE bill.id_bill =".$idbill;
    $bill = pdo_query($sql);
    return $bill;
}
// Hàm cập nhật tổng giá và lưu vào session
function updateTotalPriceAndSaveToSession() {
    $total = 0;

    // Duyệt qua từng sản phẩm trong giỏ hàng
    foreach($_SESSION['cart'] as $key => $value) {
        $quantity = $value[5];
        $price = $value[3];
        $total += $quantity * $price;
    }

    // Lưu tổng giá vào session
    $_SESSION['cart_total'] = $total;
}
function loadAll_bill($id_User, $start, $limit) {

    $sql = "select * from bill where 1";
    if($id_User > 0)
        $sql .= " and id_user = ".$id_User;

    $sql .= " order by id_bill desc";
    $sql .= " limit $start ,$limit";
    return pdo_query($sql);
}
function loadAll_bill_home($id_User) {

    $sql = "select * from bill where 1";
    if($id_User > 0)
        $sql .= " and id_user = ".$id_User;

    $sql .= " order by id_bill desc";
    $sql .= " limit 0,5";
    return pdo_query($sql);
}


function get_ttdh($l) {
    switch($l) {
        case '0':
            return "Đơn hàng mới ";

        case '1':
            return "Đang chờ xử lý";

        case '2':
            return "Đang giao hàng";

        case '3':
            return "Đã giao hàng";


        default:
            return "Hủy đơn";

    }

}
function update_bill($id_bill, $bill_startus) {
    $sql = "UPDATE bill SET bill_startus = $bill_startus WHERE id_bill = $id_bill";
    return pdo_execute($sql);
}
function get_pay($l) {
    switch($l) {
        case '1':
            $tt = "Thanh toán khi nhận hàng ";
            break;

        default:
            $tt = "Thanh toán khi nhận hàng";
            break;
    }
    return $tt;
}
function count_sl($id_bill) {
    $sql = "select * from cart where id_bill =".$id_bill;
    return sizeof(pdo_query($sql));
}
function count_Quanti($id_bill) {
    $sql = "select quantity from cart where id_bill =".$id_bill;
    return sizeof(pdo_query($sql));
}
function count_bill() {
    $sql = "SELECT COUNT(*) AS 'count'
    FROM bill";
    return pdo_query($sql);
}



?>