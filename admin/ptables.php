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
    include('../connection.php');
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
  $dir="../uploads/";
  if (!file_exists($dir)&& !is_dir($dir)) {
    mkdir($dir);  
  
  }
  //making upload path and file name
  $uploadfull="$dir/$name";

  //uploaded folder
  $upload=move_uploaded_file($tempname, $uploadfull);

  //checking the file is uploaded or not
  if ($upload) {
  
     echo "<script type='text/javascript'>window.location.href='home.php';</script>";


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
</script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DHIS2 Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
<style type="text/css">

#chart-container {
    width: 50%;
    height: 50%;
    margin-left: 30%;
}
</style>
</head>

<body id="page-top">
 <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
       
          <img src="img/logo(2).png" height="30px;">
 
        <div class="sidebar-brand-text mx-3"> SWAP </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Admin Dashboard</span></a>
      </li>



  
    

      
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagees" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-plus"></i>
          <span>Product</span>
        </a>
        <div id="collapsePagees" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Reports</h6>
           
            
          <a class=collapse-item href='addentry.php'> Add product </a>
        
        
          
          </div>
        </div>
      </li>

      <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePageees" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-plus"></i>
          <span>Comments</span>
        </a>
        <div id="collapsePageees" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Commentss</h6>
           
          <a class=collapse-item href='comments.php'> View Comments </a>
         
        
          
          </div>
        </div>
      </li>
   

    
    
     
 

      <!-- Nav Item - Tables -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagess" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-table"></i>
          <span>Data - Tables</span>
        </a>
        <div id="collapsePagess" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Reports</h6>
            <a class=collapse-item href='utables.php'> User Table</a>
            <a class=collapse-item href='ptables.php'> Product Table</a>


        
          
        </div>
      </li>

      <!-- Divider -->
     
 <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="POST" action= "search.php">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="search">
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name=" submit">  <i class="fas fa-search fa-sm"></i></button>
              
              </div>
       
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
             
            </li>

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">  <?php 
  if($_SESSION['admin']==true)
    { 
      echo $_SESSION['username'];
    
      
    } elseif($_SESSION['admin']==false)
    {
      echo '<a href="index.php">';
    }
  ?></span>
                 <img class="img-profile rounded-circle" src="img/user.png">
              </a>
             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                
             <?php 
  if($_SESSION['admin']==true)
    { 
     
      echo " <a class='dropdown-item'  href='../index.php' action='logout.php'>Logout</a>";
      
    }
    ?>
            
                 
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
     <div class="container-fluid">
                    
    

          <!-- Page Heading -->
         
          <!-- Content Row -->
          <div class="row">
   
             <p class="mb-4">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Product-Tables</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>PRODUCT NAME</th>
                      <th>DESCRIPTION</th>
                      <th>CATEGORY</th>
                      <th>STATUS</th>
                      <th>GENDER</th>
                      <th>SIZE</th>
                      <th>CONDITION</th>
                      <th>PRICE</th>
                      <th>AREA</th>
                      <th>EXCHANGE</th>
                      <th>UPDATE</th>
                      <th>DELETE</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>PRODUCT NAME</th>
                      <th>DESCRIPTION</th>
                      <th>CATEGORY</th>
                      <th>STATUS</th>
                      <th>GENDER</th>
                      <th>SIZE</th>
                      <th>CONDITION</th>
                      <th>PRICE</th>
                      <th>AREA</th>
                      <th>EXCHANGE</th>
                       <th>UPDATE</th>
                      <th>DELETE</th>
                    </tr>
                  </tfoot>
                   <?php
                  include('../connection.php');
            $stmt= "SELECT * FROM products";
      $qry=mysqli_query($conn,$stmt);
      $count=mysqli_num_rows($qry);
    while($row=mysqli_fetch_array($qry))
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
                 $id = $row['pid'];
      echo "<tbody><tr>";
      echo "<td>" . $productname ."</td>";
                  echo "<td>" . $desc ."</td>";
                  echo "<td>" .  $category ."</td>";
                  echo "<td>" . $status ."</td>";
                  echo "<td>" . $gender ."</td>";
                  echo "<td>" . $size ."</td>";
                  echo "<td>" . $con ."</td>";
                  echo "<td>" . $price ."</td>";
                  echo "<td>" . $area ."</td>";
                  echo "<td>" . $exchange ."</td>";
                  echo "<td> <a href ='updateentry.php?pid=$id'><input type= 'submit' class='btn btn-success btn-block' value='UPDATE'></a></td>";
                    echo "<td> <a href ='proddelete.php?pid=$id'><input type= 'submit' class='btn btn-danger btn-block' value='DELETE'></a></td>";
echo"</tr></tbody>" ;
}?></table>
            </div>
          </div>
        </div>
      </p>







    
    <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; DHIS 2</span>
          </div>
        </div>
      </footer>

      </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
      <!-- End of Footer -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
