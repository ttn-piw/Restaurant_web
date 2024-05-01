<?php
  include 'php/connectdb.php';
  session_start();
  if(isset($_POST['submit'])&&($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE u_email = '$email' AND u_password = '$password'";
    $rs = $connect->query($sql);
    
    if ($rs->num_rows >0 ){
        while ( $row = $rs->fetch_assoc() ){
            $_SESSION['username'] = $row['u_name']; // Lưu user_id vào session
            header('location: hello.php');
        }
    } else {
        $message[] = 'Invalid email or password';
    }
}
    // $row = $select->fetch_assoc();

    // // $row = $select->fetch(PDO::FETCH_ASSOC);

    // if($select->rowCount() > 0) {
//         $_SESSION['username'] = $row['u_name']; // Lưu user_id vào session
//         header('location: hello.php');
//     } else {
//         $message[] = 'Invalid email or password';
//     }
//   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/5a29f06e53.js" crossorigin="anonymous"></script>
    <style>
      body {
        background-color: #c9d6ff;
        background:linear-gradient(to right, #e2e2e2,  #c9d6ff);
      }
      .form-container {
        width: 500px;
        margin: 0 auto;
        margin-top: 100px;
        padding: 20px;
        background: #eee;
        border-radius: 5px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      }
      .form-container form {
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0,0,0,.1);
        background: #fff;
        text-align: center;
      }
      .form-container form h3 {
        font-size: 20px;
        color: black;
        text-transform: uppercase;
        margin-bottom: 1rem;
      }
      .form-container form input {
        color: inherit;
        width: 100%;
        padding: 10px 0;
        padding-left: 2.5rem;
        padding-right: 0rem;
        margin: 8px 0;
        border: none;
        background-color:transparent;
        border-bottom: 1px solid #757575;
      }
      .form-container form .input-group {
        position: relative;
        padding: 1% 5px;
        padding-right: 40px;
        margin-bottom: 1rem;
      }
      .form-container .input-group i{
        position: absolute;
        color:  #757575;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
      }
      .form-container form.input-group input:focus {
        background-color: transparent;
        outline: transparent;
        border-bottom: 2px solid hsl(327,90%,28%);
      }
      .form-container form.input-group input:placehoder {
        color: transparent;
      }
      .form-container form p {
        font-size: 14px;
        color: #777;
        margin-bottom: 0;
        margin-top: 10px;
      }
      .form-container p a {
        color: #007bff;
        text-decoration: none;
      }
      .form-container p a:hover {
        color: #0056b3;
        text-decoration: underline;
      }
      .form-container .submit {
        width: 100%;
        background: rgb(125,125,235);
        color: white;
        text-transform: capitalize;
        font-size: 20px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: 0.9s;
      }
      .form-container .submit:hover {
        background: #crimson;
        color: #fff;
      }
    </style>
  </head>
  <body>
    <div class="form-container">
      <form action="" method="POST">
        <h3>Login</h3>
        <?php
        if(isset($message)) {
          foreach($message as $msg) {
            echo '<span class="msg">'.$msg.'</span>';
          }
        }
        
        ?>
        <div class=input-group>
          <i class="fa-solid fa-envelope"></i>
          <input
            type="email"
            class="form-control"
            id="exampleInputEmail"
            name="email"
            required placeholder="Enter your email"
          />
        </div>

        <div class=input-group>
          <i class="fa-solid fa-lock"></i>
          <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            required placeholder="Enter your password"
          />
        </div>
        <input
          type="submit"
          value="Login now"
          name="submit"
          class="submit"
        />
        <p>Don't have an account? <a href="signup.php">Register now</a></p>
      </form>
    </div>
    
</body>
</html>

  </body>
</html>
