<?php
    include('php/connectdb.php');
    session_start();
    
    if(isset($_SESSION['username'])){
        $sql_take_uid = "SELECT * FROM users WHERE u_name='".$_SESSION['username']."'";
        
        $rs_uid = $connect->query($sql_take_uid);
        $row_uid = $rs_uid->fetch_assoc();
        $uid = $row_uid['uid'];
    } else {
        echo "Dont have username";
    }

    if(isset($_POST['submit']) && isset($_SESSION['username']) ){
        $date = date("Y-m-d");
        $c_name = $_POST['cart_name'];
        $c_mail = $_POST['cart_email'];
        $c_address = $_POST['cart_address'];
        $total_money = $_SESSION['total_money'];

        $sql_insert_to_oder = "INSERT INTO orders(user_id,total_price,placed_on,payment_status)
                                VALUES('$uid','$total_money','$date','ORDERED')";
        $rs_order = $connect->query($sql_insert_to_oder);
        
        $last_id = $connect->insert_id;
        for ($i=0; $i < sizeof($_SESSION['cart']) ; $i++){
            $sql_insert_to_oder_detail = "  INSERT INTO order_detail(user_id,pid,p_name,p_price,p_quantity,p_image,oid) 
                                            VALUES (    '$uid',
                                                        '".$_SESSION['cart'][$i][5]."',
                                                        '".$_SESSION['cart'][$i][0]."',
                                                        '".$_SESSION['cart'][$i][2]."',
                                                        '".$_SESSION['cart'][$i][4]."',
                                                        '".$_SESSION['cart'][$i][1]."',
                                                        '$last_id')";
            $sql_update_remain = "UPDATE products SET p_remain = '".$_SESSION['cart'][$i][3] - $_SESSION['cart'][$i][4]."' WHERE pid ='".$_SESSION['cart'][$i][5]."' ";
            
            $rs_order_detail = $connect->query($sql_insert_to_oder_detail);
            $rs_update_remain = $connect->query($sql_update_remain);
        }
        

    } else echo "Khong";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Trang thanh toán</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="back_home">
                    <a href="hello.php">
                        <button><i class="fa-solid fa-house"></i>Trang chủ</button>
                    </a>
                </div>
                    <h1>ĐƠN HÀNG</h1>
                <div class="payment">
                    <div class="cart_info">
                        <div class="icon_show">
                            <span>Thông tin đơn hàng</span>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <table id="cart_table">
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                            </tr>
                            <?php
                                //cart_detail
                                if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
                                    for ($i=0; $i < sizeof($_SESSION['cart']); $i++) {
                                        echo   '<tr>
                                                    <td><img src="'.$_SESSION['cart'][$i][1].'" width="125px"></td>
                                                    <td>'.$_SESSION['cart'][$i][0].'</td>
                                                    <td>'.$_SESSION['cart'][$i][4].'</td>
                                                </tr>';
                                    }
                                } else {
                                    echo '<tr>
                                            <td colspan="3">Chưa có sản phẩm nào trong giỏ hàng</td>
                                          </tr>';
                                }
                            ?> 
                        </table>
                    </div>
                    <div class="under_table">
                        <div class="info">
                            <h2>Thông tin giao hàng</h2>
                            <b>Họ và tên: </b><span><?php echo $c_name; ?></span><br>
                            <b>Email: </b><span><?php echo $c_mail; ?></span><br>
                            <b>Địa chỉ nhận hàng: </b><span><?php echo $c_address ?></span><br>
                        </div>

                        <div class="shipping">
                            <h2>Phương thức vận chuyển</h2>
                            <input id="Btn_shipping" type="radio"><span> Giao hàng tận nơi</span>
                        </div>
                        <div class="pay_type">
                            <h2>Phương thức thanh toán</h2>
                            <input id="Btn_shipping" type="radio"><span> Thanh toán khi nhận hàng</span>
                        </div>
                        <div class="money">
                            <b>Tổng tiền: <?php echo $total_money ?> vnđ </b>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
    </body>
    <script>
        const show_cart = document.querySelector('.icon_show')
        show_cart.addEventListener('click', () =>{
            var table = document.getElementById("cart_table");
            if (table.style.display === "none") {
                table.style.display = "table";
            } else {
                table.style.display = "none";
            }
        })
    </script>
</html>

<style>
*{
    margin: 0 auto;
    padding: 0;
    box-sizing: border-box;
}

.container{
    width: 90%;
    margin-top: 30px;
    padding-left: 20px;
}
.content{
    position: relative;
    border: 1px solid black;
    padding-left: 10px;
    margin-bottom: 50px;
}
.content h1{
    font-size: 40px;
    text-align: center;
}
.payment{
    line-height: 50px;
}
.info{
    line-height: 30px;
    margin-bottom: 20px;
    font-size: 20px;
}
.info b{
    font-size: 25px;
    padding-right: 5px;
    margin-top: 100px;
}
.info h2{
    font-size: 30px;
    margin-left: 40px;
    margin-bottom: 10px;
    margin-top: 30px;
    text-align: center;
}
.under_table{
    padding-left: 15px;
}
.cart_info .icon_show{
    font-size: 20px;
    margin-left: 70%;
    color:black;
    cursor: pointer;
}
.icon_show:hover{
    color:blueviolet;
}

#cart_table{
    border: 1px solid black;
    border-radius: 5px;
    width: 80%;
    padding: 20px;
    text-align: center;
}
#cart_table tr th{
    font-size: 20px;
}
.feedback input{
    width: 600px;
    height: 100px;
    font-size: 17px;
    padding-left: 10px;
}
.money{
    margin-left: 58%; 
    font-size: 30px;
}

.back_home{
    padding: 20px;

}
.back_home button{
    margin-top: 20px;
    color: white;
    background-color: #242526;
    width: 100px;
    border-radius: 50px;
    font-weight: 500;
    height: 30px;
    margin-bottom: 20px;
}
.back_home button:hover{
    background-color:darkgray;
    color: black;
    font-weight: 600;
    transition: 0.5s ease-in-out;
}
.back_home i{
    margin-right: 5px;
}
</style>