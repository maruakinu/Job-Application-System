<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");

//if user Actually clicked update profile button
if(isset($_POST)) {

	//Escape Special Characters
	$description = mysqli_real_escape_string($conn, $_POST['description']);

	//Update User Details Query
	$sql = "UPDATE aboutus SET description='$description' WHERE id = 0";

	if($conn->query($sql) === TRUE) {
		header("Location: about.php");
		exit();
	} else {
		echo "Error ". $sql . "<br>" . $conn->error;
	}
	//Close database connection. Not compulsory but good practice.
	$conn->close();

} else {
	//redirect them back to dashboard page if they didn't click update button
	header("Location: about.php");
	exit();
}