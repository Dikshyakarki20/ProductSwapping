
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
  <title>Recycle House</title>
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
<style type="text/css">
  /* ==================== GLOBAL SETTINGS ====================*/

@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
@import url(https://weloveiconfonts.com/api/?family=entypo);
/* entypo */
[class*="entypo-"]:before {
  font-family: 'entypo', sans-serif;
}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

*:after {
  content: '';
  clear: both;
  display: table;
}
h4{
  margin-top: 50px;
}

/* ==================== USER PROFILE ====================*/

figure#card {
  position: relative;
  margin: auto;
  margin-top: 100px;
  width: 810px;
  height: 500px;
  background-color: #fff;
  box-shadow: 0px 50px 90px 0px rgba(32,37,58,0.50);
}

/* ~~~~~~~~~~~~~~~ USER PROFILE > INNER ~~~~~~~~~~~~~~*/

div.left, div.right {
  position: relative;
  float: left;
  width: 50%;
  height: 100%;
}

/* ~~~~~~~~~~~~~~~ USER PROFILE > INNER => LEFT ~~~~~~~~~~~~~~*/

div.left {
  height: 114%;
}

div.left img {
  width: 100%;
}

div.left svg {
  position: absolute;
}

div.left .clip {
  -webkit-clip-path: polygon(0px 430px,405px 570px,405px 0px,0px 0px);
          clip-path: url("#clipPolygon");
}

.chat {
  position: absolute;
  bottom: 75px;
  left: 20px; 
  color: #465367;
  font-size: 30px;
  text-decoration: none;
  transition: all 200ms ease-in-out 40ms;
}

.chat:hover {
  transform: scale(1.1);
  color: #4592FF;
}

/* ~~~~~~~~~~~~~~~ USER PROFILE > INNER => RIGHT ~~~~~~~~~~~~~~*/

div.right {
  padding: 40px;
} 

div.right h1 {
  text-transform: uppercase;
  font-size: 42px;
  color: #465367;
  margin-bottom: 30px;
}

div.right p {
  color: #808BA8;
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
  <section class="blog-banner-area" id="category">
    <div class="container h-100">
      <div class="blog-banner">
        <div class="text-center">
          <h1> Welcome , <?php echo $_SESSION['username'];?></h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">profile</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
<figure id="card">
  <div class="left">
    <svg width="0" height="0">
      <clipPath id="clipPolygon">
        <polygon points="0 430,405 570,405 0,0 0"></polygon>
      </clipPath>
    </svg>		
    <?php
    

    include('connection.php');
     $username= $_SESSION['username'];
      $sql_u = "SELECT * FROM users WHERE username='$username'";
    
    $res_u = mysqli_query($conn, $sql_u);
   
$count=mysqli_num_rows($res_u);
  if($row=mysqli_fetch_array($res_u))
    {
       $id= $row['id'];
      $img=$row['image'];
      $fname= $row["firstname"];
      $lname= $row["lastname"];
                $username= $row["username"];
                $email= $row["email"];
      
                $address= $row["address"];
                $phonen= $row["phonenumber"];
    echo "<img src='uploads/$img' alt='user' class='clip'>";
  }?>

  </div>
  <div class="right">
    <h1><?php echo $fname . ' '. $lname ; ?></h1>
    <h4>Username : <?php echo $username; ?></h4>
    <h4>E-mail : <?php echo  $email; ?></h4>
    <h4>Address : <?php echo $address; ?></h4>
    <h4>Phone Number : <?php echo  $phonen; ?></h4>
     <?php
     echo "<a  href='editprofile.php?id=$id'><button class='btn btn-success' value='edit'>Edit Profile</button></a>"; ?>
    

   
    
  </div>
</figure>
 <?php include "footer.php"; ?>