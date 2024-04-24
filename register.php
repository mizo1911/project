<?php
session_start();
include('Server\connection.php');
//if user has already registered, then take user to account page
if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit;
}

if(isset($_POST['register'])){
 
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  //if passwords dont match
  if($password !== $confirmPassword){
    header('location: register.php?error= Passwords do not match');
  
  //if passwords is less than 6 char
  }else if(strlen( $password < 6)){
    header('location: register.php?error= Password must be at least 6 characters long');
}
//if there is no error
else{
//check if there is a user with this email or not
$stmt1 = $conn->prepare("SELECT count(*) FROM users WHERE user_email=?");
$stmt1->bind_param('s',$email);
$stmt1->execute();
$stmt1->bind_result($num_rows);
$stmt1->store_result();
$stmt1->fetch();


//if there is a user already registered with this email
if($num_rows !=0){

  header('location: register.php?error= User with this email is already exists');
} 
//if there is no user registered with this email before
else{

//create a new user
$stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
VALUES (?,?,?)");

$stmt->bind_param('sss',$name, $email,$password);

//if account was created successfully
if($stmt->execute()){ 
  $user_id = $stmt ->insert_id;
  $_SESSION['user_id'] = $user_id;  
  $_SESSION['user_email'] =$email;  
  $_SESSION['user_name'] =$name;  
  $_SESSION['logged_in'] =true;  
  header('location: account.php?register_success= You registered successfully');
}//account was not created
 else{
  header('location: register.php?error= Could not create an account');
 } 

  }
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

    <title>Registeration form</title>
</head>
<body>
  <!------NAVBAR------>
  <nav class="navbar navbar-expand-lg navbar-light py-3 bg-white fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php" style="font-size: 28px;">palestina</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a  href="index.php"><i class="fa-brands fa-shopify fa-beat-fade" style="font-size: 28px;" ></i></a>

      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="shop.php">Shop</a>
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

<!---Register---->

<section class="my-5 py-5">
<div class="container text-center mt-3 pt-5">
<h2 class="font-weight-bold">Register</h2>
</div>
<div class="mx-auto container">

<form id="register-form" method="POST" action="register.php">
  <p style="color: red;"><?php if (isset($_GET['error'])) {echo $_GET['error'];} ?></p>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" id="register-name" name="name" placeholder="Enter Your Name" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" id="register-email" name="email" placeholder="Enter Your Email" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="register-password" name="password" placeholder="Enter Your Password" required>
    </div>

    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm Your Password" required>
    </div>
<br>
    <div class="form-group">
      <input class="btn" id="register-btn"  type="submit"  name="register" value="Register">
    </div>

    <div class="form-group">
        <a id="login-url" href="login.php" >Do you have an account? Login</a>
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