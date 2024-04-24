<?php
$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';

session_start();
//check whether the post parameter is empty or not ,whether the user came to this form or not
if(isset($_POST['add_to_cart'])){
  
    //if user has already added a product to cart
    if(isset($_SESSION['cart'])){
   
        $product_array_ids =array_column($_SESSION['cart'],"product_id"); //this will return all products ids
        //check if product has already been added t cart or not
         if(!in_array($_POST['product_id'], $product_array_ids )){
            
            $product_array = $_POST['product_id'];

            $product_array = array(
              'product_id' => $_POST['product_id'],
              'product_name' => $_POST['product_name'],
              'product_price' => $_POST['product_price'],
              'product_image' => $_POST['product_image'],
              'product_quantity' => $_POST['product_quantity']
          );
          
          $_SESSION['cart'][$product_array['product_id']] = $product_array;
          

         } 
       //product has already been added
         else{
            echo '<script> alert("Product was already added to the cart"); </script>';
         }

        
    }
    //if this is the first product
   else{

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_image = $_POST['product_image'];
$product_quantity= $_POST['product_quantity'];

$product_array = array(

    'product_id'=> $product_id,
    'product_name'=> $product_name,
    'product_price' => $product_price,
    'product_image' => $product_image,
    'product_quantity' => $product_quantity
); 

$_SESSION['cart'][$product_id ]= $product_array;
//[ the unique key is the($product_id )and the value is the array itself... 2=>[array that contains the info about that specific product]  3=>[]  4=>[]   ]

    }
    //calculate Total Cart()
    calculateTotalCart();

//remove product from cart
} elseif(isset($_POST['remove_product'])){
  $product_id = $_POST['product_id'];

unset($_SESSION['cart'][$product_id]);

    //calculate Total Cart()
    calculateTotalCart();
}
elseif(isset($_POST['edit_quantity'])){
  //we get id & quantity from the form
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
 // get the product array from the session
    $product_array = $_SESSION['cart'][$product_id];
    //update product quantity
    $product_array['product_quantity'] = $product_quantity;
    //return array back its place
    $_SESSION['cart'][$product_id] = $product_array;

        //calculate Total Cart()
        calculateTotalCart();

}else{

    
   // header('location:index.php');
}


function calculateTotalCart(){
    $total =0;

    foreach($_SESSION['cart'] as $key => $value) {

        $product =$_SESSION['cart'][$key];
        $price = $product['product_price'];
        $quantity =$product['product_quantity'];
        $total=  $total + ($price * $quantity );
    }
    $_SESSION ['total'] =  $total;
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

<!-----cart------>

<section class="cart container my-5 py-5">
<div class="container mt-5">
    <h2 class="font-weight-bold">Your Cart</h2>
    <hr>
</div>
 
<table class="mt-5 pt-5">
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>SubTotal</th>
    </tr> 

<?php  if(isset($_SESSION['cart'])) { ?>    

<?php foreach($_SESSION['cart'] as $key => $value) { 
    //key is the product_id the value is the array?>

    <tr>
        <td>
            <div class="product-info">
                <img src="assets/images/<?php echo $value['product_image']; ?>">
                <div>
                    <p> <?php echo $value['product_name']; ?></p>
                    <small><span><?php echo $value['product_price']; ?></span>L.E</small>
                    <br>
                    <form method="POST" action="cart.php"> 
                    <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />
                    <input type="submit" name="remove_product" class="remove-btn" value="remove"/>
                    </form>
                </div>
            </div>
        </td>
        <td>
           <form method="POST" action="cart.php"> 
            <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />   
            <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>">
            <input type="submit" class="edit-btn" value="edit" name="edit_quantity"/>
            </form>
            
        </td>
        <td>
        <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price']; ?></span>
            <span>L.E</span>
        </td>
    </tr>

   

<?php } ?>
<?php } ?>

</table>

<div class="cart-total">
    <table>
<tr>
    <td>Total</td>
    <?php  if(isset($_SESSION['cart'])) { ?>    

    <td><?php echo  $_SESSION ['total']; ?>L.E</td>
    <?php } ?>

</tr>
 </table>
</div>


<div class="checkout-container">
  <form method="post" action="checkout.php">
  <input   type="submit" class="btn btn-primary " value="Checkout" name="checkout"/>
  </div>
  </form>
 

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