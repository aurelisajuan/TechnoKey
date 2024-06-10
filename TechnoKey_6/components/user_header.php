<?php
    if(isset($message)){
        foreach($message as $message){
            echo '
            <div class="message">
                <span>'.$message.'</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }
?>

<header class="header">
    <section class="flex">

        <nav class="navbar">
            <a href="about.php">About Us</a>
            <a href="orders.php">Orders</a>
            <a href="shop.php">Shop</a>
        </nav>

        <a href="home.php" class="logo">Techno<span>Key</span></a>

        <div class="icons">
            <?php
                $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                $count_cart_items->execute([$user_id]);
                $total_cart_counts = $count_cart_items->rowCount();
            ?>
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php"><i class="fas fa-search"></i></a>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts; ?>)</span></a>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="profile">
            <?php          
                $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                $select_profile->execute([$user_id]);
                if($select_profile->rowCount() > 0){
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
                    <p><?= $fetch_profile["name"]; ?></p>
                    <a href="update_user.php" class="btn">Update Profile</a>
                    <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">Logout</a> 
                <?php
                }else{
                ?>
                    <p>Please Login Or Register first to proceed!</p>
                    <div class="flex-btn">
                        <a href="user_register.php" class="option-btn">Register</a>
                        <a href="user_login.php" class="option-btn">Login</a>
                    </div>
                    <p>Are you an admin?</p>
                    <div class="flex-btn">
                        <a href="admin/admin_login.php" class="option-btn">Login as Admin</a>
                    </div>
                <?php
                }
                ?>  
        </div>

    </section>
</header>