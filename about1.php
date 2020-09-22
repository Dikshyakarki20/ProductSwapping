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
         <?php include "sesionnav.php";?>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->
<section class="blog-banner-area" id="category">
    <div class="container h-100">
      <div class="blog-banner">
        <div class="text-center">
          <h1>About</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">About</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

<div class="about-area2 section-padding30">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <!-- about-img -->
                        <div class="about-img">
                        	 <img src="img/Swap.jpg" class="image" width="500" height="600">
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-caption mb-50">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-35">
                                
                                <h2>What is Recycle House?</h2>
                       
                            </div>
                            <p class="pera-top">Recycle House is a fashionable way for you to trade your products with other online. You can add your products, took over other people's product, chat and exchange products in mutual understanding.</p>
                         
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        
<div class="about-low-area section-padding30">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-caption mb-50">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-35">
                              
                                <h2>Our Vision and Mission</h2>
                            </div>
                            <p> While Scrolling through social media feed, I found many people advising people about reusing their products and conducting different events like exchanging their clothes. From that the concept of developing this website came in my mind. It will be small step to save the environment.</p>
                            <p> Nowadays, Technology has enabled sharing economy.People are letting strangers inside their homes via Airbnb and are giving rides to strangers via Tootle and Pathao. So why can't we try  exchanging our unused product with strangers. This will be everyones small step to  save environment and exchange our unused product with something we need.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <!-- about-img -->
                        <div class="about-img ">
                            <img src="img/About2.jpeg" alt=""style="width:100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

<hr>
        <div class="container">
        	<div id="app1">
        		<h2 style="text-align: center;">How it works?</h2>
        	</div>
        	<img src="img/about1.png" class="image" style="display:block;margin:auto" width="800" height="533">

        </div>

    


  <!--================ Start footer Area  =================-->	
	 <?php include "footer.php"; ?>