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
  <title>Aroma Shop - Product Details</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/star.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<style type="text/css">
	.img-responsive{
width: 50px;
  height: 50px;
  border-radius: 50%;
	}

.checked {
  color: orange;
}

</style>

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
					<h1>Shop Single</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shop Single</li>
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
							$uid=$row["uid"];
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
						</ul>
						<p>$desc</p>
						<div class='product_count'>
            
							<button type='button' ><i class='ti-angle-right'></i></button>
							<a class='button primary-btn' href=favourites.php?id=$id> Add to Favourite</a>  
							          
						</div>
						<div class='product_count'>
            
							<button type='button' ><i class='ti-angle-right'></i></button>
							<a class='button primary-btn' href=chat.php?uid=$uid> Chat</a>  
							          
						</div>
						";
					
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">Specification</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
					 aria-selected="false">Comments</a>
				</li>
				
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p style="color: black;"> <?php echo $desc;  ?></p>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Status of Product</h5>
									</td>
									<td>
										<h5><?php echo $status; ?></h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Size</h5>
									</td>
									<td>
										<h5><?php echo $size; ?></h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Gender for use</h5>
									</td>
									<td>
										<h5><?php echo $gender; ?></h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Condition of Product</h5>
									</td>
									<td>
										<h5><?php echo $con; ?></h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Area to Deliver</h5>
									</td>
									<td>
										<h5><?php echo $area; ?></h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Exchange with</h5>
									</td>
									<td>
										<h5><?php echo $exchange;}?></h5>
									</td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
				<div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">
								
								
								
									<?php 
									 include('connection.php');
									 
     $iid= $_GET["id"];
     $sql_i = "SELECT * FROM comments WHERE pid = '$iid'";
    
    $res_i = mysqli_query($conn, $sql_i);
   
$counts=mysqli_num_rows($res_i);
  while($row=mysqli_fetch_array($res_i))
    {
    	$date= $row['entered_date'];
    	$msg= $row['message'];
    	$id= $row['uid'];
    	$rating = $row['rating'];


    	$cid = $row['cid'];
    	$username= $_SESSION['username'];
    $sql_u = "SELECT * FROM users WHERE id= '$id'";
    
    $res_u = mysqli_query($conn, $sql_u);
   
$count=mysqli_num_rows($res_u);
  while($row=mysqli_fetch_array($res_u))
    {
 
     $image = $row['image'];   
     $name= $row['firstname'];
     $uid = $row['id'];
     $username= $_SESSION['username'];
									echo " <div class='review_item'><div class='media'>
										<div class='d-flex'>
											<img src='uploads/$image' alt='' class='img-responsive'>
										</div>
										<div class='media-body'>
											<h4> $name</h4>
											<h5>$date</h5>
												Rating : ";
											 for($i=0; $i<$rating; $i++) {
									echo "
									<span class='fa fa-star checked' ></span>";
								}
											


											  $sql_k = "SELECT * FROM users WHERE username = '$username'";    
    										$res_k = mysqli_query($conn, $sql_k);   
											$counk=mysqli_num_rows($res_k);
											if($row=mysqli_fetch_array($res_k))
   											 {
   											 	$ids=$row['id']; 

											if($id == $ids){
											echo "<a class='reply_btn'  href='deletecomment.php?cid=$cid'>Delete</a>";
										}
									}
										echo "</div>
									</div>

									<p>$msg</p></div>
									<hr>";

						
										}
									
							}

								?>
								
							</div>
						</div>
						<div class="col-lg-6">



	

							<div class="review_box">
								<h4>Post a comment and rate a star</h4>

								<form class="row contact_form" action="" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data" >
									
								

									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
										</div>
									</div>
																		<div class="stars">										
		<input type="radio" name="star" class="star-1" id="star-1" value="1" />
		<label class="star-1" for="star-1">1</label>
		<input type="radio" name="star" class="star-2" id="star-2" value="2" />
		<label class="star-2" for="star-2">2</label>
		<input type="radio" name="star" class="star-3" id="star-3" value="3"/>
		<label class="star-3" for="star-3">3</label>
		<input type="radio" name="star" class="star-4" id="star-4" value="4" />
		<label class="star-4" for="star-4">4</label>
		<input type="radio" name="star" class="star-5" id="star-5" value="5" />
		<label class="star-5" for="star-5">5</label>
		<span></span>
	</div>
									<div class="col-md-12 text-right">
										 <button type="submit" class="button button--active button-review" name="submit">Comment</button>
									</div>
								</form>
								<?php
					if (isset($_POST['submit']))

						{	

							$iid= $_GET["id"];
							
							$msg = $_POST['message'];
							$rate= $_POST['star'];							 
   							   $username= $_SESSION['username'];
    include('connection.php');
    $sql_u = "SELECT * FROM users WHERE username='$username'";
    
    $res_u = mysqli_query($conn, $sql_u);
   
$count=mysqli_num_rows($res_u);
  if($row=mysqli_fetch_array($res_u))
    {
     $id = $row['id'];   
  
   
							
		$stmt="INSERT INTO comments(message, uid, pid,rating, entered_date) VALUES ('$msg', '$id', '$iid','$rate',SYSDATE()  )";
		 $qry=mysqli_query($conn,$stmt);
  if($qry)
    {

 
 echo "<meta http-equiv='refresh' content='0'>";
 exit();
       
    }

    else
    {
      echo "<script type='text/javascript'>alert('failed!')</script>";
}

}
}
?>
						
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
		 <?php include "footer.php"; ?>




	 