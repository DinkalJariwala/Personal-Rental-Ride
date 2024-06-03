<?php
include ('conn.php');
if (isset($_POST['submit'])) {
    $uname = $_POST['txtUname'];
    $email = $_POST['txtEmail'];
    $cn = $_POST['txtCn'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['Conform_Password'];

    // Validate if passwords match in PHP
    if ($password != $confirmPassword) {
        echo '<script> alert("Passwords do not match!"); </script>';
    } else {
       $pass=$confirmPassword;

        $sql = "INSERT INTO `user` (`user_id`, `user_name`, `user_mail`, `user_pass`, `user_mobile`) 
                VALUES (NULL, '$uname', '$email', '$pass', '$cn')";

        if (mysqli_query($conn, $sql)) {
            echo '<script> alert("Insert Successfully...."); </script>';
            header('Location: login.php');
            exit();
        } else {
           echo "Password Does Not Match";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container">
    <div class="center">
      <h1>Register</h1>
      <form method="post">

      <div class="txt_field">
          <input type="text" name="txtUname" required>
          <span></span>
          <label>First And Last Name</label>
        </div>
        <div class="txt_field">
          <input type="number" name="txtCn" required>
          <span></span>
          <label>mobile number</label>
        </div>
        <div class="txt_field">
          <input type="email" name="txtEmail" required>
          <span></span>
          <label>email-id</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
          <input type="password" name="Conform_Password" required>
          <span></span>
          <label>Conform Password</label>
        </div>
        <input name="submit" type="Submit" value="Register">
        <div class="signup_link">
          Not registred ? <a href="login.php">Login</a>
        </div>
      </form>
    </div>
  </div>
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