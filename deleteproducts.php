<?php
$id=$_GET['id'];
include('connection.php');

if(!empty($id))
{
$stmt="DELETE FROM products WHERE pid=$id";
$qry=mysqli_query($conn, $stmt);
if($qry)
{
	 echo "<script type='text/javascript'>window.location.href='allproduct.php';</script>";

        exit;
}
}
else{
	 echo "<script type='text/javascript'>alert('failed!')</script>";
}
?>