<?php
session_start();
$id=$_GET['id'];

include('connection.php');

if(!empty($id))
{
$stmt="SELECT * FROM products WHERE pid=$id";

$qrys=mysqli_query($conn, $stmt);
 $counts=mysqli_num_rows($qrys);
    while($row=mysqli_fetch_array($qrys))
    { 
    	 $username= $_SESSION['username'];
    	$sql_u = "SELECT * FROM users WHERE username='$username'";
    
    $res_u = mysqli_query($conn, $sql_u);
   
$count=mysqli_num_rows($res_u);
  if($row=mysqli_fetch_array($res_u))
    {
     $uid = $row['id'];  
    	$uid= $row['id'];
      		$sts="INSERT into favourites (user_id,prod_id)values('$uid','$id')";
    		 echo $sts;

		$qrye=mysqli_query($conn, $sts);

if($qrye){
    	echo "<script type='text/javascript'>window.location.href='fav.php';</script>";

        exit;
}
}

}
}
else{
	 echo "<script type='text/javascript'>alert('failed!')</script>";
}
?>