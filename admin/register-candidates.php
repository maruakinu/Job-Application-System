<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
  }
  
  require_once("../db.php");
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
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
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
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span>
        <img src="../img/logo.png" alt="Logo" style="height: 50px; width: 130px;">
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="color: #FB3535;"><b>JoPNav</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: white;">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                 
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

  <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
              <h3 class="box-title">Welcome <b>Admin</b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Create Job Post</a></li>
                  <li><a href="create-news-post.php"><i class="fa fa-file-o"></i> Create News</a></li>
                  <li class="active"><a href="register-candidates.php"><i class="fa fa-user-o"></i> Add Student</a></li>
                  <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i> Active Jobs</a></li>
                  <li><a href="active-news.php"><i class="fa fa-briefcase"></i> Active News</a></li>
                  <li><a href="jobs-applications.php"><i class="fa fa-address-card-o"></i> Job Applications</a></li>
                  <li><a href="applications.php"><i class="fa fa-address-card-o"></i> Students</a></li>
                  <li><a href="about.php"><i class="fa fa-address-card-o"></i> About Us</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-9 bg-white padding-2">
            <div class="row">

            <!-- <div class="row latest-job margin-top-50 margin-bottom-20 bg-white"> -->
          <h1 class="text-center margin-bottom-20">CREATE YOUR PROFILE</h1>
          <form method="post" id="registerCandidates" action="adduser.php" enctype="multipart/form-data">
            <div class="col-md-6 latest-job ">
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="fname" name="fname" placeholder="First Name *" required>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="lname" name="lname" placeholder="Last Name *" required>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="email" name="email" placeholder="Username *" required>
              </div>
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="aboutme" name="aboutme" placeholder="Brief intro about yourself *" required></textarea>
              </div>
              <div class="form-group">
                <label>Date Of Birth</label>
                <input class="form-control input-lg" type="date" id="dob" min="1960-01-01" max="1999-01-31" name="dob" placeholder="Date Of Birth">
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="age" name="age" placeholder="Age" readonly>
              </div>
              <div class="form-group">
                <label>Passing Year</label>
                <input class="form-control input-lg" type="date" id="passingyear" name="passingyear" placeholder="Passing Year">
              </div>       
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="qualification" name="qualification" placeholder="Highest Qualification">
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="stream" name="stream" placeholder="Department">
              </div>                    
              <div class="form-group checkbox">
                <label><input type="checkbox"> I accept terms & conditions</label>
              </div>
              <div class="form-group">
                <button class="btn btn-flat btn-success">Register</button>
              </div>
              <?php 
              if(isset($_SESSION['registerError'])) {
                ?>
                <div class="form-group">
                  <label style="color: red;">Email Already Exists! Choose A Different Email!</label>
                </div>
              <?php
               unset($_SESSION['registerError']); }
              ?> 

              <?php if(isset($_SESSION['uploadError'])) { ?>
              <div class="form-group">
                  <label style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>
              </div>
              <?php unset($_SESSION['uploadError']); } ?>     

            </div>            
            <div class="col-md-6 latest-job ">
              <div class="form-group">
                <input class="form-control input-lg" type="password" id="password" name="password" placeholder="Password *" required>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="password" id="cpassword" name="cpassword" placeholder="Confirm Password *" required>
              </div>
              <div id="passwordError" class="btn btn-flat btn-danger hide-me" >
                    Password Mismatch!! 
                  </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="contactno" name="contactno" minlength="10" maxlength="10" onkeypress="return validatePhone(event);" placeholder="Phone Number">
              </div>
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="address" name="address" placeholder="Address"></textarea>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="city" name="city" placeholder="City">
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="state" name="state" placeholder="State">
              </div>
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="skills" name="skills" placeholder="Enter Skills"></textarea>
              </div>             
              <div class="form-group">
                <select class="form-control input-lg" id="designation" name="designation">
                    <option value="" disabled selected>Select Year</option>
                    <option value="1st year">1st Year</option>
                    <option value="2nd year">2nd Year</option>
                    <option value="3rd year">3rd Year</option>
                    <option value="4th year">4th Year</option>
                </select>
            </div> 
             
            </div>
          </form>
          
        </div>
            
            </div>
          </div>


          </div>
            </div>
          <!-- </div> -->

    <!-- <section class="content-header">
      <div class="container">
        <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">
          <h1 class="text-center margin-bottom-20">CREATE YOUR PROFILE</h1>
          <form method="post" id="registerCandidates" action="adduser.php" enctype="multipart/form-data">
            <div class="col-md-6 latest-job ">
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="fname" name="fname" placeholder="First Name *" required>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="lname" name="lname" placeholder="Last Name *" required>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="email" name="email" placeholder="Email *" required>
              </div>
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="aboutme" name="aboutme" placeholder="Brief intro about yourself *" required></textarea>
              </div>
              <div class="form-group">
                <label>Date Of Birth</label>
                <input class="form-control input-lg" type="date" id="dob" min="1960-01-01" max="1999-01-31" name="dob" placeholder="Date Of Birth">
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="age" name="age" placeholder="Age" readonly>
              </div>
              <div class="form-group">
                <label>Passing Year</label>
                <input class="form-control input-lg" type="date" id="passingyear" name="passingyear" placeholder="Passing Year">
              </div>       
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="qualification" name="qualification" placeholder="Highest Qualification">
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="stream" name="stream" placeholder="Department">
              </div>                    
              <div class="form-group checkbox">
                <label><input type="checkbox"> I accept terms & conditions</label>
              </div>
              <div class="form-group">
                <button class="btn btn-flat btn-success">Register</button>
              </div>
              <?php 
              if(isset($_SESSION['registerError'])) {
                ?>
                <div class="form-group">
                  <label style="color: red;">Email Already Exists! Choose A Different Email!</label>
                </div>
              <?php
               unset($_SESSION['registerError']); }
              ?> 

              <?php if(isset($_SESSION['uploadError'])) { ?>
              <div class="form-group">
                  <label style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>
              </div>
              <?php unset($_SESSION['uploadError']); } ?>     

            </div>            
            <div class="col-md-6 latest-job ">
              <div class="form-group">
                <input class="form-control input-lg" type="password" id="password" name="password" placeholder="Password *" required>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="password" id="cpassword" name="cpassword" placeholder="Confirm Password *" required>
              </div>
              <div id="passwordError" class="btn btn-flat btn-danger hide-me" >
                    Password Mismatch!! 
                  </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="contactno" name="contactno" minlength="10" maxlength="10" onkeypress="return validatePhone(event);" placeholder="Phone Number">
              </div>
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="address" name="address" placeholder="Address"></textarea>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="city" name="city" placeholder="City">
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="state" name="state" placeholder="State">
              </div>
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="skills" name="skills" placeholder="Enter Skills"></textarea>
              </div>             
              <div class="form-group">
                <select class="form-control input-lg" id="designation" name="designation">
                    <option value="" disabled selected>Select Year</option>
                    <option value="1st year">1st Year</option>
                    <option value="2nd year">2nd Year</option>
                    <option value="3rd year">3rd Year</option>
                    <option value="4th year">4th Year</option>
                </select>
            </div> 
             
            </div>
          </form>
          
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
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>

<script type="text/javascript">
      function validatePhone(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
          // 8 means Backspace
          //46 means Delete
          // 37 means left arrow
          // 39 means right arrow
          return true;
        } else if( key < 48 || key > 57 ) {
          // 48-57 is 0-9 numbers on your keyboard.
          return false;
        } else return true;
      }
</script>

<script type="text/javascript">
  $('#dob').on('change', function() {
    var today = new Date();
    var birthDate = new Date($(this).val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();

    if(m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }

    $('#age').val(age);
  });
</script>
<script>
  $("#registerCandidates").on("submit", function(e) {
    e.preventDefault();
    if( $('#password').val() != $('#cpassword').val() ) {
      $('#passwordError').show();
    } else {
      $(this).unbind('submit').submit();
    }
  });
</script>
</body>
</html>