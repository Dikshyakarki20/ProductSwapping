<?php
$id=$_GET['uid'];
include('../connection.php');

if(!empty($id))
{
$stmt="DELETE FROM users WHERE id=$id";
$qry=mysqli_query($conn, $stmt);
if($qry)
{
	 echo "<script type='text/javascript'>window.location.href='utables.php';</script>";

        exit;
}
}
else{
	 echo "<script type='text/javascript'>alert('failed!')</script>";
}
?>