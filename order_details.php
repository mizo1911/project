<?php
session_start();
include('Server/connection.php');

if (isset($_GET['order_details_btn']) && isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    
    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ? ");
    $stmt->bind_param('i', $order_id);
    
    if ($stmt->execute()) {
        $order_details = $stmt->get_result();

        // Check if there are any results
        if ($order_details->num_rows > 0) {
            // Proceed with displaying order details
        } else {
            echo "No order details found for order ID: " . $order_id;
        }
    } else {
        echo "Error executing the query: " . $stmt->error;
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


<!----Order details---->
<section class="orders container my-5 py-3" >
<div  class="container mt-5">
  <h2 class="font-weight-bold text-center">Orders Details</h2>
  <hr>
</div>

<table class="mt-5 pt-5">
<tr>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
</tr>
 
<?php while ($row = $order_details->fetch_assoc()) {  ?>
<tr>
  <td>
<div class="product-info">
<span> <?php echo $row['product_name']; ?>
</span> <div>
<p class="mt-3"></p>
 </div>
</div>
  </td>

  <td>
    <span><?php echo $row['product_price']; ?></span>
</td>

<td>
    <span><?php echo $row['product_quantity']; ?></span>
</td>

   <!-- <td>
  <form>
  <input class="btn btn-primary" type="submit" value="details" />
  </form>
  </td> -->

   </tr>

<?php } ?>
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