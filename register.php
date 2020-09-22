<?php

if (isset($_POST['submit']))

{
 
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$password1=md5($_POST['confirmPassword']);
$address=$_POST['location'];
$phonenumber = $_POST['number'];
$tempname=$_FILES['profilepic']['tmp_name'];
$name=$_FILES['profilepic']['name'];
$size=$_FILES['profilepic']['size'];
$type=$_FILES['profilepic']['type'];
 include('connection.php');



  	$sql_u = "SELECT * FROM users WHERE username='$username'";
  	$sql_e = "SELECT * FROM users WHERE email='$email'";
  	$res_u = mysqli_query($conn, $sql_u);
  	$res_e = mysqli_query($conn, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... username already taken"; 	
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already taken"; 	
  	}else if ($password!= $password1){
 echo "<script type='text/javascript'>alert('Invalid username or password');
window.location.href='register.php';
</script>";
 }else{

if($type=='images/jpeg' OR $type=='images/jpg' OR $type=='images/png' OR $type='images/gif' AND $size<= 1048575){
  $stmt="INSERT INTO  users ( firstname,lastname,username,email,password,repassword,address,phonenumber,image,status) VALUES ('$firstname', '$lastname', '$username', '$email','$password ', '$password1','$address','$phonenumber', '$name','0')";

 $qry=mysqli_query($conn,$stmt);

 
  if($qry){
    //making the folder if  not exist in script executions path
  $dir="uploads/";
  if (!file_exists($dir)&& !is_dir($dir)) {
    mkdir($dir);  
  
  }
  //making upload path and file name
  $uploadfull="$dir/$name";

  //uploaded folder
  $upload=move_uploaded_file($tempname, $uploadfull);

  //checking the file is uploaded or not
  if ($upload) {
  
     echo "<script type='text/javascript'>window.location.href='login.php';</script>";


  }

  else{
    echo "something is wrong";
  }
  }
}
}
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Recycle House - Register</title>
	<link rel="icon" href="img/logo(2).png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/nouislider/nouislider.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
           <?php include "navbar.php"; ?>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->
  
  <!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Register</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>Already have an account?</h4>
							<p>This is an advance way to swap the products that you dont need with the products that you are in need of.</p>
							<a class="button button-account" href="login.php">Login Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						<h3>Create an account</h3>
						 <form action="" method="POST" enctype="multipart/form-data">

							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="firstname" placeholder="firstname"  required="required">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="lastname" placeholder="lastname" required="required">
							</div>
							<div class="col-md-12 form-group" <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
								<input type="text" class="form-control" id="name" name="username" placeholder="Username"  required="required">
								 <?php if (isset($name_error)): ?>
	  	<span><?php echo $name_error; ?></span>
	  <?php endif ?>
							</div>
							<div class="col-md-12 form-group" <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
								<input type="text" class="form-control" id="email" name="email" placeholder="Email Address" required="required"><?php if (isset($email_error)): ?>
      	<span><?php echo $email_error; ?></span>
      <?php endif ?>
              </div>
              <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password"  required="required">
              </div>
              <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password"  required="required">
							</div>
							 <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="confirmPassword" name="location" placeholder="Address"  required="required">
							</div>
							 <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="confirmPassword" name="number" placeholder="Phone number" required="required">
							</div>
							<div class="col-md-12 form-group">
              Profile Picture <input type="file" name="profilepic" required="required">
            </div>
							<div class="col-md-12 form-group">
								 <input type="submit" class="btn btn-primary btn-block" name="submit" value="submit">
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--================End Login Box Area =================-->
       <?php include "footer.php"; ?>
