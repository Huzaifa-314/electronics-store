<?php 
include '../include/connection.php';
include '../include/function.php';
session_start();

if(isset($_POST['login'])){
	$usermail = $_POST['usermail'];
	$password = sha1($_POST['password']);

	$user = mysqli_query($db,"SELECT email FROM estore_user WHERE email = '$usermail' AND status='1'");
    $row = mysqli_fetch_assoc($user);
	if($row==null){
		header('location: ../login.php?error=Invalid user information');
	}else{
		$pass = mysqli_fetch_assoc(mysqli_query($db,"SELECT pass FROM estore_user WHERE email = '$usermail'"))['pass'];
		if($password == $pass){
			$row = mysqli_fetch_assoc(mysqli_query($db,"SELECT ID,email,userrole FROM estore_user WHERE email = '$usermail'"));
			$_SESSION['id'] 		= $row['ID'];
			$_SESSION['email'] 		= $row['email'];
			$_SESSION['userrole']   = $row['userrole'];

			if($_SESSION['userrole'] == 2 || $_SESSION['userrole'] == 3){
				header('location: ../dashboard.php');
			}
			else if($_SESSION['userrole'] == 1){
				header('location: ../userdashboard.php');
			}
			else {
				header("location: ../login.php?error=Subscribers doesn't have any dashboard!");
			}
		}else{
			header('location: ../login.php?error=Incorrect Password');
		}
	}
}