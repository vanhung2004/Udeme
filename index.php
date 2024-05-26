<?php
ob_start();
session_start();

require "Models/connect.php";

if (!isset($_SESSION['cart']))
    $_SESSION['cart'] = [];

require "Models/danhmuc.php";
require "Models/sanpham.php";
require "Models/binhluan.php";
require "Models/cart.php";
require "Models/account.php";
$userID = $_SESSION['user_id'] ?? 0;
$user = select__userByid($userID);


$loadall_sanpham = loadall_sanpham_home();
$sellect_categories = sellect_all_categories();
$sp_banchay = sp_banchay();

require "View/Home/header.php";
if (isset($_GET['act']) && ($_GET['act']) != "") {
    $act = $_GET['act'];
    switch ($act) {
        // chi tiết sp 

        case "chitietsp":

            if (isset($_GET['idct_sp']) && ($_GET['idct_sp'] > 0)) {
                $product_id = $_GET['idct_sp'];

                $chitietsp = loadone_sanpham($product_id);
                extract($chitietsp);

                $sp_cung_loai = select_sp_cungloai($product_id, $category_id);
                $load_all_binhluan = loadall__comment__Byid($product_id);
                $loadall_pro_detail = get_product_details($product_id);

                include "View/Sanpham/spchitiet.php";
            } else {
                $product_id = "";
            }

            if (isset($_POST['guibinhluan'])) {
                $productId = $_POST["product_id"];
                $noidung = $_POST['noidung'];
                insert__comment($userID, $productId, $noidung);
                header('Location:' . $_SERVER['HTTP_REFERER']);
            }


            break;
        case "sanpham":
            if (isset($_POST['key']) && ($_POST['key'] != "")) {
                $key = $_POST['key'];
            } else {
                $key = "";
            }
            if (isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) {
                $idcate = $_GET['id_cate'];

            } else {
                $idcate = 0;
            }
            $limit = 8;
            $page = $_GET['page'] ?? 1;
            $start = ($page - 1) * $limit;
            $dssp = loadall_sanpham($key, $idcate, $start, $limit);
            $countsp = count(loadall_sanpham($key, $idcate, 0, 999999999));

            $tendm = load_ten_dm($idcate);

            include "View/Sanpham/product-all.php";
            break;


        // đăng nhập đăng kí 
        case "account":
            // Đăng ký
            if (isset($_POST['signup'])) {
                // $emailCheck = check__taikhoan($email, '');
                // if($emailCheck) {
                //     $_SESSION['user_id']['email'] = $emailCheck;
                //     $err = "Email đã tồn tại!";
                // }
                $email = $_POST['email'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];

                dangky($name, $email, $password, $phone, $address, 0);
                echo "<script>alert('Đăng ký thành công!')</script>";
            }

            // Đăng nhập
            $err = "";

            if (isset($_POST['login'])) {
                $email = $_POST['emailLogin'];
                $password = $_POST['passwordLogin'];
                $check = true;

                $checkTaikhoan = check__taikhoan($email, $password);

                if ($checkTaikhoan) {
                    $_SESSION['user_id'] = $checkTaikhoan['user_id'];
                    // die();
                    header('Location: index.php');
                    die;
                } else {
                    $err = "Tài khoản hoặc mật khẩu không đúng";
                    $check = false;
                }

            }


            include "View/Account/account.php";
            break;
        case "logout":
            logout();
            break;
        case "forgot":
            if (isset($_POST['forgot_password'])) {
                $email = $_POST['email_forgot'];
                $check_email = check_email($email);

                if (is_array($check_email)) {
                    $error_message = "Mật khẩu của bạn là: " . $check_email['password'];
                    // header('location: index.php');
                 
                } else {
                    $error_message = "Email không tồn tại";
                    
                   
                }
            } else {
                
            }


            include "View/Account/forgot.php";
            break;
        case "user":
            if (!$user) {
                header("location:index.php?act=account");
                die;
            }

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                updateAccount($_POST['name'], $_POST['email'], $_POST['password'], $_POST['phone'], $_POST['address'], $userID);
                echo "<script>alert('Bạn đã đổi thông tin thành công')</script>";
            }
            $load__thontin = select__userByid($userID);
            include "View/Account/userAccount.php";
            break;



        case "viewCart":

            include "View/Giohang/cart.php";
            break;


        // giỏ hàng 
        case 'addtocart':
            if (isset($_POST['addcart']) && ($_POST['addcart'])) {

                $product_id = $_POST['product_id'];
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                // nếu có thêm từ trang chủ thì size sẽ để trống 
                // nếu có tồn tại size (thêm từ trang chi tiết)thì sẽ hiển thị size ng dùng thêm 
                if (isset($_POST['selected_size']) && ($_POST['selected_size'] != "")) {
                    $size = $_POST['selected_size'];
                } else {
                    $size = "S";
                }
                // nếu có thêm từ trang chủ thì sl sẽ để trống 
                // nếu có tồn tại sl (thêm từ trang chi tiết)thì sẽ hiển thị sl ng dùng thêm 
                if (isset($_POST['selected_quantity']) && ($_POST['selected_quantity'] > 0)) {
                    $quantity = $_POST['selected_quantity'];
                } else {
                    $quantity = 1;
                }

                // validate số lượng 
                if ($result) {
                    $row = $result[0];
                    $totalQuantityInDatabase = $row['totalQuantity'];

                    // Kiểm tra số lượng nhập vào
                    if ($selected_quantity > $totalQuantityInDatabase) {
                        echo json_encode(['error' => 'Không đủ số lượng trong kho.']);
                    } else {
                        echo json_encode(['success' => 'Số lượng hợp lệ.']);
                    }


                } else {
                    echo json_encode(['error' => 'Đã có lỗi xảy ra trong quá trình truy vấn.']);
                }



                $image = $_POST['img'];

                $fg = 0;
                $i = 0;
                // check sp trùng nếu có thì +sl 
                foreach ($_SESSION['cart'] as $key => $value):
                    if ($value[0] == $product_id && $value[4] == $size) {
                        $newQuantity = $value[5] + $quantity;
                        $_SESSION['cart'][$i][5] = $newQuantity;
                        $fg = 1;
                        break;
                    }
                    $i++;
                endforeach;

                if ($fg == 0) {
                    $addToCart = [$product_id, $product_name, $image, $price, $size, $quantity];
                    $_SESSION['cart'][] = $addToCart;
                }

                header('Location: index.php?act=viewCart');
            }

            break;




        case 'submit':
            if (isset($_POST['capnhatcart'])) {
                foreach ($_POST['quantity'] as $key => $value) {
                    $_SESSION['cart'][$key][5] = $value;
                }
                // header('Location: index.php?act=viewCart');
            }
            // echo "<pre>";
            // print_r($_POST);
            include "View/Giohang/cart.php";
            break;





        // tất cả sản phẩm
        case 'deleteCart':
            // nếu tồn tại $idcate và đc click thì sẽ xóa 1 sp trong giỏ 
            if (isset($_GET['idCart']) && ($_GET['idCart'] > 0)) {
                if (isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0))
                    array_splice($_SESSION['cart'], $_GET['idCart'], 1);
                // ngược lại sẽ xóa cả giỏ hàng 
            } else {
                if (isset($_SESSION['cart']))
                    unset($_SESSION['cart']);
            }
            // nếu có session['cart'] thì ở lại trang giỏ hàng 
            if (isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
                header('Location: index.php?act=viewCart');
                // nếu k có session cart thì trở về trang chủ
            } else {
                header('Location: index.php');
            }
            break;
        case 'checkout':
            include "View/Checkout/checkout.php";
            break;
        case 'bill':
            // tạo bill 
            if (isset($_POST['bill_Comfirm'])) {
                $id_user = $_SESSION['user_id'];

                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $payment = 1;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngaydathang = date('Y-m-d  H:i:s');
                $tongdonhang = tongdonhang();

                $idbill = insert_bill($id_user, $name, $email, $address, $tel, $ngaydathang, $payment, $tongdonhang);


                //    insert into cart : session['cart']& $idbill 
                foreach ($_SESSION['cart'] as $key => $value) {
                    insert_cart($_SESSION['user_id'], $value[0], $value[2], $value[5], $value[3], $value[1], $value[4], $tongdonhang, $idbill);
                }
                // xóa ss
                $_SESSION['cart'] = [];


            }
            $bill = select__billByid($idbill);

            $bill_detail = select__billDetailByid($idbill);
            include "View/Checkout/comfirm.php";
            break;

        case 'my_orders':

            $loadAll_bill = loadAll_bill($_SESSION['user_id'] ?? '', 0, 999999999);
            include "View/my_order/my_orders.php";
            break;


        case 'lienhe':
            include "View/contact/contact.php";
            break;
        case 'help':
            include "View/help/help.php";
            break;

        default:
            include "View/Home/home.php";
            break;
    }
} else {
    include "View/Home/home.php";
}
include "View/Home/footer.php";

?>