<?php
session_start();
include_once './templates/sidebar.php';
include_once("./templates/top.php");
include_once("./templates/navbar.php");

?>

<div class="container-fluid">
    <div class="row">
        <?php
        include('../Server/connection.php');

        if (!isset($_SESSION['admin_logged_in'])) {
            header('location: login.php');
            exit();
        }

        // Check if product_id is set in the request for deletion
        if (isset($_POST['delete_product']) && isset($_POST['product_id'])) {
            $product_id = $_POST['product_id'];

            // Prepare and execute the DELETE query
            $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
            $stmt->bind_param('i', $product_id);

            if ($stmt->execute()) ;

            $stmt->close();
        }

        // Fetch and display the list of products
        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();
        $products = $stmt->get_result();
        ?>

        <div class="row">
            <div class="col-10">
                <h1 style="font-family: Lobster;">Products</h1>
            </div>
        </div>

        <?php if (isset($_GET['deleted_successfully'])) : ?>
            <p class="text-center" style="color: green;"><?php echo $_GET['deleted_successfully']; ?></p>
        <?php endif; ?>

        <?php if (isset($_GET['deleted_failure'])) : ?>
            <p class="text-center" style="color: red;"><?php echo $_GET['deleted_failure']; ?></p>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
    <p style="color: red;"><?php if (isset($_GET['error'])) {echo $_GET['error'];} ?></p>
    <p style="color: green;"><?php if (isset($_GET['message'])) {echo $_GET['message'];} ?></p>
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Offer</th>
                        <th>Product Category</th>
                        <th>Product Color</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($row = $products->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['product_id']; ?></td>
                            <td><img src="../assets/images/<?php echo $row['product_image']; ?>" style="width: 70px; height: 70px; " /></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['product_price'] . "L.E"; ?></td>
                            <td><?php echo $row['product_special_offer'] . "%"; ?></td>
                            <td><?php echo $row['product_category']; ?></td>
                            <td><?php echo $row['product_color']; ?></td>
                            <td><!-- Edit Button --></td>
                            <td>
                                <!-- Form with a delete button for each product -->
                                <form method="post" action="">
                                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                    <button type="submit" name="delete_product" class="btn btn-danger" >Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
