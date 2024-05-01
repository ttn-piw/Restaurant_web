<?php
    function showAllUsers() {
        $sql = "SELECT * FROM users";
        $conn = connectdb();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $select_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $select_users;
    }

    function getOneUser($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $conn = connectdb();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $get_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $get_user;
    }

    function updateUser($id, $name, $email, $phone, $password) {
        $conn = connectdb();
        $sql = "UPDATE users SET name = :name, email = :email, phone = :phone, password = :password WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }


    function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = '$id'";
        $conn = connectdb();
        $conn->exec($sql);
    }
?>