<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserView</title>
    <link rel="stylesheet" href="../Admin/css/view.css">
</head>
<body>
<div class="big-table">
    <h2>Customers</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Password</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conn = connectdb();
                $select_users = $conn->prepare("SELECT * FROM users");
                $select_users->execute();
                if($select_users->rowCount() > 0){
                    while($fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td><?= $fetch_users['id']; ?></td>
                <td><?= $fetch_users['name']; ?></td>
                <td><?= $fetch_users['email']; ?></td>
                <td><?= $fetch_users['phone']; ?></td>
                <td><?= $fetch_users['password']; ?></td>
                <td>
                    <a href="admin_index.php?act=update&id=<?= $fetch_users['id']; ?>" class="edit-btn">Edit</a>
                    <a href="admin_index.php?act=delete&id=<?= $fetch_users['id']; ?>" onclick="return confirm('Are you sure to delete this user?')" class="delete-btn">Delete</a>
                </td>
            </tr>
            <?php
                    }
                }
                else {
            ?>
            <tr>
                <td colspan="5">No users found</td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    
</div>
</body>
</html>
