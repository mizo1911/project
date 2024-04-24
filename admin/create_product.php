<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
    <div class="row">

        <?php include "./templates/sidebar.php"; ?>
        <?php
        include_once('../Server/connection.php');

        if (!isset($_SESSION['admin_logged_in'])) {
            header('location: login.php');
            exit();
        }

        if (isset($_POST['add_btn'])) {
            $product_name = $_POST['e_product_name'];
            $category_id = $_POST['e_category_id'];
            $product_price = $_POST['e_product_price'];
            $product_color = $_POST['e_product_color'];
            $special_offer = isset($_POST['e_product_special_offer']) ? $_POST['e_product_special_offer'] : 0;

            // Handle product image upload
            $targetDirectory = "../assets/images";
            $targetFile1 = $targetDirectory . '/' . basename($_FILES["e_product_image1"]["name"]);
            $targetFile2 = $targetDirectory . '/' . basename($_FILES["e_product_image2"]["name"]);
            $targetFile3 = $targetDirectory . '/' . basename($_FILES["e_product_image3"]["name"]);
            $targetFile4 = $targetDirectory . '/' . basename($_FILES["e_product_image4"]["name"]);

            if (
                move_uploaded_file($_FILES["e_product_image1"]["tmp_name"], $targetFile1) &&
                move_uploaded_file($_FILES["e_product_image2"]["tmp_name"], $targetFile2) &&
                move_uploaded_file($_FILES["e_product_image3"]["tmp_name"], $targetFile3) &&
                move_uploaded_file($_FILES["e_product_image4"]["tmp_name"], $targetFile4)
            ) {
                // File uploaded successfully, now insert product into the database
                $stmt = $conn->prepare("INSERT INTO products (product_name, product_category, product_price, product_color, product_special_offer, product_image, product_image2, product_image3, product_image4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param('sisdsssss', $product_name, $category_id, $product_price, $product_color, $special_offer, $targetFile1, $targetFile2, $targetFile3, $targetFile4);

                if ($stmt->execute()) {
                    // Product added successfully
                    // header('Location: products.php?add_success=true');
                    exit();
                } else {
                    // Error in adding product
                    header('Location: products.php?add_failure=true');
                    exit();
                }

                $stmt->close();
            } else {
                // File upload failed
                header('Location: products.php?upload_failure=true');
                exit();
            }
        }
        ?>

        <div class="row">
            <div class="col-10">
                <h1 style="font-family: Lobster;">Add New Product</h1>
            </div>
        </div>

        <div class="modal-body">
            <form id="edit-product-form" method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="e_product_name" class="form-control" placeholder="Enter Product Name">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control category_list" name="e_category_id">
                                <option value="">Select Category</option>
                                <option value="Shoes">Shoes</option>
                                <option value="Jackets">Jackets</option>
                                <option value="Bags">Bags</option>
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
                            <textarea class="form-control" name="e_product_color" placeholder="Enter product color"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Special Offer/Sale</label>
                            <textarea class="form-control" name="e_product_special_offer" placeholder="Sale%"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Product Image 1</label>
                            <input type="file" name="e_product_image1" class="form-control">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Product Image 2</label>
                            <input type="file" name="e_product_image2" class="form-control">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Product Image 3</label>
                            <input type="file" name="e_product_image3" class="form-control">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Product Image 4</label>
                            <input type="file" name="e_product_image4" class="form-control">
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="add_btn" class="btn btn-primary" value="Create" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
