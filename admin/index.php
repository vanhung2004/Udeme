<?php
ob_start();
session_start();
require "home/header.php";
require "../Models/connect.php";
require "../Models/danhmuc.php";
require "../Models/account.php";
require "../Models/sanpham.php";
require "../Models/binhluan.php";
require "../Models/cart.php";
require "../Models/thongke.php";


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

        case 'home':
            $Sum_total = Sum_total();
            $count_bill = count_bill();
            $count_account = count_account();
            $loadAll_bill_home = loadAll_bill_home(0);
            include "home/home.php";
            break;



        // Danh mục
        case 'listdm':
            if (isset($_POST['search']) && ($_POST['search'])) {
                $sea = $_POST['sea'];
            } else {
                $sea = '';
            }
            $sellect_categories = sellect_all_categories();
            include "Danhmuc/list.php";
            break;

        // add dm 
        case "createdm":
            if (isset($_POST['submitdm']) && $_POST['submitdm']) {
                $category_name = $_POST['category_name'];
                insert_categories($category_name);
                $Notification = "Thêm Thành Công";
            }
            include "Danhmuc/create.php";
            break;

        // update dm 
        case 'editdm':
            if (isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) {

                $one_categories = sellect_one_categories($_GET['id_cate']);
            }
            include "Danhmuc/update.php";
            break;

        case 'updatedm':
            if (isset($_POST['updatedm']) && $_POST['updatedm']) {
                $category_id = $_POST['category_id'];
                $category_name = $_POST['category_name'];
                update_categories($category_id, $category_name);
                $Notification = "Cập Nhật Thành Công";
            }
            $sellect_categories = sellect_all_categories();
            header('location: index.php?act=listdm');
            break;


        // delete dm 
        case 'deletedm':
            if (isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) {
                $id_category = $_GET['id_cate'];

                delete_categories($id_category);
            }
            $sellect_categories = sellect_all_categories();
            header('location: index.php?act=listdm');
            break;


        // Sản phẩm 
        case 'listsp':
            if (isset($_POST['locsp']) && ($_POST['locsp'])) {
                $search = $_POST['search'];
                $category_id = $_POST['category_id'];
            } else {
                $search = '';
                $category_id = 0;
            }

            $sellect_one_categories = sellect_one_categories($category_id);

            $limit = 10;
            $page = $_GET['page'] ?? 1;
            $start = ($page - 1) * $limit;
            $countsp = count(loadall_sanpham($search, $category_id, 0, 999999999));
            $listsanpham = loadall_sanpham($search, $category_id, $start, $limit);

            $sellect_categories = sellect_all_categories();


            include "Sanpham/list.php";
            break;

        // add sp 
        case "createsp":

            require 'imageArray.php';
            // kiểm tra xem người dùng có click vào nút add hay ko
            if (isset($_POST['submitsp']) && ($_POST['submitsp'])) {

                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $category_id = $_POST['category_id'];
                $size = $_POST['size'];
                $quantity = $_POST['quantity'];

                insert_sanpham($product_name, uploadImages(), $price, $description, $category_id, $size, $quantity);

            }

            $sellect_categories = sellect_all_categories();
            include "Sanpham/create.php";
            break;

        //xoa sp
        case 'deletesp':
            if (isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)) {
                delete_sanpham($_GET['id_sp']);
            }
            header('location: index.php?act=listsp');
            break;

        // edit sp 
        case 'editsp':

            if (isset($_GET['id_sp']) && ($_GET['id_sp'] > 0)) {
                $id_sp = $_GET['id_sp'];

                $sanpham = loadone_sanpham($id_sp);
                $load_all_pro_detail = load_all_pro_detail($_GET['id_sp']);

            }
            $sellect_categories = sellect_all_categories();

            include "Sanpham/update.php";
            break;
        // update sp 
        case 'updatesp':
            if (isset($_POST['updatesp']) && $_POST['updatesp']) {
                $product_id = $_POST['product_id'];
                $category_id = $_POST['category_id'];
                $price = $_POST['price'];
                $product_name = $_POST['product_name'];
                $description = $_POST['description'];
                $size = $_POST['size'];
                $quantity = $_POST['quantity'];

                if (isset($_FILES['image']['name']))

                    if ($_FILES['image']['name'] == "") {
                        $imgUpdate = explode(',', $_POST['img']);
                    } else {
                        $imgUpdate = array_merge($_FILES['image']['name'], explode(',', $_POST['img']));
                        $imgUpdate = implode(',', $imgUpdate);
                    }
                update_sanpham($product_id, $product_name, $imgUpdate, $price, $description, $category_id, $size, $quantity);
                $Notification = "Sửa thành công";
            }
            $limit = 5;
            $page = $_GET['page'] ?? 1;
            $start = ($page - 1) * $limit;
            $countsp = count(loadall_sanpham('', 0, 0, 999999999));
            $listsanpham = loadall_sanpham('', 0, $start, $limit);

            $sellect_categories = sellect_all_categories();

            include "Sanpham/list.php";
            break;

        // Bình Luận
        case 'listbinhluan':
            $limit = 5;
            $page = $_GET['page'] ?? 1;
            $start = ($page - 1) * $limit;
            $countsp = count(load__all__binhluanadmin(0, 999999999));
            $liastBinhluan = load__all__binhluanadmin($start, $limit);
            include "Binhluan/list.php";
            break;

        // xóa bl 
        case 'deletebl':
            if (isset($_GET['id_khachhang']) && ($_GET['id_khachhang'] > 0)) {
                $idkhachhang = $_GET['id_khachhang'];
            } else {
                $idkhachhang = "";
            }
            delete_binhluan($idkhachhang);
            header('Location:' . $_SERVER['HTTP_REFERER']);
            // include "Binhluan/delete.php";
            break;



        // Khách Hàng 
        case 'listkhachhang':
            $listkhachhang = listAccount();
            include "Khachhang/list.php";
            break;

        // xóa kh 
        case 'deletekh':
            if (isset($_GET['id_khachhang']) && ($_GET['id_khachhang'] > 0)) {
                $idkhachhang = $_GET['id_khachhang'];
            } else {

            }
            deleteAccount($idkhachhang);
            header('Location: index.php?act=listkhachhang');

            break;


        // Quản lí Đơn Hàng
        case 'listdonhang':
            $limit = 5;
            $page = $_GET['page'] ?? 1;
            $start = ($page - 1) * $limit;
            $countDh = count(loadAll_bill(0, 0, 999999999));
            $loadAll_bill = loadAll_bill(0, $start, $limit);

            include "Qldonhang/list.php";
            break;

        // edit dơn hàng (đổ dữ liệu ra trong form)
        case 'editdh':
            if (isset($_GET['id_dh']) && ($_GET['id_dh'] > 0)) {
                $id_dh = $_GET['id_dh'];
            }
            $select__billByid = select__billByid($id_dh);
            include "Qldonhang/edit.php";
            break;

        // cập nhật đơn hàng
        case 'updatedh':
            if (isset($_POST['updatedh']) && $_POST['updatedh']) {
                $id_bill = $_POST['id_bill'];

                $ttdh = $_POST['status'];
                $update_bill = update_bill($id_bill, $ttdh);
                $Notification = "Cập Nhật Thành Công";
                header('location: index.php?act=listdonhang');
            }

            break;

        // xóa đơn hàng 
        // case 'deletedh':
        //     if(isset($_GET['id_dh']) && ($_GET['id_dh'] > 0)) {
        //         $id_dh = $_GET['id_dh'];
        //     }
        //     $delete_bill = del_bill($id_dh);
        //     header('Location: index.php?act=listdonhang');

        //     break;

        // dh chi tiết
        case 'order_detail':
            $select_All_billDetailByid = select_All_billDetailByid($_GET['id_bill']);
            include "Qldonhang/donhangchitiet.php";
            break;

        // Thống Kê
        case 'listthongke':
            $date = [];
            $doanhthu = [];
            $luotmua = [];
            $data = [];
            $statistical = statistical('2023-12-1', '2023-12-31');
            if (isset($_POST['loc'])) {
                $statistical = statistical($_POST['from'], $_POST['to']);

            }
            foreach ($statistical as $key => $value) {
                if ($value['revenue'] == null) {
                    $statistical[$key]['revenue'] = 0;
                }

            }
            $date = array_column($statistical, 'date');
            $doanhthu = array_column($statistical, 'revenue');
            $luotmua = array_column($statistical, 'num_bil');

            $data['date'] = $date;
            $data['doanhthu'] = $doanhthu;
            $data['luotmua'] = $luotmua;

            $data = json_encode($data);
            // echo "<pre>";
            // print_r($data);

            // $Sum_total_by = Sum_total_by();
            include "Thongke/thongkedoanhthu.php";
            break;

        //  Biểu đồ 
        case 'bieudo':
            $Thong_ke_cate = Thong_ke_cate();

            include "Thongke/bieudo.php";
            break;
        case 'thongkedm':
            $Thong_ke_cate = Thong_ke_cate();

            include "Thongke/thongkedm.php";
            break;



        default:
            include "home/home.php";
            break;
    }
} else {
    header("location:index.php?act=home");
}
// FOOTER
include "home/footer.php";
?>