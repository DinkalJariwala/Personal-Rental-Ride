<?php
session_start();
if (!isset($_SESSION['owner'])) {
  header("location:login_seller.php");
}
$owner_id = $_SESSION['owner_id'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Personal Rental Ride Main Page...</title>
  <?php include ('up_link.php'); ?>
</head>

<body class="fixed-left">
  <div id="wrapper">
    <div class="topbar">
      <?php include ('top_bar.php'); ?>
    </div>
    <div class="left side-menu">
      <?php include ('left_side_menu.php'); ?>
    </div>
    <div class="content-page">
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header-title">
                <h4 class="pull-left page-title">Dashboard</h4>
                <ol class="breadcrumb pull-right">
                  <li><a href="index.php">Personal Rental Ride</a></li>
                  <li><a href="index.php">Dashboard</a></li>
                </ol>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="panel panel-dark text-center">
                <div class="panel-heading">
                  <h4 class="panel-title">Total Vehicle</h4>
                </div>
                <div class="panel-body">
                  <p>
                    <?php
                    include ("conn.php");
                    $sql5 = "SELECT `v_id` from vehicle where owner_id = $owner_id";
                    $query5 = mysqli_query($conn, $sql5);
                    $row5 = mysqli_num_rows($query5);

                    echo '<h3> <b>' . $row5 . '</b></h3';

                    ?>
                  </p>
                </div>
              </div>
            </div>
          </div>


          <div class="col-sm-6 col-lg-3">
            <div class="panel panel-dark text-center">
              <div class="panel-heading">
                <h4 class="panel-title">Total Order</h4>
              </div>
              <div class="panel-body">
                <p>
                  <?php
                  include ("conn.php");
                  $sql5 = "SELECT * FROM book_tbl as b
                    join vehicle as v on
                    v.v_id =b.v_id where owner_id= (select owner_id from owner where owner_id = '$owner_id')";
                  $query5 = mysqli_query($conn, $sql5);
                  $row5 = mysqli_num_rows($query5);

                  echo '<h3> <b>' . $row5 . '</b></h3';

                  ?>
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>
      <?php include ('footer.php'); ?>
    </div>
  </div>
  <?php include ('down_link.php'); ?>
</body>

</html>