+<?php
// session_start();
include ('conn.php');
if (isset($_POST['btnS'])) {
  $uname = $_POST['txtUn'];
  $email = $_POST['txtEmail'];
  $cn = $_POST['txtCn'];
  $address = $_POST['txtaddr'];
  $password = $_POST['password'];

  $sql = "INSERT INTO `owner` (`owner_id`,`owner_name`, `owner_email`, `owner_mobile`, `owner_address`,`owner_password`) VALUES (NULL,'$uname','$email',$cn,'$address','$password')";

  mysqli_query($conn, $sql);
  echo '<script> alert("Insert Sucessfully....") </script>';
  header('location:login_seller.php');
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
          <a href="login_seller.php"><button type="button" class="btn btn-warning">Login</button> </a>
        </div>
        <div class="col-md-9 register-right">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <h3 class="register-heading">Owner Registration Form</h3>
              <div class="row register-form">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Owner Name" name="txtUn" value="" required />
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email ID" name="txtEmail" id="txtEmail"
                      value="" required />
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Contact No" name="txtCn" id="txtCn" value=""
                      pattern="[7896][0-9]{9}" title="Mobile Number Is InValid " required />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="password" name="password" value=""
                      required />
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Your Full Address" name="txtaddr"
                      required>
                  </div>
                  <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                      <input type="submit" class="btnRegister" value="Register" name="btnS" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </form>
</body>
<script>
  $(document).ready(function () {
    $('#txtEmail').change(function () {
      var email = $(this).val();
      $.ajax({
        url: 'valid_or_not.php',
        method: "post",
        data: {
          'semail': email
        },
        success: function (data) {
          if (data == 1) {
            alert('This Email Id Is Already Exsist In System');
            $('#txtEmail').val("");
          }
        }
      })
    });

    $('#txtCn').change(function () {
      var contact = $(this).val();
      $.ajax({
        url: 'valid_or_not.php',
        method: "post",
        data: {
          'contact': contact
        },
        success: function (data) {
          if (data == 1) {
            alert('This Contact No Is Already Exsist In System');
            $('#txtCn').val("");
          }
        }
      })
    });
  });
</script>

</html>