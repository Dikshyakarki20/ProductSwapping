	<?php
session_start();
   if(!isset($_SESSION['admin'])){

      header('Location:login.php');
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Recycle House - Home</title>
  <link rel="icon" href="img/logo(2).png" type="image/png">
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
          <h1>Your Product</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="main.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Your  Product</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <section class="related-product-area">
		<div class="container">
			<div class="section-intro pb-60px">
       
        <h2>Your <span class="section-intro__style">Product</span></h2>
      </div>
			<div class="row mt-30">
        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <h5>Automobiles</h5>
            <?php 
             $username= $_SESSION['username'];
              include('connection.php');
    $sql_u = "SELECT * FROM users WHERE username='$username'";
    
    $res_u = mysqli_query($conn, $sql_u);
   
$count=mysqli_num_rows($res_u);
  if($row=mysqli_fetch_array($res_u))
    {
     $id = $row['id'];
     $stmt= "SELECT * FROM products where uid = $id and category= 'Automobiles'";
      $qry=mysqli_query($conn,$stmt);
      $count=mysqli_num_rows($qry);
   while($row=mysqli_fetch_array($qry))
    {


            $image = $row["image"];
            $price = $row["price"];
            $pname= $row["productname"];
            $id= $row["pid"];
            echo " <div class='single-search-product d-flex' >
              <a href='ownproduct.php?id=$id'><img src='uploads/$image' alt=''></a>
              <div class='desc'>
                  <a href='ownproduct.php?id=$id' class='title'>$pname</a>
                  <div class=' price' >Rs.  $price</div>
              </div>
            </div>";
          }
        }
        ?>

            
            
          </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <h5>Clothing</h5>
            <?php 
             $username= $_SESSION['username'];
              include('connection.php');
    $sql_u = "SELECT * FROM users WHERE username='$username'";
    
    $res_u = mysqli_query($conn, $sql_u);
   
$count=mysqli_num_rows($res_u);
  if($row=mysqli_fetch_array($res_u))
    {
     $id = $row['id'];
     $stmt= "SELECT * FROM products where uid = $id and category= 'Clothing'";
      $qry=mysqli_query($conn,$stmt);
      $count=mysqli_num_rows($qry);
   while($row=mysqli_fetch_array($qry))
    {


            $image = $row["image"];
            $price = $row["price"];
            $pname= $row["productname"];
             $id= $row["pid"];
            echo " <div class='single-search-product d-flex' >
              <a href='ownproduct.php?id=$id'><img src='uploads/$image' alt=''></a>
              <div class='desc'>
                  <a href='ownproduct.php?id=$id' class='title'>$pname</a>
                  <div class=' price' >Rs.  $price</div>
              </div>
            </div>";
          }
        }
        ?>
            
           
          </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
             <h5>Electronics</h5>
            <?php 
             $username= $_SESSION['username'];
              include('connection.php');
    $sql_u = "SELECT * FROM users WHERE username='$username'";
    
    $res_u = mysqli_query($conn, $sql_u);
   
$count=mysqli_num_rows($res_u);
  if($row=mysqli_fetch_array($res_u))
    {
     $id = $row['id'];
     $stmt= "SELECT * FROM products where uid = $id and category= 'Electronics'";
      $qry=mysqli_query($conn,$stmt);
      $count=mysqli_num_rows($qry);
   while($row=mysqli_fetch_array($qry))
    {


            $image = $row["image"];
            $price = $row["price"];
            $pname= $row["productname"];
             $id= $row["pid"];
            echo " <div class='single-search-product d-flex' >
              <a href='ownproduct.php?id=$id'><img src='uploads/$image' alt=''></a>
              <div class='desc'>
                  <a href='ownproduct.php?id=$id' class='title'>$pname</a>
                  <div class=' price' >Rs.  $price</div>
              </div>
            </div>";
          }
        }
        ?>
            
           
          </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
             <h5>Home Appliances And Others</h5>
            <?php 
             $username= $_SESSION['username'];
              include('connection.php');
    $sql_u = "SELECT * FROM users WHERE username='$username'";
    
    $res_u = mysqli_query($conn, $sql_u);
   
$count=mysqli_num_rows($res_u);
  if($row=mysqli_fetch_array($res_u))
    {
     $id = $row['id'];
     $stmt= "SELECT * FROM products where uid = $id and category IN ('Home Appliances', 'Others') ";
      $qry=mysqli_query($conn,$stmt);
      $count=mysqli_num_rows($qry);
   while($row=mysqli_fetch_array($qry))
    {


            $image = $row["image"];
            $price = $row["price"];
            $pname= $row["productname"];
             $id= $row["pid"];
            echo " <div class='single-search-product d-flex' >
              <a href='ownproduct.php?id=$id'><img src='uploads/$image' alt=''></a>
              <div class='desc'>
                  <a href='ownproduct.php?id=$id' class='title'>$pname</a>
                  <div class=' price' >Rs.  $price</div>
              </div>
            </div>";
          }
        }
        ?>
            
            
          </div>
        </div>
      </div>
		</div>
	</section>
    
    <?php include "footer.php"; ?>