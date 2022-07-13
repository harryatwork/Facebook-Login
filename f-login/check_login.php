<?php
session_start();
include("../db.php");
$email=mysqli_real_escape_string($con,$_POST['email']);
$name=mysqli_real_escape_string($con,$_POST['name']);
$id=mysqli_real_escape_string($con,$_POST['id']);

$res=mysqli_query($con,"select * from users where email='$email'");
$_SESSION['FB_ID']=$id;
$_SESSION['FB_NAME']=$name;
$_SESSION['FB_EMAIL']=$email;

$_SESSION["email"] = $_SESSION['FB_EMAIL']; 
$_SESSION["login"]="1";
if(mysqli_num_rows($res)>0){
	
}else{
	mysqli_query($con,"insert into users(fname,fb_id, email, oauth_provider) values('$name','$id','$email','facebook')");
}
?>