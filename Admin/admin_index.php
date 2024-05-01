<?php
    include 'admin_function.php';
    include 'admin_sidebar.php';

    if(isset($_GET['act'])) {
        switch($_GET['act']) {
            case 'update':
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $resultone = getOneUser($id);
                    $result = showAllUsers();
                    include 'editUser.php';
                }
                if(isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $password = $_POST['password'];
                    updateUser($id, $name, $email, $phone, $password);
                    header("Location: admin_index.php");
                    exit();
                }
                break;
            case 'delete':
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    deleteUser($id);
                }
                $result = showAllUsers();
                include 'viewUser.php';
                break;
            default:
                include 'viewUser.php';
                break;
        }
    } else {
        include 'viewUser.php';
    }

?>