<?php

include('Server/connection.php');

if(isset($_GET['product_id'])){

  $product_id = $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
  $stmt-> bind_param("i", $product_id);
  $stmt-> execute();
  
  $product = $stmt -> get_result();


//no product id was given
}  else{

  header('location: index.php');
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

    <!------Single Product------>
<section class="container single-product my-5 pt-5">
<div class="row mt-5">

<?php    
     while($row = $product ->fetch_assoc()){ ?> 


<div class="col-lg-5 col-md-6 col-sm-12">
  <img class="img-fluid w-100 pb-1" src="assets/images/<?php echo $row['product_image']; ?>" id="mainImg">
  <div class="small-img-group">
    <div class="small-img-col">
      <img src="assets/images/<?php echo $row['product_image']; ?>" width="100%" class="small-img">
    </div>

    <div class="small-img-col">
      <img src="assets/images/<?php echo $row['product_image2']; ?>" width="100%" class="small-img">
    </div>

    <div class="small-img-col">
      <img src="assets/images/<?php echo $row['product_image3']; ?>" width="100%" class="small-img">
    </div>

    <div class="small-img-col">
      <img src="assets/images/<?php echo $row['product_image4']; ?>" width="100%" class="small-img">
    </div>
  </div>
</div>

<div class="col-lg-6 col-md-12 col-sm-12">
  <h6>Our Featured Products</h6>
  <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
  <h2><?php echo $row['product_price']; ?>L.E</h2>

  <form method="post" action="cart.php">
    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"/>
    <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>"/>
    <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>"/>
    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>"/>
  <input type="number" name="product_quantity" value="1">
  <button class="btn" type="submit" name ="add_to_cart">Add To Cart</button>

  </form>   
<h4 class="mt-5 mb-5">Product Details</h4>
<span><?php echo $row['product_description']; ?></span>
</div>



<?php } ?>

</div>
</section>



<!----Related Product---->
<section id="related-products" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
<h3>Related Product</h3>
<hr>
  </div>
  <div class="row mx-auto container-fluid">
    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/RP1.webp" >
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name">Kids Roller Shoes Boy Girl Sneakers with Wheels Become Sport Sneaker</h5>
      <h4 class="p-price">550 L.E</h4>
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </div>

    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/RP3.jpg">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name">Childrens Sneakers Double-wheeled Shoes Led Light Shoes</h5>
      <h4 class="p-price">350 L.E</h4>
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </div>

    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/RP4.jpg">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name">Childrens Sneakers Double-Wheeled Shoes Led Light Shoes </h5>
      <h4 class="p-price">499 L.E</h4>
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </div>


    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/RP2.webp">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name">Bull Boys Stegosaurus Trainers Blue
      </h5>
      <h4 class="p-price">850 L.E</h4>
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </div>


  </div>
</section>



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
<script>
 var mainImg = document.getElementById("mainImg");
 var smallImg = document.getElementsByClassName("small-img")

 for(let i =0; i<4; i++ ){

  smallImg[i].onclick = function(){
  mainImg.src= smallImg[i].src;
 }

 }
 
</script>

</body>
</html>