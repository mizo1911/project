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

<!----Man Section---->
<section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
  <h3>Men's Jackets & Coats</h3>
  <hr>
  <p> Check Out Our New Products</p>
    </div>
    <div class="row mx-auto container-fluid">

  
     <!--PHP CODE--->
     <?php include('Server/get_shope_products.php');?>

     <?php    
     while($row = $shope_products ->fetch_assoc()){ ?> 

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

<!----Kid Section---->
<section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
  <h3>Kids Coats</h3>
  <hr>
  <p>Here You Can Find Nice Coat</p>
    </div>
    <div class="row mx-auto container-fluid">
      <div class="products text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid " src="assets/images/kid1.jpg">
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <h5 class="p-name">Kids Boys Girls Winter Fur Hooded Parka Coat Padded Warm Down Jacket Outwear Red</h5>
        <h4 class="p-price">800 L.E</h4>
        <div class="scene">
          <div class="cube">
            <span class="side top">NOW</span>
            <span class="side front">BUY</span>
          </div>
        </div>
      </div>
  
      <div class="products text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid"src="assets/images/kid2.webp">
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <h5 class="p-name">Winter Hooded Boy & Girls Winter Jacket Middle and Small Kids' Jacket Cold proof Cotton Jacket 3-10 Year
        </h5>
        <h4 class="p-price">850 L.E</h4>
        <div class="scene ">
          <div class="cube">
            <span class="side top">NOW</span>
            <span class="side front">BUY</span>
          </div>
        </div>
      </div>
  
      <div class="products text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid " src="assets/images/kid3.webp">
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <h5 class="p-name">Cotton-padded Jacket Ears Coat Animal Print Baby Boy Coat Girls Winter Jackets</h5>
        <h4 class="p-price">750 L.E</h4>
        <div class="scene">
          <div class="cube">
            <span class="side top">NOW</span>
            <span class="side front">BUY</span>
          </div>
        </div>
      </div>
  
      <div class="products text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid " src="assets/images/kid4.jpg">
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <h5 class="p-name">Baby Boys Hooded Jackets Winter Warm Thick Plus Velvet Jacket Girls Toddler Kid Coats </h5>
        <h4 class="p-price">699 L.E</h4>
        <div class="scene">
          <div class="cube">
            <span class="side top">NOW</span>
            <span class="side front">BUY</span>
          </div>
        </div>
      </div>
  
  
  
    </div>
  </section>

<!----Boots Section---->
<section id="featured" class="my-5">
    <div class="container text-center mt-5 py-5">
  <h3>Boots</h3>
  <hr>
  <p>Check Out Our New Collection</p>
    </div>
    <div class="row mx-auto container-fluid">
      <div class="products text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid "src="assets/images/boot1.webp">
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <h5 class="p-name">Louis Vuitton Calfskin Chain Outlaw Boots</h5>
        <h4 class="p-price">1050 L.E</h4>
        <div class="scene">
          <div class="cube">
            <span class="side top">NOW</span>
            <span class="side front">BUY</span>
          </div>
        </div>
      </div>
  
      <div class="products text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid " src="assets/images/boot2.jpg">
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <h5 class="p-name">Shiny Suede leather kids ankle boot shoes with GLITTER elastic band and zipper closure.</h5>
        <h4 class="p-price">660 L.E</h4>
        <div class="scene">
          <div class="cube">
            <span class="side top">NOW</span>
            <span class="side front">BUY</span>
          </div>
        </div>
      </div>
  
      <div class="products text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid " src="assets/images/boot3.jpg">
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <h5 class="p-name">Lady 31.796 Ankle Boots - Black Leather</h5>
        <h4 class="p-price">1150 L.E</h4>
        <div class="scene">
          <div class="cube">
            <span class="side top">NOW</span>
            <span class="side front">BUY</span>
          </div>
        </div>
      </div>
  
      <div class="products text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid " src="assets/images/boot4.webp">
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <h5 class="p-name">Men's Suede Engineer Motorcycle Boots</h5>
        <h4 class="p-price">999 L.E</h4>
        <div class="scene">
          <div class="cube">
            <span class="side top">NOW</span>
            <span class="side front">BUY</span>
          </div>
        </div>
      </div>
  
  <nav aria-label="page navigation example">
<ul class="pagination mt-5">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>

</ul>

  </nav>
  
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


</body>
</html>