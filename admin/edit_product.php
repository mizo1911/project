<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<?php include "./templates/sidebar.php";  ?>

<?php  
include('../Server/connection.php');

 /*if($_POST['edit_btn']){
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_name'];
    $product_color = $_POST['product_name'];


    $stmt = $conn->prepare("UPDATE products SET user_password=? WHERE user_email=? ");
    $stmt->bind_param('ss',$password,$user_email);
 }
*/
?>

<div class="row">
      	<div class="col-10">
      		<h1 style="font-family: Lobster; ">Edit Product</h1>
      	</div>
      </div>

      <div class="modal-body">
        <form id="edit-product-form" method="POST" action="edit_product.php" >
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="e_product_name" class="form-control"  placeholder="Enter Product Name">
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Category</label>
                <select class="form-control category_list" name="e_category_id">
                  <option value="">Select Category</option>
                  <option value="">Shoes</option>
                  <option value="">Jackets</option>
                  <option value="">Bags</option>
                </select>
              </div>
            </div>

      
            <div class="col-12">
              <div class="form-group">
                <label>Product Price</label>
                <input type="number" name="e_product_price" class="form-control" placeholder="Enter Product Price">
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Color</label>
                <textarea class="form-control" name="e_product_desc" placeholder="Enter product color"></textarea>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Special Offer/Sale</label>
                <textarea class="form-control" name="e_product_desc"  placeholder="Sale%"></textarea>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Product Image</label>
                <input type="file" name="e_product_image" class="form-control">
              </div>
            </div>

            <div class="col-12">
              <input type="submit" name="edit_btn" class="btn btn-primary" value="Edit Product"/>
            </div>
          </div>
       
        </form>
      </div>
