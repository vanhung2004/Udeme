<?php
    function insert__comment($userId,$productId,$content) {
        $sql = "INSERT INTO `comments`(`user_id`, `product_id`, `content`) 
                VALUES 
                ('$userId','$productId','$content')";
        pdo_execute($sql);
    }

    function loadall__comment__Byid($idproduct) {
        $sql = "SELECT
                    comments.comment_id,
                    comments.user_id,
                    comments.product_id,
                    comments.content,
                    comments.date_comment,
                    users.user_id,
                    users.user_name
                FROM
                    comments
                INNER JOIN
                    users ON comments.user_id = users.user_id
                INNER JOIN
                    product ON comments.product_id = product.product_id
                WHERE
                    product.product_id = $idproduct
        ";
        return pdo_query($sql);
    }

    function load__all__binhluanadmin($start, $limit) {
        $sql = "SELECT * FROM comments WHERE 1 ORDER BY comment_id DESC limit $start,$limit";
        return pdo_query($sql);
    }

    function delete_binhluan($id) {
        $sql = "DELETE FROM comments WHERE comment_id = '$id'";
        pdo_execute($sql);
    }

?>