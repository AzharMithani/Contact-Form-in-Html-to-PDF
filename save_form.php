<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$civil_status = $_POST['civil_status'];
	
		
		$conn->query("INSERT INTO `member` VALUES('', '$firstname', '$middlename', '$lastname', '$address', '$civil_status')") or die($conn->error());
		
		header('location: index.php');
	}
?>