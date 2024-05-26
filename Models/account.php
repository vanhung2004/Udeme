<?php
    function listAccount() {
        $sql = "SELECT * FROM users WHERE 1 ORDER BY user_id DESC";
        return pdo_query($sql);
    }
    function dangky($username,$email,$password,$tel,$address,$role) {
        $sql = "INSERT INTO `users`(`user_name`, `email`, `password`, `tel`, `address`, `role`) 
                VALUES 
        (?, ?, ?, ?, ?, ?)";
        pdo_execute($sql,$username,$email,$password,$tel,$address,$role);
    }

    function check__taikhoan($email,$password) {
        $sql = "SELECT * FROM users WHERE email = ? AND password = ? ";
        return pdo_query_one($sql,$email,$password);
    }
    function check_email($email) {
        $sql = "SELECT * FROM users WHERE email=?";
        return pdo_query_one($sql, $email);
    }
    function check__taikhoan_admin($email,$password) {
        $sql = "SELECT * FROM users WHERE email = ? AND password = ? AND role =1";
        return pdo_query_one($sql,$email,$password);
    }
    
    function select__userByid($id) {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $result = pdo_query_one($sql,$id);
        return $result;
    }

    function logout() {
        unset($_SESSION['user_id']);
        header('Location: index.php');
    }

    function updateAccount($user_name,$email,$password,$tel,$address,$user_id) {
        $sql = "UPDATE users SET user_name = ?, email = ?, password = ?, tel = ?, address = ? WHERE user_id = ?";
        pdo_execute($sql,$user_name,$email,$password,$tel,$address,$user_id);
    }

    function deleteAccount($id) {
        $sql = "DELETE FROM users WHERE user_id = '$id'";
        pdo_execute($sql);
    }
    function count_account() {
        $sql = "SELECT COUNT(*) AS 'count'
        FROM users";
        return pdo_query($sql);
    }
    
?>
