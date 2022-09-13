<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) >0){ $row = mysqli_fetch_array($result); if($row['user_type'] == 'admin'){ $_SESSION['admin_name'] = $row['name']; header('location:index.php'); }elseif($row['user_type'] == 'user'){ $_SESSION['user_name'] = $row['name']; header('location:index.php');
} }else{ $error[] = 'incorrect email or password!'; } }; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="login_form.css">

</head>

<body>

<div class="container">
    <div class="form-group">

        <form action="" method="post" class="login-form">
            <h3>Login Now</h3>
            <br>

            <?php
            
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
                <input type="email" name="email" required placeholder="enter your email">
                <br>
                <input type="password" name="password" required placeholder="enter your password">
                <br>
                <button type="submit" name="submit" value="login now" class="form-btn">Login</button>
                <p class="message" style="color:white">don't have an account? <a href="register_form.php">register now</a></p>
        </form>

    </div>
    </div>
</body>

</html>