<?php
    include("php/connectdb.php");
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="product_detail.css">
</head>
<body>
    <?php
                $PID = $_GET['pid'];
                if (isset($PID)){
                    $SQL = "SELECT * FROM products WHERE pid='$PID' ";
                    $result = $connect->query($SQL);

                    if($result->num_rows >0 ){
                        $row_data = $result->fetch_assoc();
                        $name = $row_data['p_name'];
                        $price = $row_data['p_price'];
                        $remain = $row_data['p_remain'];
                        $detail = $row_data['p_detail'];
                        $image = $row_data['p_image'];

                    }
                }
                else    
                    echo 'Không có sản phẩm phù hợp!';
            ?>
        <div class="container">
                <div class="content">
                <div class="left_image">
                    <img src="<?php echo $image; ?>">
                </div>
                <div class="content_right">
                   <h2><?php echo $name; ?></h2>
                   <h2><?php echo number_format("$price", 0); ?> vnd</h2>
                   <p>
                    Trạng thái:
                        <?php
                            if($remain > 0)
                                echo " Còn hàng";
                            else    
                                echo " Hết hàng";
                        ?>   
                   </p>
                    <p>
                        HƯỚNG DẪN CHỌN  SIZE:<br> - Size M: 1m65-1m70, 60kg-65kg 
                        <br>- Size L: 1m70-1m75, 65kg-70kg</p>
                    <p>
                    <?php
                        if ($remain > 0 )
                            echo'Số lượng còn lại: '. $remain;
                    ?>
                    </p>
                    <hr>
                    <?php
                        if ($remain > 0 )
                            echo '<form action="cart.php" method="post">
                                    <input type="hidden" name="PID" value="'.$PID.'">
                                    <button type="submit" name="submit">Thêm vào giỏ hàng</button>
                                  </form>';
                    ?>
                </div>
            </div>
            <div class="des_detail">
                <h3><u>Mô tả sản phẩm</u></h3>
                <p>  
                    <?php
                        echo $detail;
                    ?>
                </p>
                    <div class="size_ins">
                        <h4>HƯỚNG DẪN CHỌN SIZE:</h4> <br>
                        - Size M: 1m65-1m70, 60kg-65kg<br> 
                        <br>
                        - Size L: 1m70-1m75, 65kg-70kg<br> 
                        <br>
                        <h4>QUY ĐỊNH ĐỔI TRẢ:</h4>
                        <br>
                        - Đối với mặt hàng giảm giá, vui lòng không đổi trả. <br>
                        <br>
                        - Đối với hàng mới, shop chỉ nhận đổi các sản phẩm bị lỗi sản xuất còn nguyên tag chưa qua sử dụng trong vòng 3 ngày kể từ ngày nhận được hàng. <br>
                        <br>
                        - Nhận đổi trả size trong vòng 3 ngày kể từ ngày nhận hàng, phí ship đổi size quý khách vui lòng thanh toán 2 chiều.
                    </div>
                </p>
            </div>
            </div>
</body>
</html>