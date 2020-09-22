<?php
$id=$_GET['pid'];
include('../connection.php');

if(!empty($id))
{
$stmt="DELETE FROM products WHERE pid=$id";
$qry=mysqli_query($conn, $stmt);
if($qry)
{
	 echo "<script type='text/javascript'>window.location.href='ptables.php';</script>";

        exit;
}
}
else{
	 echo "<script type='text/javascript'>alert('failed!')</script>";
}
?>