<?php 
session_start();
if (isset($_POST['login'])) {
	//collecting the users input from form
	$username=$_POST['Username'];
	$password=md5($_POST['Password']);
	//preparing the sql statement

	
	$stmt="SELECT * FROM users  where username='$username' AND password='$password' AND status = 0"; 
	//making the connection to the database
	
		include('connection.php');
	//making the query
	$qry=mysqli_query($conn, $stmt) or die(mysql_error());



	//counting the number of records affects by the query
	$count=mysqli_num_rows($qry);
	$row=mysqli_fetch_array($qry);
	if($count==1){

		
		//generate the session name and assing the value
		$_SESSION['sname']=md5('123456');
		$_SESSION['id' ] = $row['id'];
		$_SESSION['admin']=md5(rand(1,9999));
		$_SESSION['username']=$username;
		$_SESSION['login_time']=time();


		header('Location:main.php');
		exit();
	
	


} else {

	$username=$_POST['Username'];
	$password=$_POST['Password'];
	//preparing the sql statement

	
	$stmt="SELECT * FROM users  where username='$username' AND password='$password' AND status = 1"; 
	//making the connection to the database
	
		include('connection.php');
	//making the query
	$qry=mysqli_query($conn, $stmt) or die(mysql_error());



	//counting the number of records affects by the query
	$count=mysqli_num_rows($qry);
	$row=mysqli_fetch_array($qry);
	if($count==1){

		
		//generate the session name and assing the value
		$_SESSION['sname']=md5('123456');
		$_SESSION['id' ] = $row['id'];
		$_SESSION['admin']=md5(rand(1,9999));
		$_SESSION['username']=$username;
		$_SESSION['login_time']=time();


		header('Location:admin/home.php');
		exit();
	
	}



}


echo "<script type='text/javascript'>alert('Invalid username or password');
window.location.href='login.php';
</script>";

}
	else{
		


	}
	

 ?>