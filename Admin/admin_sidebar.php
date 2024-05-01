<?php
  include '../connectdb.php';
  session_start();
  $conn = connectdb();
  $select_admin = $conn->prepare("SELECT * FROM admin");
  $select_admin->execute();
  if($select_admin->rowCount() > 0){
    while($fetch_admin = $select_admin->fetch(PDO::FETCH_ASSOC)){
      $admin_id = $fetch_admin['admin_id'];
      $admin_name = $fetch_admin['admin_name'];
      $admin_email = $fetch_admin['admin_email'];
      $admin_password = $fetch_admin['admin_password'];
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
    src="https://kit.fontawesome.com/5a29f06e53.js"
    crossorigin="anonymous"
  ></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/admin_styles.css">
  </head>
  <body>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="side-header">
        <h5 style="margin-top:10px;">Hello, <span><?= $admin_name;?></span></h5>
      </div>
      <div class="side-menu">
        <a href="#"><i class="fa-solid fa-house"></i>Home</a>
        <a href="admin_index.php"><i class="fa-solid fa-users"></i>Customers</a>
        <a href="#"><i class="fa fa-th-large"></i></i>Products</a>
        <a href="#"><i class="fa-solid fa-box"></i>Orders</a>
      </div>
      <div class="logout-btn">
            <a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
      </div>
    </div>
    
  </body>
</html>
