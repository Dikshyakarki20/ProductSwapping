
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Recycle House - Category</title>
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
<style>
.card-img {
  width: 250px;
  height: 250px
}
</style>  
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
					<h1>Automobiles Category</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Automobiles Category</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->


	<!-- ================ category section start ================= -->		  
  <section class="section-margin--small mb-5">
    <div class="container">
    
          <!-- End Filter Bar -->
          <!-- Start Best Seller -->
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">
              
                  <?php
                  include('connection.php');
            $stmt= "SELECT * FROM products where category = 'Automobiles' ";
      $qry=mysqli_query($conn,$stmt);
      $count=mysqli_num_rows($qry);
    while($row=mysqli_fetch_array($qry))
    {
                $productname= $row["productname"];
                $price= $row["price"];
                $category= $row["category"];
                $image= $row["image"];

    $id= $row['pid'];
                  echo "<div class='col-md-6 col-lg-3'>
                <div class='card text-center card-product'>
                  <div class='card-product__img'>
                    <img class='card-img' src='uploads/$image' alt=''>
                   
                  </div>
                  <div class='card-body'>
                    <p>$category</p>
                    <h4 class='card-product__title'><a href='singleproduct.php?id=$id'>$productname</a></h4>
                    <p class='card-product__price'>Rs. $price</p>
                  </div>  </div>
              </div>";
                }
                ?>

              
              
            </div>
          </section>
          <!-- End Best Seller -->
        </div>
     
  </section>
	

  <!--================ Start footer Area  =================-->	
 <?php include "footer.php"; ?>