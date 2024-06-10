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

</script>

</body>
</html>