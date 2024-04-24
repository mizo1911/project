
<?php
session_start();
include('../Server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
header('location: index.php');
exit;
}

if(isset($_POST['login-btn'])){

  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT admin_id,admin_name,admin_email,admin_password FROM admins WHERE admin_email=? AND admin_password=? LIMIT 1");
  $stmt->bind_param('ss',$email,$password);

  if ($stmt->execute()){
  $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
  $stmt->store_result();


if($stmt->num_rows()==1){
 $stmt->fetch();

 $_SESSION['admin_id']=$admin_id;
 $_SESSION['admin_name']=$admin_name;
 $_SESSION['admin_email']=$admin_email;
 $_SESSION['admin_logged_in'] =true;  
 header('location: index.php?login_success=logged in successfully');


}else{
  header('location: login.php?error= Could not verify your account');

}

  }else {
//error
header('location: login.php?error= Something went wrong');

  }

}


?>

<?php include "./templates/top.php"; ?>
<?php include "./templates/navbar.php"; ?>

<div class="mx-auto container">
	<div class="row justify-content-center" style="margin:100px 0;">
		<div class="col-md-4">
			<h4 class="text-center" style="font-family: Lobster;  font-size: 2rem; ">Admin Login</h4>
			<form id="admin-login-form" method="POST" action="login.php" enctype="multipart/form-data"  >
			<p style="color: red;" class="text-center" ><?php if (isset($_GET['error'])) {echo $_GET['error'];} ?></p>
			  <div class="form-group">
			    <label for="email">Email address</label>
			    <input type="email" class="form-control" name="email" id="email"  placeholder="Enter email">
			    
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
			  </div>

			  <input type="hidden" name="login-btn" value="1"> 
			  <input type="submit" class="btn btn-success login-btn" style="width: 100px;" name="login-btn" value="Login" >

			</form>
		</div>
	</div>
</div>






