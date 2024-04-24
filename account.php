<?php
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';
$orders = isset($_GET['order_id']) ? $_GET['order_id'] : '';

session_start();
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';

include('Server/connection.php');
if(!isset($_SESSION['logged_in'])){
header('location:login.php');
exit;
}

if(isset ($_GET['logout'])) {
if(isset($_SESSION['logged_in'])){
unset($_SESSION['logged_in']);
unset($_SESSION['user_name']);
unset($_SESSION['user_email']);
header('location:login.php');
exit;
  }
}

if(isset ($_POST['change_password'])) {

$password = $_POST['password'];
$ConfirmPassword = $_POST['ConfirmPassword'];
$user_email = $_POST['user_email'];

$stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=? ");
$stmt->bind_param('ss',$password,$user_email);
if ($stmt->execute()){
  header('location: account.php?message= Your Password Has Been Updated Successfully ');

}else{
  header('location: account.php?error= Could not Updated Your Password !');

}


  }

//get orders
//get orders
if (isset($_SESSION['logged_in'])) {
  $user_id = $_SESSION['user_id']; // to get user id
  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=? ");
  $stmt->bind_param('i', $user_id);
  $stmt->execute();
  $orders = $stmt->get_result();
} else {
  // Handle the case when the user is not logged in
  $orders = null; // or any other default value as needed
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

    <title>Home</title>
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
          <li class="nav-item">
           <a href="account.php"><i class="fa-solid fa-user"></i></a> 
            <a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a>
         </li>
        </ul>
      </div>
    </div>
  </nav>
  <!------END NAVBAR------>


<!------Acount page------->
<section class="my-5 py-5">
<div class="row container mx-auto">
    <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">

    <p style="color: green;"><?php if (isset($_GET['register_success'])) {echo $_GET['register_success'];} ?></p>
    <p style="color: green;"><?php if (isset($_GET['login_success'])) {echo $_GET['login_success'];} ?></p>


<h3 class="font-weight-bold">Account info</h3>
<div class="account-info">             <!--for double protection-->
    <h>Name: <span><?php  if(isset( $_SESSION['user_name'])){ echo $_SESSION['user_name'];} ?></span></h>
    <p>Email: <span><?php if(isset( $_SESSION['user_email'])){ echo $_SESSION['user_email'];} ?></span></p>
    <p><a href="" id="order-btn">Your Orders</a></p>
    <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
</div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
    <form class="account-form" method="post" action="account.php" >
    <p style="color: red;"><?php if (isset($_GET['error'])) {echo $_GET['error'];} ?></p>
    <p style="color: green;"><?php if (isset($_GET['message'])) {echo $_GET['message'];} ?></p>

        <h3>Change Password</h3>
        <hr>
       <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" id="account-password" name="password" placeholder="Enter your Password" required>  
</div>



        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" id="account-password-confirm" name="ConfirmPassword" placeholder="Enter your Password" required>  
        </div>
        <br>
        <input class="btn btn-primary" type="submit" value="Change Password" name="change_password" />
    </form>
    
    </div>

</div>
</section>

<!----Order details---->
<section class="orders container my-5 py-3" >
<div  class="container mt-2">
  <h2 class="font-weight-bold text-center">Your Orders</h2>
  <hr>
</div>

<table class="mt-5 pt-5">
<tr>
<th>Order Id</th>
<th>Order Cost</th>
<th>Order Status</th>
<th>Order Date</th>
<th>Order Details</th>
</tr>

<?php while ($row = $orders->fetch_assoc()) { ?>

<tr>
    <td>
        <div class="product-info">
            <!--- <img src="assets/images/"> -->
            <div>
                <p class="mt-3"><?php echo isset($row['order_id']) ? $row['order_id'] : ''; ?></p>
            </div>
        </div>
    </td>

    <!-- <td>
        <span><?php echo isset($row['order_id']) ? $row['order_id'] . 'L.E' : ''; ?></span>
    </td> -->

    <td>
        <span><?php echo isset($row['order_cost']) ? $row['order_cost'] . 'L.E' : ''; ?></span>
    </td>

    <td>
        <span><?php echo isset($row['order_status']) ? $row['order_status'] : ''; ?></span>
    </td>

    <td>
        <span><?php echo isset($row['order_date']) ? $row['order_date'] : ''; ?></span>
    </td>

    <td>
        <form method="GET" action="order_details.php">
            <input type="hidden" value="<?php echo isset($row['order_id']) ? $row['order_id'] : ''; ?>" name="order_id" />
            <input class="btn btn-primary" name="order_details_btn" type="submit" value="details" />
        </form>
    </td>
</tr>

<?php }?>



</table>
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