<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'components/user_header.php';?>

    <section class="about">
        <div class="row">
            <div class="content">
                <h3>What Is TechnoKey?</h3>
                <p>Welcome to TechnoKey, your trusted partner in technological innovation and digital solutions. We are dedicated to empowering businesses and individuals through cutting-edge technology and exceptional service.</p>
                <h3>Our Mission</h3>
                <p>To unlock the potential of technology to drive growth and success for our clients. We strive to deliver innovative solutions that are tailored to meet the unique needs of each business we serve.</p>
                <h3>Developer's Message</h3>
                <p>Hey there, I am Aurelisa Sindhunirmala. </br>A passionate developer brave enough to explore new technologies. </br>I am currently an undergraduate studying Computer Science and Engineering at RCC!</p>
            </div>
                <div class="image">
                    <img src="images/me.jpg" alt="">
                </div>
            </div>
    </section>

    <?php include 'components/footer.php';?>
</body>
</html>