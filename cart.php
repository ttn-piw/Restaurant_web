<?php
    include('php/connectdb.php');
    session_start();
    $_SESSION['total_money'] = 0;
    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

    if(isset($_POST['submit'])){
        $pid = $_POST['pid'];
        $sql = "SELECT * FROM products WHERE pid = '$pid'";
        $rs = $connect->query($sql);

        if ($rs->num_rows > 0){
            while($row_data = $rs->fetch_assoc()){
                $p_name = $row_data['p_name'];
                $p_image = $row_data['p_image'];
                $p_price = $row_data['p_price'];
                $p_remain = $row_data['p_remain'];
                $p_quantity = 1;

                $exist = 0;
                for ($i=0; $i < sizeof($_SESSION['cart']) ; $i++){
                    if ($_SESSION['cart'][$i][0] == $p_name){
                        $exist = 1;
                        if ($_SESSION['cart'][$i][4] + $p_quantity < $p_remain){
                            $new_quantity = $_SESSION['cart'][$i][4] + $p_quantity;
                            $_SESSION['cart'][$i][4] = $new_quantity;
                        } else {
                            $_SESSION['cart'][$i][4] = $p_remain;
                        }
                    }
                }
                if ($exist == 0) {
                    $food=[$p_name,$p_image,$p_price,$p_remain,$p_quantity,$pid];
                    $_SESSION['cart'][] = $food;
                }
            }
        }
    } else echo "Khong co";

    if (isset($_POST['del_pro'])){
        $index =  $_POST['del_pro'];   
        deletefood($index);
    }
    function deletefood($index){
        if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart']  = array_values($_SESSION['cart']);
        }
    }

    // + - product
    if(isset($_POST['action'])){
        $action = $_POST['action'];
        $index = $_POST['product_index'];

        if($action === 'plus' && $_SESSION['cart'][$index][4] < $_SESSION['cart'][$index][3] )
            $_SESSION['cart'][$index][4]++;
        elseif($action === 'minus'){
            if($_SESSION['cart'][$index][4] > 1)
            $_SESSION['cart'][$index][4]--;
        }
    }
    

?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="content">
        <div class="table-left">
            <table>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Xóa</th>
                </tr>
                <tr>
                <?php 
                    for($i=0 ; $i<sizeof($_SESSION['cart']);$i++){
                ?>
                    <td><?php echo $_SESSION['cart'][$i][0] ?></td>
                    <td><img src="<?php echo $_SESSION['cart'][$i][1] ?>"></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="product_index" value="<?php echo$i; ?>">
                            <button class="minus_pro" name="action" value="minus">-</button>
                            <input type="number" name="quantity" class="quantity" value="<?php echo $_SESSION['cart'][$i][4]; ?>" min="0" max="<?php echo $_SESSION['cart'][$i][3] ;?>">
                            <button class="plus_pro" name="action" value="plus">+</button>
                        </form>
                    </td>
                    <td><?php echo $_SESSION['cart'][$i][2] * $_SESSION['cart'][$i][4] ?><sub> vnđ</sub></td>
                    <td>
                    <form method="post">
                        <button id="del_pro" name="del_pro" value="<?php echo $i ?>">X</button>
                        <input type="hidden" name="del_pid" value="<?php echo $_SESSION['cart'][$i][5] ?>">
                    </form>
                    </td>
                </tr>
            <?php } ?>
            </table>
            <button id="back_menu"><a href="hello.php">TIẾP TỤC MUA SẮM</a><button>
        </div>
        <div class="content-right">
            <form action="payment.php" method="post">
                <div class="total_money">
                    Tổng tiền: 
                    <span>
                    <?php 
                        for($i=0 ; $i<sizeof($_SESSION['cart']);$i++){
                            $_SESSION['total_money'] = $_SESSION['total_money'] + ($_SESSION['cart'][$i][2] * $_SESSION['cart'][$i][4]) ; 
                        }
                        echo $_SESSION['total_money'];
                    ?>
                        <sub> vnđ</sub>
                    </span>
                </div>
                <div class="shipping_info">
                    <h2>Thông tin giao hàng</h2>    
                    <div class="text_input">
                        <label for="Name"><i class="fa-solid fa-user"></i>
                            <input type="text" name="cart_name" id="cus_name" placeholder="Họ và tên" required>
                        </label>
                    </div>
                    <div class="text_input">
                        <label for="email"><i class="fa-solid fa-envelope"></i>
                            <input type="text" name="cart_email" id="email" placeholder="Email" required>
                        </label>
                    </div>
                    <div class="text_input">
                        <label for="address"><i class="fa-solid fa-location-dot"></i>
                            <input type="text" name="cart_address" id="address" placeholder="Địa chỉ giao hàng:" required>
                        </label>
                    </div>
                </div>
                <a href = "payment.php">
                    <button name="submit">Thanh toán</button>
                </a>
            </form>
        </div>
    </div>
</body>
</html>