<?php
    include('php/connectdb.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="hello.css">
</head>
<body>
    <div class="container">
        <div class="sub_menu">
            <div class="title_sub">Menu <i class="fa-solid fa-bars"></i></div>
            <ul type="none" id="sub_menu"> 
                <li id="goto_foods">Foods</li>
                <li id="goto_drinks">Drinks</li>
                <li id="goto_desserts">Desserts</li>
            </ul>
        </div>
        <div class="food_drink" id="foods">
            <div class="title">
                <h2>Foods</h2>
            </div>
            <div class="product_grid">
                <?php
                    $sql_show_product = "SELECT * FROM products WHERE cid='1'";
                    $rs_show_product = $connect->query($sql_show_product);
                    if ($rs_show_product->num_rows > 0 ){
                        while($row_show_product = $rs_show_product->fetch_assoc()){
                            $p_name = $row_show_product['p_name'];
                            $p_image = $row_show_product['p_image'];
                            $p_price = $row_show_product['p_price'];

                            echo '<div class="item">
                                    <img src="'.$p_price.'" alt="">
                                    <div class="addcart">Đặt món</div>
                                    <div class="p_name">'.$p_name.'</div>
                                    <div class="p_price"><span class="up_price">40,000</span><span class="real_price">'.number_format($p_price,3).'</span><sub>VNĐ</sub></div>
                                 </div>';
                        }
                    }
                ?>
            </div> 
        <hr>
            <div class="title" id="drinks">
                <h2>Drinks</h2>
            </div>
            <div class="product_grid">
                <div class="item">
                    <img src="Food_img/web-06.png" alt="">
                    <div class="addcart">Đặt món</div>
                    <div class="p_name">Mỳ Ý Việt Nam</div>
                    <div class="p_price"><span class="up_price">59,000</span><span class="real_price">40,000</span><sub>VNĐ</sub></div>
                </div>
                <div class="item">
                    <img src="Food_img/ShrimpBurger.png" alt="">
                    <div class="addcart">Đặt món</div>
                    <div class="p_name">Burger</div>
                    <div class="p_price"><span class="up_price">59,000</span><span class="real_price">40,000</span><sub>VNĐ</sub></div>
                </div>
                <div class="item">
                    <img src="Food_img/0003872_bbq-chicken-platter-9pcs_300.jpeg" alt="">
                    <div class="addcart">Đặt món</div>
                    <div class="p_name">Mỳ Ý Việt Nam</div>
                    <div class="p_price"><span class="up_price">59,000</span><span class="real_price">40,000</span><sub>VNĐ</sub></div>
                </div>
                <div class="item">
                    <img src="Food_img/web-06.png" alt="">
                    <div class="addcart">Đặt món</div>
                    <div class="p_name">Mỳ Ý Việt Nam</div>
                    <div class="p_price"><span class="up_price">59,000</span><span class="real_price">40,000</span><sub>VNĐ</sub></div>
                </div>
                <div class="item">
                    <img src="Food_img/ShrimpBurger.png" alt="">
                    <div class="addcart">Đặt món</div>
                    <div class="p_name">Burger</div>
                    <div class="p_price"><span class="up_price">59,000</span><span class="real_price">40,000</span><sub>VNĐ</sub></div>
                </div>
                <div class="item">
                    <img src="Food_img/0003872_bbq-chicken-platter-9pcs_300.jpeg" alt="">
                    <div class="addcart">Đặt món</div>
                    <div class="p_name">Mỳ Ý Việt Nam</div>
                    <div class="p_price"><span class="up_price">59,000</span><span class="real_price">40,000</span><sub>VNĐ</sub></div>
                </div>
            </div>
            <div class="title" id="desserts">
                <h2>Desserts</h2>
            </div>
            <div class="product_grid">
                <div class="item">
                    <img src="Food_img/web-06.png" alt="">
                    <div class="addcart">Đặt món</div>
                    <div class="p_name">Mỳ Ý Việt Nam</div>
                    <div class="p_price"><span class="up_price">59,000</span><span class="real_price">40,000</span><sub>VNĐ</sub></div>
                </div>
                <div class="item">
                    <img src="Food_img/ShrimpBurger.png" alt="">
                    <div class="addcart">Đặt món</div>
                    <div class="p_name">Burger</div>
                    <div class="p_price"><span class="up_price">59,000</span><span class="real_price">40,000</span><sub>VNĐ</sub></div>
                </div>
                <div class="item">
                    <img src="Food_img/0003872_bbq-chicken-platter-9pcs_300.jpeg" alt="">
                    <div class="addcart">Đặt món</div>
                    <div class="p_name">Mỳ Ý Việt Nam</div>
                    <div class="p_price"><span class="up_price">59,000</span><span class="real_price">40,000</span><sub>VNĐ</sub></div>
                </div>
                <div class="item">
                    <img src="Food_img/web-06.png" alt="">
                    <div class="addcart">Đặt món</div>
                    <div class="p_name">Mỳ Ý Việt Nam</div>
                    <div class="p_price"><span class="up_price">59,000</span><span class="real_price">40,000</span><sub>VNĐ</sub></div>
                </div>
                <div class="item">
                    <img src="Food_img/ShrimpBurger.png" alt="">
                    <div class="addcart">Đặt món</div>
                    <div class="p_name">Burger</div>
                    <div class="p_price"><span class="up_price">59,000</span><span class="real_price">40,000</span><sub>VNĐ</sub></div>
                </div>
                <div class="item">
                    <img src="Food_img/0003872_bbq-chicken-platter-9pcs_300.jpeg" alt="">
                    <div class="addcart">Đặt món</div>
                    <div class="p_name">Mỳ Ý Việt Nam</div>
                    <div class="p_price"><span class="up_price">59,000</span><span class="real_price">40,000</span><sub>VNĐ</sub></div>
                </div>
            </div>
        </div>
    </div>
        <button id="scroll_to_top">
            <a href="#">
                <i class="fa-solid fa-angle-up"></i>
            </a>
        </button>
</body>
<script>
    //hide&show menu
    const sub_menu_btn = document.querySelector('.sub_menu .title_sub');
    const sub_menu = document.getElementById('sub_menu');
    sub_menu_btn.addEventListener('click', () => {
        if (sub_menu.style.display === "none"){
            sub_menu.style.display = "block";
        } else {
            sub_menu.style.display = "none";
        }
    })
    //scroll
    const go_foods = document.getElementById('goto_foods');
    const des_foods = document.getElementById('foods');
    const go_drinks = document.getElementById('goto_drinks')
    const des_drinks = document.getElementById('drinks');
    const go_desserts = document.getElementById('goto_desserts')
    const des_desserts = document.getElementById('desserts');
    go_foods.addEventListener('click', () => {
        des_foods.scrollIntoView({behavior: 'smooth'});
    })
    go_drinks.addEventListener('click' , () => {
        des_drinks.scrollIntoView({behavior: 'smooth'});
    })
    go_desserts.addEventListener('click' , () => {
        des_desserts.scrollIntoView({behavior: 'smooth'});
    })
</script>
</html>