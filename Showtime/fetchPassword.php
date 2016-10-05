<?php 
	$email = $_GET['email'];
	$crush = $_GET['crush'];
	include 'functions.php';
	$sql = "SELECT * FROM `user` WHERE email='". $email ."' and securityQA='". $crush ."'";
	$conn = new conn;
	$connect = $conn->connectDatabase();												
	$result = mysqli_query($connect, $sql);
	$users = array();
	while ($row = mysqli_fetch_object($result))
	{
		array_push($users,$row);
	}
	if(count($users) == 0){
		echo "-1";
	}
	else{
		echo $users[0]->password;
	}
?>