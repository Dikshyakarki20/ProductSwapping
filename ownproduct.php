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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Recycle Shop - Product Details</title>
	<link rel="icon" href="img/logo(2).png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
      <?php include "sesionnav.php"; ?>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->
	
	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="blog">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Product Detail</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="main.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->


  <!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="owl-carousel owl-theme s_Product_carousel">
						
						<?php
						$id= $_GET["id"];
						 include('connection.php');
						$stmt= "SELECT * FROM products where pid = $id ";
      $qry=mysqli_query($conn,$stmt);
      $count=mysqli_num_rows($qry);
   if($row=mysqli_fetch_array($qry))
    {
    						$productname= $row["productname"];
    						$price= $row["price"];
    						$category= $row["category"];
    						$desc= $row["description"];
    						$status= $row["status"];
    						$size= $row["size"];
    						$gender= $row["gender"];
    						$con= $row["pcondition"];
    						$area= $row["area"];
    						$exchange= $row["exchange"];
    						$image= $row["image"];

    							ECHO "<div class='single-prd-item'>
							<img class='img-fluid' src='uploads/$image' alt=''>
						</div>
					
					</div>
				</div>
				<div class='col-lg-5 offset-lg-1'>
					<div class='s_product_text'>
						<h3> $productname </h3>
						<h2>Rs. $price</h2>
						<ul class='list'>
							<li><a class=' active'><span>Category</span> : $category</a></li>
							<li><a class=' active'><span>Status</span> : $status</a></li>
							<li><a class=' active'><span>Size</span> : $size</a></li>
							<li><a class=' active'><span>Gender</span> : $gender</a></li>
							<li><a class=' active'><span>Condition</span> : $con</a></li>
							<li><a class=' active'><span>Deliver Area</span> : $area</a></li>
							<li><a class=' active'><span>Exchange for</span> : $exchange</a></li>
							
						</ul>
						<p>$desc</p>
						<div class='product_count'>
            
							<button type='button' ><i class='ti-angle-right'></i></button>
							<a class='button primary-btn' href=editproduct.php?id=$id> Edit</a>  
							<button type='button' ><i class='ti-angle-right'></i></button> 
							<a class='button primary-btn' href=deleteproducts.php?id=$id> Delete</a>                
						</div>
						";
					}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	  <?php include "footer.php"; ?>