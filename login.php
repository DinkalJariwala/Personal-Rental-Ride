<?php
session_start();
include ('conn.php');
$msg = "";

if (isset($_POST['btnS'])) {
  $email = $_POST['email']; // Corrected variable name
  $password = $_POST['Password']; // Corrected variable name

  // Prepare SQL statement to prevent SQL injection
  $sql = "SELECT * FROM user WHERE user_mail=? AND user_pass=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $data = $result->fetch_assoc();
    $_SESSION['user'] = $data['user_mail'];
    header("location:index.php");
    exit(); // Ensure script execution stops after redirection
  } else {
    $msg = "Invalid User ID or password"; // Corrected spelling
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container">
    <div class="center">
      <h1>Login</h1>
      <form action="" method="POST">
        <div class="txt_field">
          <input type="email" name="email" required> <!-- Corrected name attribute -->
          <span></span>
          <label>Email</label> <!-- Changed label for consistency -->
        </div>
        <div class="txt_field">
          <input type="password" name="Password" required> <!-- Corrected name attribute -->
          <span></span>
          <label>Password</label>
        </div>
        <input name="btnS" type="submit" value="Login"> <!-- Corrected name attribute and button text -->
        <div class="signup_link">
          Not registered? <a href="register.php">Register</a> <!-- Corrected spelling -->
        </div>
        <div class="signup_link">
          Forgot Password? <a href="contact_us.php">Contact Us</a> <!-- Corrected spelling -->
        </div>
        <?php if (!empty($msg)) { ?> <!-- Display error message -->
          <div class="error"><?php echo $msg; ?></div>
        <?php } ?>
      </form>
    </div>
  </div>
</body>

</html>
