<?php
	$conn = new mysqli('localhost', 'root', '', 'db_pdf');
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>