
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
<style>
.card-img {
  width: 250px;
  height: 400px
}
.cards-img {
  width: 250px;
  height: 300px
}
.img-fluid{
   width: 250px;
  height: 300px
}
</style>  
<body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
         <?php include "navbar.php"; ?>
    </div>
  </header>
  <!--================ End Header Menu Area =================-->
  <div id="slider">
  <div id="bannerslider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#bannerslider" data-slide-to="0" class="active"></li>
    <li data-target="#bannerslider" data-slide-to="1"></li>
    <li data-target="#bannerslider" data-slide-to="2"></li>
    <li data-target="#bannerslider" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/banner1.png" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="img/banner2.png" class="d-block w-100">
    </div>
   <div class="carousel-item">
      <img src="img/banner3.png" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="img/banner4.png" class="d-block w-100">
    </div>
  </div>
  <a class="carousel-control-prev" href="#bannerslider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#bannerslider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>


    <!--================ Hero Carousel start =================-->
    <section class="section-margin mt-0">
      <div class="owl-carousel owl-theme hero-carousel">
      <?php  
          include('connection.php');
       $stmt= "SELECT * FROM products where pid = '2' ";
      $qry=mysqli_query($conn,$stmt);
      $count=mysqli_num_rows($qry);
    while($row=mysqli_fetch_array($qry))
    {
       $productname= $row["productname"];
 $category= $row["category"];
$image= $row["image"];
        echo "<div class='hero-carousel__slide'>
          <img src='uploads/$image' alt='' class='card-img'>
          <a href='clothing1.php' class='hero-carousel__slideOverlay'>
            <h3>$productname</h3>
            <p>$category</p>
          </a>
        </div>";
      }
      ?>

        <?php  
          include('connection.php');
       $stmt= "SELECT * FROM products where pid = '3' ";
      $qry=mysqli_query($conn,$stmt);
      $count=mysqli_num_rows($qry);
    while($row=mysqli_fetch_array($qry))
    {
       $productname= $row["productname"];
 $category= $row["category"];
$image= $row["image"];
        echo "<div class='hero-carousel__slide'>
          <img src='uploads/$image' alt='' class='card-img'>
          <a href='electronics1.php' class='hero-carousel__slideOverlay'>
            <h3>$productname</h3>
            <p>$category</p>
          </a>
        </div>";
      }
      ?>
       <?php  
          include('connection.php');
       $stmt= "SELECT * FROM products where pid = '5' ";
      $qry=mysqli_query($conn,$stmt);
      $count=mysqli_num_rows($qry);
    while($row=mysqli_fetch_array($qry))
    {
       $productname= $row["productname"];
 $category= $row["category"];
$image= $row["image"];
        echo "<div class='hero-carousel__slide'>
          <img src='uploads/$image' alt='' class='card-img'>
          <a href='auto1.php' class='hero-carousel__slideOverlay'>
            <h3>$productname</h3>
            <p>$category</p>
          </a>
        </div>";
      }
      ?>
      </div>
    </section>
    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->  
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Todays Item in the market</p>
          <h2>Trending <span class="section-intro__style">Product</span></h2>
        </div>
        <div class="row">

          <?php  
          include('connection.php');
       $stmt= "SELECT * FROM products where entered_date  BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()  LIMIT 0,8";
      $qry=mysqli_query($conn,$stmt);
      $count=mysqli_num_rows($qry);
    while($row=mysqli_fetch_array($qry))
    {
      $id=$row['pid'];
       $productname= $row["productname"];
 $category= $row["category"];
 $price= $row['price'];
$image= $row["image"];
        echo "<div class='col-md-6 col-lg-4 col-xl-3'>
            <div class='card text-center card-product'>
              <div class='card-product__img'>
                <img class='cards-img' src='uploads/$image' alt=''>
                
              </div>
              <div class='card-body'>
                <p>$category</p>
                <h4 class='card-product__title'><a href='singleproduct.php?id=$id'>$productname</a></h4>
                <p class='card-product__price'>Rs . $price</p>
              </div>
            </div>
          </div>";
      }
      ?>
          
          
          
          
         
          
          
        </div>
      </div>
    </section>
    <!-- ================ trending product section end ================= -->  


    <!-- ================ offer section start ================= --> 
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
      <div class="container">
        <div class="row">
          <div class="col-xl-5">
            <div class="offer__content text-center">
              <h3>SWAP YOUR PRODUCT</h3>
            
          
              <a class="button button--active mt-3 mt-xl-4" href="category1.php">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ offer section end ================= --> 

    <!-- ================ Best Selling item  carousel ================= --> 
        <!-- ================ Best Selling item  carousel ================= --> 
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular Item in the market</p>
          <h2>Best <span class="section-intro__style">Sellers</span></h2>
        </div>
        <div class="owl-carousel owl-theme" id="bestSellerCarousel">

          <?php
           include('connection.php');

            $stmst= "SELECT * FROM comments where rating > 3";
      $qrys=mysqli_query($conn,$stmst);
      $counts=mysqli_num_rows($qrys);
    while($row=mysqli_fetch_array($qrys))
    {

      $pid= $row['pid'];

       $stmt= "SELECT * FROM products where pid= $pid";
      $qry=mysqli_query($conn,$stmt);
      $count=mysqli_num_rows($qry);
    while($row=mysqli_fetch_array($qry))
    {
      $id=$row['pid'];
       $productname= $row["productname"];
 $category= $row["category"];
 $price= $row['price'];
$image= $row["image"];

      echo  ' <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="img-fluid" src="uploads/'.$image. '" alt="">
             
            </div>
            <div class="card-body">
              <p>'.$category. '</p>
              <h4 class="card-product__title"><a href="singleproduct.php?id='.$id. '">'. $productname. '</a></h4>
              <p class="card-product__price">' .$price.' </p>
            </div>
          </div>';
        }
      }
      ?>

         

         

         

         

        
         
        </div>
      </div>
    </section>
    <!-- ================ Best Selling item  carousel end ================= --> 

    <!-- ================ Blog section start ================= -->  
   
    <section class="subscribe-position">
      <div class="container">
        <div class="subscribe text-center">
          <h3 class="subscribe__title">Swap Your Products From Any Where</h3>
          <p>Get the item you need and swap the item you dont need.</p>
         
        </div>
      </div>
    </section>
    <!-- ================ Subscribe section end ================= --> 

    

  </main>


  <?php include "footer.php"; ?>