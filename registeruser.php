<?php

if (isset($_POST['register']))
{
 
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$password1=$_POST['confirmPassword'];
$address=$_POST['location'];
$phonenumber = $_POST['number'];
$tempname=$_FILES['profilepic']['tmp_name'];
$name=$_FILES['profilepic']['name'];
$size=$_FILES['profilepic']['size'];
$type=$_FILES['profilepic']['type'];
 include('connection.php');


if($type=='images/jpeg' OR $type=='images/jpg' OR $type=='images/png' OR $type='images/gif' AND $size<= 1048575){
  $stmt="INSERT INTO  users(firstname, 	lastname ,	username ,	email ,	password ,	repassword ,	address , phonenumber,	image ,updated_at ) VALUES ('$firstname', '$lastname', '$username', '$email','$password ', '$password1','$address','$phonenumber', '$name' ,SYSDATE(), '0')";

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
  
     echo "<script type='text/javascript'>window.location.href='login.php';</script>";


  }

  else{
    echo "something is wrong";
  }
  }
}


}
?>


