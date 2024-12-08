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
  <link rel="stylesheet" href="css/custom.css">
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
  background-color: rgba(255, 165, 0, 0.5); /* 50% transparent */

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
.content-header .row > .col-md-3 {
  padding-left: 0px;
  padding-right: 0px;
}
.content-header img {
  border-radius: 8px;
}
.content-header img {
    max-width: 80%; /* Adjust the percentage to control the size */
    height: auto;   /* Maintain the aspect ratio */
    margin: auto;   /* Center the image horizontally if necessary */
  }

  /* Move first and third images up */
.img-up {
  margin-top: -20px; /* Adjust this value to move up more or less */
}

/* Move second and fourth images down */
.img-down {
  margin-top: 20px; /* Adjust this value to move down more or less */
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

  <section class="content-header bg-main" style="padding-bottom: 50px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center index-head" style="color: #0F0049; white-space: nowrap;">
          <p style="font-size: 45px;">MSEUF Career & Professional Development Center</p>
        </div>
      </div>
      <div class="row mt-4">
        <!-- Picture 1 -->
        <div class="col-md-3 text-center img-up">
          <div class="p-3">
            <img src="./img/image1.png" alt="Description 1" class="img-fluid mb-5">
            <p class="fw-bold"></p>
          </div>
        </div>
        <!-- Picture 2 -->
        <div class="col-md-3 text-center img-down">
          <div class="p-3">
            <img src="./img/image2.png" alt="Description 2" class="img-fluid mb-5">
            <p class="fw-bold"></p>
          </div>
        </div>
        <!-- Picture 3 -->
        <div class="col-md-3 text-center img-up">
          <div class="p-3">
            <img src="./img/image3.png" alt="Description 3" class="img-fluid mb-5">
            <p class="fw-bold"></p>
          </div>
        </div>
        <!-- Picture 4 -->
        <div class="col-md-3 text-center img-down">
          <div class="p-3">
            <img src="./img/image4.png" alt="Description 4" class="img-fluid mb-5">
            <p class="fw-bold"></p>
          </div>
        </div>
      </div>
    </div>
  </section>


    <section id="statistics" class="content-header">
  <div class="container text-center">
    <h1 style="color: #0F0049;">Employers: Hire Our Students!</h1>
    <button class="cta-button" style="background-color: #FB3535">Get Started</button>
  </div>
</section>

<section id="company" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1 style="color: #0F0049;">Events & News</h1>
            <p>Elevate Your Career! Our JobCareer & Professional Development Center is here to help you reach your full potential.</p>            
          </div>
        </div>
        <div class="row">
        <?php 
          /* Show any 4 random job post
           * 
           * Store sql query result in $result variable and loop through it if we have any rows
           * returned from database. $result->num_rows will return total number of rows returned from database.
          */
          $sql = "SELECT * FROM news Order By Rand() Limit 6";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
              // $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
              // $result1 = $conn->query($sql1);
              // if($result1->num_rows > 0) {
              //   while($row1 = $result1->fetch_assoc()) 
              //   {
             ?>
          <div class="col-sm-4 col-md-4">
            <div style="background-color: transparent; border-color: transparent;" class="thumbnail company-img">
              <img style="width: 500px; height: 200px;" src="img/jp.png" alt="Browse Jobs"> 
              <div class="caption">
                <h3 class="text-center"><?php echo $row['description']; ?></h3>
              </div>
              <!-- <div class="caption">
                <h3 class="text-center"><?php echo $row['title']; ?></h3>
              </div> -->
            </div>
          </div>

          

          <?php
              // }
            }
            }
          // }
          ?>


    
        </div>
      </div>
    </section>

    <!-- <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-bottom-20">
            <h1 class="text-center">Latest Jobs</h1>            
            <?php 
         
          $sql = "SELECT * FROM job_post Order By Rand() Limit 4";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
             
             ?>
            <div class="attachment-block clearfix">
                <h4 class="attachment-heading"><a><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right">₱<?php echo $row['maximumsalary']; ?>/Month</span></h4>
                <div class="attachment-text">
                    <div><strong> Experience <?php echo $row['experience']; ?> Years</strong></div>
                </div>
            </div>
          <?php
            }
            }
          ?>
          </div>
        </div>
      </div>
    </section> -->

    <!-- <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>Candidates</h1>
            <p>Finding a job just got easier. Create a profile and apply with single mouse click.</p>            
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail candidate-img">
              <img src="img/browse.jpg" alt="Browse Jobs">
              <div class="caption">
                <h3 class="text-center">Browse Jobs</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail candidate-img">
              <img src="img/interviewed.jpeg" alt="Apply & Get Interviewed">
              <div class="caption">
                <h3 class="text-center">Apply & Get Interviewed</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail candidate-img">
              <img src="img/career.jpg" alt="Start A Career">
              <div class="caption">
                <h3 class="text-center">Start A Career</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->


    <!-- <section id="about" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>About US</h1>                      
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
    </section> -->

  </div>
  <!-- /.content-wrapper -->

  <footer style="background-color: #DF4141; margin-left: 0px;" class="main-footer">
      <div class="text-center">
        <b style="color: white;">@2024 JoPNav</b>
      </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

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
