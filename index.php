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

  <!------home------>
  <section id="home">
<div class="container">
<h5>NEW ARRIVALS</h5>
<h1> <span>Best Prices</span>This Season</h1>
<p>E-shop Offers The Best Products For The Most Affordable Prices</p>
<a href="shop.php"><button>SHOP NOW</button></a>
</div>
  </section>
<!-----Brands----->
<section id="brand" class="container">
<div class="row">
  <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand_logo1.jpg">
  <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand_logo2.jpg">
  <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand_logo3.webp">
  <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand_logo4.png">
</div>
</section>

<!----NEW------>
<section id="new" class="w-100">
<div class="row p-0 m-0">
  <!----ONE---->
<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
  <img class="img-fluid" src="assets/images/shoes.webp" >
  <div class="details">
    <h2> Extreamely Awesome Shoes</h2>
  <a href="#SHOES"><button class="comic-button">Shop Now</button></a>
  </div>
</div>
<!----TWO---->
<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
  <img class="img-fluid" src="assets/images/SP_Jacket_-_Burgundy_1024x1024.webp" >
  <div class="details">
    <h2>Trendy Jacket</h2>
    <a href="#COATS"><button class="comic-button">Shop Now</button></a>
  </div>
</div>
<!----THREE---->
<div class="one col-lg-4 col-md-12 col-sm-12 p-0">
  <img class="img-fluid" src="assets/images/bag-featured.webp" >
  <div class="details">
    <h2>50% OFF Backpack </h2>
    <a href="#BAGS"><button class="comic-button">Shop Now</button></a>
  </div>
</div>
</div>
</section>

<!----Features---->
<section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
<h3>Our Featured</h3>
<hr>
<p>Here You Can Check Out Our Featured Products</p>
  </div>
  <div class="row mx-auto container-fluid">
     <!--PHP CODE--->
     <?php include('Server/get_featured_products.php');?>

     <?php    
     while($row = $featured_products ->fetch_assoc()){ ?> 

    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/<?php echo $row['product_image']; ?>">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
      <h4 class="p-price"><?php echo $row['product_price']; ?>L.E</h4>
      <a  href="<?php echo"single_product.php?product_id=".$row['product_id'];?>" > 
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </a>
    </div>
 
    <?php } ?>

  </div>
</section>

<!----Banner---->
<section id="banner" class="my-5 py-5">
<div class="container">
<h4>MID SEASONS SALE</h4>
<h1>Autumn Collection <br>UP to 30% OFF </h1>
<a href="shop.php"><button>SHOP NOW</button></a>

</div>
</section>

<!----Clothes---->
<section id="featured" class="my-5">
  <div class="container text-center mt-5 py-5" id="COATS">
<h3>Jackets & Coats</h3>
<hr>
<p>Here You Can Check Out Our Amazing New Clothes</p>
  </div>
  <div class="row mx-auto container-fluid">
    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/coat1.jpg">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name">Sports Shoes</h5>
      <h4 class="p-price">550 L.E</h4>
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </div>

    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/coat2.webp">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name">Girl Hooded Faux Fur Long Jacket</h5>
      <h4 class="p-price">850 L.E</h4>
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </div>

    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/coat3.webp">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name">Backpack</h5>
      <h4 class="p-price">350 L.E</h4>
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </div>

    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/coat4.jpg">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name">Oversize Fit Sweatshirt</h5>
      <h4 class="p-price">499 L.E</h4>
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </div>



  </div>
</section>

<!----Shoes---->
<section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5" id="SHOES" >
<h3>SHOES</h3>
<hr>
<p>Here You Can Find Out Good Shoes</p>
  </div>
  <div class="row mx-auto container-fluid">
     <!--PHP CODE--->
     <?php include('Server/get_shoes_products.php');?>

     <?php    
     while($row = $shoes_products ->fetch_assoc()){ ?> 

    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/<?php echo $row['product_image']; ?>">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
      <h4 class="p-price"><?php echo $row['product_price']; ?>L.E</h4>
      <a  href="<?php echo"single_product.php?product_id=".$row['product_id'];?>" > 
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </a>
    </div>
 
    <?php } ?>

  </div>
</section>


<!----Backpacks---->
<section id="featured" class="my-5">
  <div class="container text-center mt-5 py-5" id="BAGS" >
<h3>Backpacks</h3>
<hr>
<p>Check Out Our New Collection</p>
  </div>
  <div class="row mx-auto container-fluid">
    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/bag1.jpg">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name">Sunflowers 70s vintage golden retro pattern, yellow and orange flowers Backpack</h5>
      <h4 class="p-price">550 L.E</h4>
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </div>

    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/bag2.jpg">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name">White Daisies on Blue Seamless Pattern Print Backpack</h5>
      <h4 class="p-price">660 L.E</h4>
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </div>

    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/bag3.jpg">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name">Night Fields of happy - Colorful Floral Pattern Backpack</h5>
      <h4 class="p-price">350 L.E</h4>
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </div>

    <div class="products text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid " src="assets/images/bag4.jpg">
      <div class="star">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <h5 class="p-name">Flower Power Retro Style Hippy Flowers Backpack</h5>
      <h4 class="p-price">499 L.E</h4>
      <div class="scene">
        <div class="cube">
          <span class="side top">NOW</span>
          <span class="side front">BUY</span>
        </div>
      </div>
    </div>



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