<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
  }
  
  require_once("../db.php");

$sql = "SELECT * FROM apply_job_post WHERE id_user='$_GET[id]' AND id_jobpost='$_GET[id_jobpost]'";
$result = $conn->query($sql);
if($result->num_rows == 0) 
{
  header("Location: index.php");
  exit();
}


$sql = "UPDATE apply_job_post SET status='2' WHERE id_user='$_GET[id]' AND id_jobpost='$_GET[id_jobpost]'";
if($conn->query($sql) === TRUE) {
	header("Location: jobs-applications.php");
	exit();
}

?>