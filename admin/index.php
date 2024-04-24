<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php
    include "./templates/sidebar.php"; 
	include('../Server/connection.php');

	if(!isset($_SESSION['admin_logged_in'])){
		header('location: login.php');
		exit();
		}

	$stmt = $conn->prepare("SELECT * FROM orders");
	$stmt->execute();
	$orders = $stmt->get_result();


	?>

      <div class="row">
      	<div class="col-10">
      		<h1 class="text-center" style="font-family: Lobster; " >Dashboard</h1>
          <hr style="background-color: deepskyblue; height: 3px; width: 550px;" >
          <h2 style="font-family: Lobster;">Orders</h2>

      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Order Id</th>
              <th>Order Status</th>
              <th>User Id</th>
              <th>Order Date</th>
              <th>User Phone</th>
              <th>User Address</th>
              <th>Edit</th>
			  <th>Delete</th>
            </tr>
          </thead>
          <tbody>

		 <?php   while ($row = $orders->fetch_assoc()) { ?>
<tr>
	<td>
        <span><?php echo isset($row['order_id']) ? $row['order_id'] : ''; ?></span>
    </td>

    <td>
        <span><?php echo isset($row['order_status']) ? $row['order_status'] : ''; ?></span>
    </td>

    <td>
        <span><?php echo isset($row['user_id']) ? $row['user_id'] : ''; ?></span>
    </td>

	<td>
        <span><?php echo isset($row['order_date']) ? $row['order_date'] : ''; ?></span>
    </td>
    
	<td>
        <span><?php echo isset($row['user_phone']) ? $row['user_phone'] : ''; ?></span>
    </td>

    <td>
        <span><?php echo isset($row['user_address']) ? $row['user_address'] : ''; ?></span>
    </td>

	<td><a class="btn btn-primary" >Edit</a> </td>
	<td><a class="btn btn-danger" >Delete</a> </td>

	</tr>
<?php }?>
          
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



