<?php
session_start();
   if(!isset($_SESSION['admin'])){

      header('Location:login.php');
 }

?>

<?php

if (isset($_POST['submit']))

{
 
$productname=$_POST['pname'];
$description=$_POST['description'];
$cate=$_POST['category'];
$status=$_POST['status'];
$gender=$_POST['gender'];
$sizes= $_POST['sizes'];
$condition = $_POST['conditon'];
$price = $_POST['price'];
$area = $_POST['area'];
$inexchange = $_POST['inexchange'];
$tempname=$_FILES['profilepic']['tmp_name'];
$name=$_FILES['profilepic']['name'];
$size=$_FILES['profilepic']['size'];
$type=$_FILES['profilepic']['type'];



    $username= $_SESSION['username'];
    include('connection.php');
    $sql_u = "SELECT * FROM users WHERE username='$username'";
    
    $res_u = mysqli_query($conn, $sql_u);
   
$count=mysqli_num_rows($res_u);
  if($row=mysqli_fetch_array($res_u))
    {
     $id = $row['id'];
    
   
   
if($type=='images/jpeg' OR $type=='images/jpg' OR $type=='images/png' OR $type='images/gif' AND $size<= 1048575){

  $stmt="INSERT INTO  products (productname , description ,  category,  status , gender,  size , pcondition,  price  , area , exchange  ,image,   uid ,entered_date ) VALUES ('$productname', '$description', '$cate', '$status','$gender ', '$sizes','$condition','$price','$area','$inexchange', '$name','$id' ,SYSDATE() )";
echo $stmt ;

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
  
     echo "<script type='text/javascript'>window.location.href='allproduct.php';</script>";


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
  <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Recycle House - Home</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<!-- JS, Popper.js, and jQuery -->

  
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
         <?php include "sesionnav.php"; ?>
    </div>
  </header>

	<!--================ End Header Menu Area =================-->
  <section class="blog-banner-area" id="category">
    <div class="container h-100">
      <div class="blog-banner">
        <div class="text-center">
          <h1>Add Product</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="main.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <div class="card">
  <div class="card-body" style="margin-left: 50px; margin-right: 50px;">
    <h1 align="center"> Add your product </h1>
  <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-row">

    <div class="form-group col-md-6">
           <label for="inputState">Product Name</label>
      <input type="text" class="form-control" placeholder="Product Name" required="required" name="pname">
    </div>
     <div class="form-group col-md-6">
           <label for="inputState">Product Description</label>
      <input type="text" class="form-control" placeholder="Product Description" required="required" name="description">
    </div>
   <div class="form-group col-md-6">
      <label for="inputState">Category</label>
      <select id="inputState" class="form-control"  name="category" required="required">
      
        <option value="Clothing">Clothing</option>
            <option value="Electronics">Electronics</option>
            <option value="Automobiles">Automobiles</option>
            <option value="Home Appliances">Home Appliances</option>
            <option value="others">Others</option>

      </select>
    </div>
   <div class="form-group col-md-6">
      <label for="inputState">Status</label>
      <select id="inputState" class="form-control"  name="status" required="required">
      
        <option value="Used">Used</option>
            <option value="Un-Used">Un-Used</option>
           

      </select>
    </div>
   <div class="form-group col-md-6">
      <label for="inputState">For which Gender</label>
      <select id="inputState" class="form-control"  name="gender" required="required">
      
        <option value="Male">Male</option>
            <option value="FeMale">Fe-Male</option>
            <option value="Children">Children</option>
             <option value="All">All</option>
           

      </select>
    </div>
    <div class="form-group col-md-6">
           <label for="inputState">Size </label>
      <input type="text" class="form-control" placeholder="Size" required="required" name="sizes">
    </div>
     <div class="form-group col-md-6">
      <label for="inputState">Product Condtion </label>
      <select id="inputState" class="form-control"  name="conditon" required="required">
      
        <option value="Good">Good</option>
            <option value="Average">Average</option>
            <option value="Poor">Poor</option>
           

      </select>
    </div>
    <div class="form-group col-md-6">
           <label for="inputState">Price</label>
      <input type="text" class="form-control" placeholder="Price" required="required" name="price">
    </div>
    <div class="form-group col-md-6">
           <label for="inputState">Delivery Area</label>
      <input type="text" class="form-control" placeholder="Area Name" required="required" name="area">
    </div>
    
    <div class="form-group col-md-6">
           <label for="inputState">In exchange</label>
      <input type="text" class="form-control" placeholder="Exchange" required="required" name="inexchange">
    </div>
    <div class="col-md-12 form-group">
              Product Picture <input type="file" name="profilepic" required="required" class="btn btn-success">
            </div>

  <button type="submit" class="btn btn-primary" name="submit">Add Data</button>
</div>
</form>

    </div>
  </div>
	  <?php include "footer.php"; ?>

