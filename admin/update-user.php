<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
  }
  
  require_once("../db.php");

$sql = "UPDATE users SET active=1 WHERE id_user='$_GET[id]'";
if($conn->query($sql) === TRUE) {
	header("Location: applications.php");
	exit();
}

?>