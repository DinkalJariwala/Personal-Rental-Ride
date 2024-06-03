<?php
session_start();
include('conn.php');
$msg = "";
if (isset($_POST['btnS'])) {
  $uname = $_POST['txtUn'];
  $pwd = $_POST['txtPwd'];
  $sql = "select * from admin where email_id='$uname' and password='$pwd'";
  $result = mysqli_query($conn, $sql);
  $cnt = mysqli_num_rows($result);
  if ($cnt == 1) {
    $_SESSION['user'] = $uname;
    header("location:index.php");
  } else {
    $msg = "Invalid Usre id or password";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Personal Rental Ride Login Page...</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta content="Admin Dashboard" name="description" />
  <meta content="ThemeDesign" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="shortcut icon" href="assets/images/favicon.jpg" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
  <form method="POST" class="form-horizontal m-t-20">
    <div class="accountbg"></div>
    <div class="wrapper-page">
      <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-body">
          <h3 class="text-center m-t-0 m-b-30">
            <span class=""><img src="assets/images/prr.png" alt="logo" height="100" /> </span>
          </h3>
          <h4 class="text-muted text-center m-t-0" style="color: black;"><b>Sign In</b></h4>
          <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control" type="text" required="" placeholder="Email ID" name="txtUn" />
            </div>
            <br />
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input class="form-control" type="password" required="" placeholder="Password" name="txtPwd" />
            </div>
            <br />
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <div class="checkbox checkbox-primary">
                <input id="checkbox-signup" type="checkbox" />
                <label for="checkbox-signup"> Remember me </label>
              </div>
            </div>
          </div>
          <br />
          <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
              <button class="btn btn-dark w-md waves-effect waves-light" type="submit" name="btnS">
                Log In
              </button>
            </div>
          </div>
          <br />
          <div class="form-group m-t-30 m-b-0">
            <div class="col-sm-7">
              <a href="forgot.php" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
            </div>
          </div>
          </br>
          <h5 class="text-danger">
            <?php echo $msg; ?>
          </h5>
  </form>
  </div>
  </div>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/modernizr.min.js"></script>
  <script src="assets/js/detect.js"></script>
  <script src="assets/js/fastclick.js"></script>
  <script src="assets/js/jquery.slimscroll.js"></script>
  <script src="assets/js/jquery.blockUI.js"></script>
  <script src="assets/js/waves.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/jquery.nicescroll.js"></script>
  <script src="assets/js/jquery.scrollTo.min.js"></script>
  <script src="assets/js/app.js"></script>


</body>
<!-- Mirrored from themesdesign.in/xadmino/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Jan 2022 11:02:27 GMT -->

</html>