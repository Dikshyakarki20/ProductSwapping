<?php
$id=$_GET['cid'];
include('../connection.php');

if(!empty($id))
{
$stmt="DELETE FROM comments WHERE cid=$id";
$qry=mysqli_query($conn, $stmt);
if($qry)
{
	 echo "<script type='text/javascript'>window.location.href='comments.php';</script>";

        exit;
}
}
else{
	 echo "<script type='text/javascript'>alert('failed!')</script>";
}
?>