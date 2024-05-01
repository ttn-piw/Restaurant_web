<?php
    $conn = connectdb();
    $select_users = $conn->prepare("SELECT * FROM users");
    $select_users->execute();
    if($select_users->rowCount() > 0){
        while($fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)){
            $user_id = $fetch_users['id'];
            $user_name = $fetch_users['name'];
            $user_email = $fetch_users['email'];
            $user_phone = $fetch_users['phone'];
            $user_password = $fetch_users['password'];
        }
    }
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];


        $conn = connectdb();
        $sql = "UPDATE users SET name = :name, email = :email, phone = :phone, password = :password, image = :image WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':image', $image_path); 
        $stmt->execute();

        header("Location: viewUser.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 500px;
            margin: 0 auto 0 300px;
        }
        .preview-image {
            max-width: 300px;
            margin-bottom: 10px;
        }
        .form-group .form-control-file {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3">
                        <h2>Update User</h2>
                        <form action="admin_index.php?act=update" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $user_name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $user_email; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $user_phone; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $user_password; ?>" required>
                            </div>
                           
                            <input type="hidden" name="id" value="<?php echo $user_id; ?>">

                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                            <a href="admin_index.php" class="btn btn-secondary ml-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    
</body>
</html>
