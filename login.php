<?php
session_start();
include('Server/connection.php');

if(isset($_SESSION['logged_in'])){
    header('location: account.php');
    exit;
}

if(isset($_POST['login-btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email=? AND user_password=? LIMIT 1");
    $stmt->bind_param('ss', $email, $password);

    if ($stmt->execute()) {
        $stmt->bind_result($user_id, $user_name, $user_email, $user_password);
        $stmt->store_result();

        if ($email == 'admin@gmail.com' && $password == '123456') {
            // Redirect to admin panel
            header("location: admin/index.php");
            exit;
        } elseif ($stmt->num_rows() == 1) {
            $stmt->fetch();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['logged_in'] = true;
            header('location: account.php?login_success=logged in successfully');
            exit;
        } else {
            header('location: login.php?error= Could not verify your account');
            exit;
        }
    } else {
        // Error handling
        header('location: login.php?error= Something went wrong');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Login</title>
</head>
<body>
  <!------NAVBAR------>
  <nav class="navbar navbar-expand-lg navbar-light py-3 bg-white fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#" style="font-size: 28px;">palestina</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a  href="index.php"><i class="fa-brands fa-shopify fa-beat-fade" style="font-size: 28px;" ></i></a>

      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!------END NAVBAR------>

<!---login---->

<section class="my-5 py-5">
<div class="container text-center mt-3 pt-5">
<h2 class="font-weight-bold">Login</h2>
</div>
<div class="mx-auto container">
<form id="login-form" method="post" action="login.php"  >
<p style="color: red;" class="text-center" ><?php if (isset($_GET['error'])) {echo $_GET['error'];} ?></p>

    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" id="login-email" name="email" placeholder="Enter Your Email" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="login-password" name="password" placeholder="Enter Your Password" required>
    </div>
<br>
    <div class="form-group">
    <input class="btn" id="login-btn" type="submit" value="Login" name="login-btn" ></a>
    </div>

    <div class="form-group">
        <a href="register.php" id="register-url">Don't have an account? Register</a>
    </div>
</form>
</div>
</section>



















  


  <!----Footer---->
<br><br><br><br>
<footer>
<div class="waves">
  <div class="wave" id="wave1"></div>
  <div class="wave" id="wave2"></div>
  <div class="wave" id="wave3"></div>
  <div class="wave" id="wave4"></div>
</div>
<ul class="social_icons">
  <li><a href="#"><i class="fa-brands fa-facebook"></i></a>
  <li><a href="#"><i class="fa-brands fa-twitter"></i></a>
  <li><a href="#"><i class="fa-brands fa-instagram"></i></a>
  <li><a href="#"><i class="fa-solid fa-envelope"></i></a>
  </ul>

  <ul class="menu">
    <li><a href="#">Home</a></li>
    <li><a href="#">Services</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="#">About</a></li>
  </ul>
<p style="font-family:Lobster Two;"> ©2023 all rights reserved |Designed by Asmaa Mohamed Refat</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>
</html>