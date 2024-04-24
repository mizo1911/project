<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
<?php include "./templates/sidebar.php"; ?>

<?php
$admin_email = isset($_SESSION['admin_email']) ? $_SESSION['admin_email'] : '';

include('../Server/connection.php');
if(!isset($_SESSION['admin_logged_in'])){
header('location:login.php');
exit;
}

if(isset ($_GET['logout'])) {
if(isset($_SESSION['admin_logged_in'])){
unset($_SESSION['admin_logged_in']);
unset($_SESSION['admin_name']);
unset($_SESSION['admin_email']);
header('location:login.php');
exit;
  }
}
?>




<h3 class="font-weight-bold text-center" style="font-family: Lobster; ">Account info</h3>
<hr style="background-color:dodgerblue; height: 3px; width: 350px;" >
<div class="account-info text-center ">           <!--for double protection-->
    <h5>Name: <span><?php  if(isset( $_SESSION['admin_name'])){ echo $_SESSION['admin_name'];} ?></span></h5>
    <h5>Email: <span><?php if(isset( $_SESSION['admin_email'])){ echo $_SESSION['admin_email'];} ?></span></h5>
</div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
    <form class="account-form" method="post" action="admin_account.php" >
    <p style="color: red;"><?php if (isset($_GET['error'])) {echo $_GET['error'];} ?></p>
    <p style="color: green;"><?php if (isset($_GET['message'])) {echo $_GET['message'];} ?></p>
