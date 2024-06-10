<?php 

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
} else{
    $user_id = '';
};

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = sha1($_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email =?");
    $select_user->execute([$email,]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if($select_user->rowCount() > 0){
        $message[] = 'Email already exists!';
    } else{
        if($pass != $cpass){
            $message[] = 'Confirm password not matched!';
        } else{
            $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
            $insert_user->execute([$name, $email, $cpass]);
            $message[] = 'Registered successfully, login now please.';

            //Set a cookie upon successful registration
            setcookie('registered)user', $name, time() + (86400 * 30), "/");    //Cookie valid for 30 days
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'components/user_header.php';?>
    <section class="form-container">
        <form action="" method="post">
            <h3>Register Now</h3>
            <input type="text" name="name" required placeholder="enter your username" maxlength="20"  class="box">
            <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <div class="pass">
                <input type="password" id="password" name="pass" requicopper placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                <span class="toggle-password" onclick="togglePasswordVisibility()"><i class="fa fa-eye-slash"></i></span>
            </div>
            <div class="cpass">
                <input type="password" id="confirm_password" name="cpass" requicopper placeholder="confirm your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
                <span class="toggle-password2" onclick="togglePasswordVisibility2()"><i class="fa fa-eye-slash"></i></span>
            </div>
            <input type="submit" value="register now" class="btn" name="submit">
            <p>Already have an account?</p>
            <a href="user_login.php" class="option-btn">Login Now</a>
        </form>
    </section>

    <?php include 'components/footer.php';?>
    <script src="js/script.js"></script>
</body>

<script>
function togglePasswordVisibility(){
   var passwordInput = document.getElementById("password");
   var toggleIcon = document.querySelector(".toggle-password i");
   if(passwordInput.type === "password"){
      passwordInput.type = "text";
      toggleIcon.classList.remove("fa-eye-slash");
      toggleIcon.classList.add("fa-eye");
   } else{
      passwordInput.type = "password";
      toggleIcon.classList.remove("fa-eye");
      toggleIcon.classList.add("fa-eye-slash");
   }
}

function togglePasswordVisibility2(){
   var passwordInput = document.getElementById("confirm_password");
   var toggleIcon = document.querySelector(".toggle-password2 i");
   if(passwordInput.type === "password"){
      passwordInput.type = "text";
      toggleIcon.classList.remove("fa-eye-slash");
      toggleIcon.classList.add("fa-eye");
   } else{
      passwordInput.type = "password";
      toggleIcon.classList.remove("fa-eye");
      toggleIcon.classList.add("fa-eye-slash");
   }
}
</script>

</html>