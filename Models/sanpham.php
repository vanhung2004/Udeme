<?php
// include_once "connect.php";
function insert_sanpham($product_name, $image, $price, $description, $category_id, $size, $quantity) {

    // Thêm sản phẩm vào bảng products
    $sqlProduct = "INSERT INTO product (product_name, image, price, description, category_id) VALUES (?, ?, ?, ?, ?)";
    $productId = pdo_execute_return_lastInsertID($sqlProduct, $product_name, $image, $price, $description, $category_id);

    // Thêm biến thể cho mỗi size vào bảng product_variants
    $sqlVariant = "INSERT INTO product_detail (product_id, size, quantity) VALUES (?, ?, ?)";

    foreach($size as $index => $sizes) {

        pdo_execute_return_lastInsertID($sqlVariant, $productId, $size[$index], $quantity[$index]);
    }


}

function loadall_sanpham($search = "", $category_id = 0, $start, $limit = 0) {
    $sql = "SELECT product.*, categories.category_name 
            FROM product 
            LEFT JOIN categories ON product.category_id = categories.category_id 
            WHERE 1 ";

    if($search != "") {
        $sql .= " AND product.product_name LIKE '%" . $search . "%'";
    }

    if($category_id > 0) {
        $sql .= " AND product.category_id = '" . $category_id . "'";
    }

    $sql .= " ORDER BY product.product_id DESC ";
    $sql .= " LIMIT $start, $limit";

    return pdo_query($sql);
}


function load_all_pro_detail($product_id) {

    $sql = "SELECT * FROM product_detail WHERE product_id = $product_id";

    return pdo_query($sql);
}

function delete_sanpham($product_id) {

    $sql = "DELETE FROM comments WHERE product_id = ?";
    pdo_execute($sql, $product_id);
    // Xóa bản ghi từ bảng product_detail
    $sqlDeleteProductDetail = "DELETE FROM product_detail WHERE product_id = ?";
    pdo_execute($sqlDeleteProductDetail, $product_id);

    // Xóa bản ghi từ bảng product
    $sqlDeleteProduct = "DELETE FROM product WHERE product_id = ?";
    pdo_execute($sqlDeleteProduct, $product_id);

}



function load_ten_dm($category_id) {
    if($category_id > 0) {
        $sql = "SELECT * FROM categories WHERE category_id =".$category_id;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $category_id;
    } else {
        return "";
    }

}
function loadone_sanpham($product_id) {
    $sql = "select * from product where product_id=".$product_id;
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}

function loadall_sanpham_home() {
    $sql = "select * from product order by product_id desc limit 0,8";
    return pdo_query($sql);
}

function select_sp_cungloai($product_id, $category_id) {
    $sql = "select * from product where category_id=".$category_id." AND product_id <>".$product_id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}


function update_sanpham($product_id, $product_name, $image, $price, $description, $category_id, $size, $quantity) {
    // Cập nhật thông tin chung của sản phẩm trong bảng products
    $sqlProduct = "UPDATE product 
                    SET product_name = ?, 
                        image = ?, 
                        price = ?, 
                        description = ?, 
                        category_id = ? 
                    WHERE product_id = ?";

    pdo_execute($sqlProduct, $product_name, $image, $price, $description, $category_id, $product_id);

    // Xóa các biến thể hiện tại của sản phẩm trong bảng product_detail
    $sqlDeleteVariants = "DELETE FROM product_detail WHERE product_id = ?";
    pdo_execute($sqlDeleteVariants, $product_id);

    // Thêm lại biến thể mới cho mỗi size vào bảng product_detail
    $sqlInsertVariant = "INSERT INTO product_detail (product_id, size, quantity) VALUES (?, ?, ?)";

    foreach($size as $index => $sizes) {
        pdo_execute($sqlInsertVariant, $product_id, $size[$index], $quantity[$index]);
    }
}


function get_product_details($product_id) {
    $sql = "SELECT size, quantity FROM product_detail WHERE product_id = ?";
    return pdo_query($sql, $product_id);
}

// function getQuantity($productId, $size) {
//     // Kết nối với cơ sở dữ liệu
//     require_once('connect.php');

//     // Lấy số lượng cho kích cỡ và sản phẩm đã chọn
//     $quantity = pdo_query_one("SELECT quantity FROM product_details WHERE product_id = :product_id AND size = :size", $productId, $size);

//     // Trả về số lượng
//     return $quantity;
// }

// Hàm xử lý sự kiện thay đổi kích cỡ

// function maxQtt($product_id) {
//     $sql = "SELECT
//     size,
//     SUM(quantity) AS total_quantity
//   FROM
//     product_detail
//   WHERE
//     product_id = ?
//   GROUP BY
//     size;";
//     return pdo_query_one($sql, $product_id);
// }
function sp_banchay() {
    $sql = " SELECT SUM(cart.quantity) as soluong , product.product_name, product.image, product.price, product.product_id  FROM cart join product on cart.product_id = product.product_id 
    GROUP by product.product_id  ORDER by soluong DESC;";
    return pdo_query($sql);

}


?>