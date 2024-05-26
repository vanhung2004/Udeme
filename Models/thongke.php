<?php
function Sum_total_by() {
    $sql = "SELECT  YEAR(date) AS nam, MONTH(date) AS thang, WEEK(date) AS so_tuan, date AS ngay ,
    COUNT(*) AS so_hoa_don, 
    SUM(total) AS doanh_thu_theo_ngay FROM bill 
    GROUP BY nam, thang, so_tuan ,ngay;
    ORDER BY nam, thang, so_tuan, ngay;";
    return pdo_query($sql);
}
function Sum_total() {
    $sql = "SELECT  SUM(total) AS doanh_thu FROM bill ";

    return pdo_query($sql);
}
function Thong_ke_cate() {
    $sql = "SELECT categories.category_name, categories.category_id, COUNT(*) 'soluong', MIN(price) 'gia_min', MAX(price) 'gia_max', 
    AVG(price) 'gia_avg' FROM categories INNER JOIN product ON categories.category_id = product.category_id GROUP BY categories.category_id, categories.category_name ORDER BY COUNT(*) DESC";
    return pdo_query($sql);
}
function statistical($from,$to,$type='DATE'){
    // tạo ra 1 bảng dates
    $sql="WITH RECURSIVE dates AS (
      SELECT DATE('$from') AS date
      UNION ALL
      SELECT DATE_ADD(date, INTERVAL 1 DAY)
      FROM dates
      WHERE DATE_ADD(date, INTERVAL 1 DAY) <= '$to'
      
    )
    ";
    $sql.="SELECT $type(dates.date) AS date, COUNT(bill.id_bill) AS num_bil, SUM(cart.quantity * cart.price) AS revenue
    FROM dates
    LEFT JOIN bill ON DATE(bill.date) = DATE(dates.date)
    LEFT JOIN cart ON cart.id_bill=bill.id_bill
    GROUP BY $type(dates.date)";
    // echo $sql;
    return pdo_query($sql);
}
?>