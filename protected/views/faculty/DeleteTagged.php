<?php

	session_start();
	$EmpID = $_SESSION['FCode']; 
	include("config.php");
	$schedID = $_GET['schedID'];
	$sem = $_GET['sem'];
	$sy = $_GET['sy'];
	$sql = "SELECT * FROM tbl_subjects where schedID = '$schedID'";
	$result = mysqli_query($conn,$sql);


	$sql="Delete from tbl_subjpreferences  where schedID = '$schedID'";
	$result=mysqli_query($conn,$sql);
	header("Location: index.php?r=faculty/TagSchedules&sem=$sem&sy=$sy&mes=1");


	mysqli_close($conn);
	
?>

