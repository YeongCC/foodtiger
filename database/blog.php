<?php

include "connection.php";
session_start();
if($_POST)
{
	$Email=$_SESSION['Email'];
	$Name=$_SESSION['Name'];
    $msg=$_POST['msg'];
    
	$sql="INSERT INTO `blog`(`Email`,`Name`, `message`) VALUES ('".$Email."', '".$Name."','".$msg."')";

	$query = mysqli_query($conn,$sql);
	if($query)
	{
		header('Location: ../blog.php');
	}
	else
	{
		echo "Something went wrong";
	}
	
	}
?>