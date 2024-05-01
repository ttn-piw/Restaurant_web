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
                    <?php
                        if ($remain > 0 )
                            echo'Số lượng còn lại: '. $remain;
                    ?>
                    </p>
                    <hr>
                    <?php
                        if ($remain > 0 )
                            echo '<form action="cart.php" method="post">
                                    <input type="hidden" name="pid" value="'.$PID.'">
                                    <button type="submit" name="submit">Thêm vào giỏ hàng</button>
                                  </form>';
                    ?>
                </div>
            </div>
            <div class="des_detail">
                <h3><u>Mô tả chi tiết</u></h3>
                <p>  
                    <?php
                        echo $detail;
                    ?>
            </div>
            </div>
</body>
</html>