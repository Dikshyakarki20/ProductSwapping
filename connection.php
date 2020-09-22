<?php
$host="localhost";
$port='8889';
$user="root";
$pass="root"; 
$db="swap" ;

$conn=mysqli_connect($host,$user,$pass,$db);
if($conn){

}
else
{
	echo "<script type='text/javascript'>alert('OOPS! there is something wrong')</script>"; 
}
?>
