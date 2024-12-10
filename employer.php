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
  <link rel="stylesheet" href="css/emp.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
          <a href="employer.php" style="color: black;">Employers</a>
          </li>
          <li>
            <a href="#company" style="color: black;">News</a>
          </li>
          <li>
            <a href="about.php" style="color: black;">About</a>
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
    <h1 style="color: #0F0049; padding: 20px; font-weight: bold; margin-left: 120px;">Employers</h1>
    <section class="content-header bg-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center index-head">
            <!-- <p>One search, global reach</p> -->
          </div>
        </div>
      </div>
    </section>

    <section id="about" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h2>Sed facilisi turpis id lacus</h1>                      
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 about-text margin-bottom-20">
          Integer aenean vulputate mattis pretium et. Dictum accumsan libero nunc gravida eu nisl eu maecenas elementum. Aenean velit varius bibendum dui tristique vestibulum adipiscing odio quis. Metus mauris nam auctor ac viverra in elit scelerisque sed. Egestas sodales lectus euismod vel. Donec sit sagittis tincidunt aliquam et faucibus gravida. Pulvinar mauris integer risus magna in placerat consequat in. Malesuada ornare vel malesuada ipsum massa gravida sed. Viverra et ut ac egestas. Orci vitae et donec massa imperdiet sodales felis adipiscing urna. Et euismod facilisi diam in diam mi aliquam ut auctor. Viverra senectus id mattis laoreet a ullamcorper viverra scelerisque.
Nullam tortor maecenas odio molestie. Ut vulputate in egestas lorem sit. Odio neque ultrices sit integer elit euismod lectus. Faucibus quisque nisi elit at proin maecenas massa. Proin nulla feugiat nisl convallis. Augue vitae mi scelerisque turpis massa sollicitudin faucibus porttitor. Lacus quis velit erat convallis non lacus. Fringilla magna amet odio tortor ac ullamcorper turpis. Sagittis vitae velit faucibus non nam maecenas diam massa ut. Tortor venenatis amet auctor sed vestibulum suspendisse fringilla nullam. Blandit gravida sed aenean nec viverra urna justo vel. Malesuada turpis morbi volutpat adipiscing sed volutpat urna. Arcu id eget eleifend sed orci. Non id faucibus est fermentum tellus at.
Eu felis in feugiat sit sed diam malesuada pharetra consectetur. Adipiscing urna aliquet ac et nisl adipiscing lacus sem in. Quis adipiscing vestibulum dignissim quam feugiat nunc lacus. Suspendisse facilisis risus pharetra eget sit volutpat nunc nunc. Ac facilisi aliquet turpis amet diam id etiam. Velit consectetur fusce lacinia tempor consequat non. Gravida tortor lorem gravida posuere sit luctus sapien. Quisque tristique fermentum pretium quis eget mollis accumsan. Suspendisse volutpat turpis et in suspendisse leo volutpat. Eleifend consequat quis nulla tortor aenean eu ac sociis. Condimentum nunc morbi amet molestie nisi mi. Sed dignissim amet aliquam eget at. Eleifend sagittis penatibus ipsum sagittis tincidunt.
Quam cras duis porttitor nisi platea ac. Aliquam nullam tortor volutpat aliquam nulla morbi aliquet. Ultrices eget turpis adipiscing nulla neque eros proin. Id at ullamcorper habitasse tristique adipiscing. Etiam id convallis luctus purus. Adipiscing elementum dolor turpis faucibus. Non faucibus vel morbi non morbi justo quis. Sit accumsan massa sit cursus tristique sed nunc sed.
          </div>
        </div>
      </div>
    </section>

    <section id="statistics" class="content-header">
  <div class="container text-center">
    <h1 style="color: #0F0049;">Employers: Hire Our Students!</h1>
    <a href="./company/create-job-post.php" class="cta-button" style="background-color: #FB3535">Get Started</a>
  </div>
</section>

  </div>

  <footer style="background-color: #DF4141; margin-left: 0px; display: flex; justify-content: space-between; align-items: center;" class="main-footer">
    <b style="color: white;">@2024 JoPNav</b>
    <div>
        <a href="https://messenger.com" target="_blank" style="margin-right: 10px;">
            <i class="fab fa-facebook-messenger" style="color: white; font-size: 20px;"></i>
        </a>
        <a href="https://facebook.com" target="_blank" style="margin-right: 10px;">
            <i class="fab fa-facebook" style="color: white; font-size: 20px;"></i>
        </a>
        <a href="https://instagram.com" target="_blank">
            <i class="fab fa-instagram" style="color: white; font-size: 20px;"></i>
        </a>
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
