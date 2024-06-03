<?php
session_start();
include ('conn.php');
$msg = "";
if (isset($_POST['btnS'])) {
    $uname = $_POST['txtUn'];
    $pwd = $_POST['txtPwd'];
    $sql = "select * from owner where owner_email='$uname' and owner_password='$pwd'";
    $result = mysqli_query($conn, $sql);
    $cnt = mysqli_num_rows($result);
    if ($cnt == 1) {
        $data = mysqli_fetch_assoc($result);
        $pwd = $data['owner_password'];
        $_SESSION['owner'] = $uname;
        $_SESSION['owner_id'] = $data['owner_id'];
        header("location:index.php");
    } else {
        $msg = "Invalid Usre id or password";
    }
}
?>
<html>

<head>
    <link href="register_css_file.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <form method="POST">
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="assets/images/prr.png" alt="" />
                    <h3>Welcome</h3>
                    <p>Personal Rental Ride</p>
                    <a href="register_seller.php"><button type="button" class="btn btn-warning">Register</button> </a>
                </div>
                <div class="col-md-9 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Owner Login Form</h3>
                            <div class="row register-form">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Owner Email ID"
                                            name="txtUn" value="" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="txtPwd"
                                            value="" required />
                                    </div>
                                    <div class="form-group m-t-30 m-b-0">
                                        <div class="col-sm-4">
                                            <a href="send_code.php" class="text-muted"><i class="fa fa-lock m-r-5"></i>
                                                Forgot your password?</a>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="submit" class="btnRegister" value="Login" name="btnS" />
                                        </div>
                                    </div>
                                    <h5 class="text-danger">
                                        <?php echo $msg; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>