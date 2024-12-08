<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/about.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
  .mini-logo {
    height: 50px;
    width: 50px;
}
#statistics {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 70vh; /* Full height of the viewport */
  padding: 50px; /* Large padding */
  margin: 0 auto; /* Center align the container horizontally */
  background-color: #FFC189; /* Optional background color */
}

#statistics h1 {
  font-size: 4rem; /* Larger font size */
  font-weight: bold;
  color: #333; /* Darker color for contrast */
  text-transform: uppercase; /* Optional styling */
}
#statistics .cta-button {
  display: inline-block;
  padding: 15px 30px; /* Button padding */
  font-size: 1rem; /* Button font size */
  font-weight: bold;
  color: #fff; /* Text color */
  background-color: #007bff; /* Button color */
  border: none; /* Remove border */
  border-radius: 18px; /* Rounded corners */
  text-transform: uppercase;
  cursor: pointer;
  transition: background-color 0.3s ease; /* Smooth hover transition */
}

#statistics .cta-button:hover {
  background-color: #0056b3; /* Darker shade on hover */
}
</style>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <header class="main-header" style="background-color: white;">

    <!-- Logo -->
    <a href="index.php" style="background-color: white;"  class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini">logo here</span> -->
      <span>
        <img src="./img/logo.png" alt="Logo" style="height: 50px; width: 130px;">
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="color: #FB3535;"><b>JoPNav</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav" style="background-color: white;">
          <li>
            <a href="jobs.php" style="color: black;">Jobs</a>
          </li>
          <!-- <li>
            <a href="#candidates" style="color: black;">Candidates</a>
          </li> -->
          <li>
            <a href="./company/create-job-post.php" style="color: black;">Employers</a>
          </li>
          <li>
            <a href="#company" style="color: black;">News</a>
          </li>
          <li>
            <a href="#about" style="color: black;">About Us</a>
          </li>
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
            <a href="login.php" style="color: black;">Login</a>
          </li>
          <!-- <li>
            <a href="sign-up.php" style="color: black;">Sign Up</a>
          </li>   -->
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="user/index.php" style="color: black;">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="company/index.php" style="color: black;">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="logout.php" style="color: black;">Logout</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header bg-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center index-head">
            <h1>MSEUF Career & Professional Development Center</h1>
            <!-- <p>One search, global reach</p> -->
          </div>
        </div>
      </div>
    </section>



    <section id="about" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>About MSEUF</h1>                      
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <img src="img/browse.jpg" class="img-responsive">
          </div>
          <div class="col-md-6 about-text margin-bottom-20">
          <?php 
         
          $sql = "SELECT * FROM aboutus wHERE id = 0";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
?>
            <p><?php echo $row['description']; ?></p>
            <?php 

            }}
            ?>
          </div>
        </div>
      </div>
    </section>

  </div>

  <footer style="background-color: #DF4141; margin-left: 0px;" class="main-footer">
      <div class="text-center">
        <b style="color: white;">@2024 JoPNav</b>
      </div>
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>
