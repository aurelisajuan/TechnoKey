<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
} else{
    $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechnoKey.Com</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php';?>

<div class="home-bg">
    <section class="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/ban1.jpg" alt="">
                    </div>
                    <div class="content">
                        <a href="shop.php" class="btn">Shop Now</a>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/ban2.jpg" alt="">
                    </div>
                    <div class="content">
                        <a href="shop.php" class="btn">Shop Now</a>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/ban3.jpg" alt="">
                    </div>
                    <div class="content">
                        <a href="shop.php" class="btn">Shop Now</a>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/ban4.jpg" alt="">
                    </div>
                    <div class="content">
                        <a href="shop.php" class="btn">Shop Now</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
</div>

<section class="category">
    <h1 class="heading1">Shop by Category</h1>

    <div class="swiper category-slider">
        <div class="swiper-wrapper">
            <a href="category.php?category=size-65" class="swiper-slide slide">
                <img src="images/65_1.jpg" alt="">
                <h3>Keyboard Size 65%</h3>
            </a>

            <a href="category.php?category=size-80" class="swiper-slide slide">
                <img src="images/80_1.png" alt="">
                <h3>Keyboard Size 80%</h3>
            </a>

            <a href="category.php?category=size-100" class="swiper-slide slide">
                <img src="images/100_1.jpg" alt="">
                <h3>Keyboard Size 100%</h3>
            </a>
        </div>

        <div class="swiper-pagination"></div>
    </div>
</section>

<section class="home-products">
    <h1 class="heading">Latest Keyboards</h1>
    <div class="swiper products-slider">
        <div class="swiper-wrapper">
            <?php
                $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
                $select_products->execute();
                if($select_products->rowCount() > 0){
                    while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
            ?>           
                        <form action="" method="post" class="swiper-slide slide">
                            <input type="hidden" name="pid" value="<?= $fetch_product['id'];?>">
                            <input type="hidden" name="name" value="<?= $fetch_product['name'];?>">
                            <input type="hidden" name="price" value="<?= $fetch_product['price'];?>">
                            <input type="hidden" name="image" value="<?= $fetch_product['image'];?>">
                            <a href="quick_view.php?pid=<?= $fetch_product['id'];?>" class="fas fa-eye"></a>
                            <img src="uploaded_Img/<?= $fetch_product['image'];?>" alt="">
                            <div class="name"><?= $fetch_product['name'];?></div>
                            <div class="flex">
                                <div class="price"><span>$ </span><?= $fetch_product['price'];?><span>/-</span></div>
                                <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length==2) return false;" value="1">
                            </div>
                            <input type="submit" value="add to cart" class="btn" name="add_to_cart">
                        </form>
            <?php
                    }
                } else{
                    echo '<p class="empty>No products added yet!</p>';
                }
            ?>
        </div>

        <div class="swiper-pagination"></div>
    </div>
</section>

<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>
    var swiper = new Swiper(".home-slider", {
        loop: true,
        spaceBetween: 20,
        pagination: {
            el: ".swiper-pagination",
            clickable:true,
        },
    });

    var swiper = new Swiper(".category-slider", {
        loop:true,
        spaceBetween:20,
        pagination:{
            el: ".swiper-pagination",
            clickable:true,
        },
    });

    // var swiper = new Swiper(".products-slider", {
    //     loop:true,
    //     spaceBetween:20,
    //     pagination:{
    //         el:".swiper-pagination",
    //         clickable:true,
    //     },
    //     breakpoints:{
    //         550:{
    //             slidesPerView:2,
    //         },
    //         768:{
    //             slidesPerView:3,
    //         },
    //         1024:{
    //             slidesPerView:4,
    //         },
    //     },
    // });

</script>

</body>
</html>