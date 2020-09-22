
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
    
     $id=$_GET['id'];
include('connection.php');
$stmt= "SELECT * from users where id=$id";

    
    $res_u = mysqli_query($conn, $stmt);
   
$count=mysqli_num_rows($res_u);
  if($row=mysqli_fetch_array($res_u))
    {
      $img=$row['image'];
      $fname= $row["firstname"];
      $lname= $row["lastname"];
                $username= $row["username"];
                $email= $row["email"];
      
                $address= $row["address"];
                $phonen= $row["phonenumber"];
                $img=$row["image"];
    echo "<img src='uploads/$img' alt='user' class='clip'>";
  }?>

  </div>
  <div class="right"> 
    
    <form action="" method="POST" enctype="multipart/form-data">

              <div class="col-md-12 form-group">
                FirstName: <input type="text" class="form-control" id="name" name="firstname" value="<?php echo $fname;?>"   required="required">
              </div>
              <div class="col-md-12 form-group">
               LastName: <input type="text" class="form-control" id="name" name="lastname" value="<?php echo $lname;?>" required="required">
              </div>
              
              
             
               <div class="col-md-12 form-group">
                Address: <input type="text" class="form-control" id="confirmPassword" name="location" value="<?php echo $address; ?>"  required="required">
              </div>
               <div class="col-md-12 form-group">
                PhoneNumber: <input type="text" class="form-control" id="confirmPassword" name="number" value="<?php echo $phonen; ?>" required="required">
              </div>
              <div class="col-md-12 form-group">
              Profile Picture <input type="file" name="profilepic"  value="" >
            </div>
              <div class="col-md-12 form-group">
                 <input type="submit" class="btn btn-primary btn-block" name="update" value="update">
              </div>

            </form>
    

   
    
  </div>
</figure>
 <?php include "footer.php"; ?>
 <?php

if (isset($_POST['update']))

{
 
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];

$address=$_POST['location'];
$phonenumber = $_POST['number'];
$tempname=$_FILES['profilepic']['tmp_name'];
$name=$_FILES['profilepic']['name'];
$size=$_FILES['profilepic']['size'];
$type=$_FILES['profilepic']['type'];
 include('connection.php');




if($type=='images/jpeg' OR $type=='images/jpg' OR $type=='images/png' OR $type='images/gif' AND $size<= 1048575){
  $stmt="UPDATE users SET  
  firstname = '$firstname',
  lastname= '$lastname',
  address = '$address',
  phonenumber = '$phonenumber',
  image = '$name' WHERE id = $id";

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
  
     echo "<script type='text/javascript'>window.location.href='profile.php';</script>";


  }

  else{
    echo "something is wrong";
  }
  }
}
}



?>