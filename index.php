<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Personal Rental Ride Main Page...</title>
  <?php include('up_link.php'); ?>
</head>

<body class="fixed-left">
  <div id="wrapper">
    <div class="topbar">
      <?php include('top_bar.php'); ?>
    </div>
    <div class="left side-menu">
      <?php include('left_side_menu.php'); ?>
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
                  <h4 class="panel-title">Total User</h4>
                </div>
                <div class="panel-body">
                  <p>
                    <?php
                    include("conn.php");
                    $sql = "select user_id from user order by user_id";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_num_rows($query);

                    echo '<h3> <b>' . $row . '</b></h3';

                    ?>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-3">
              <div class="panel panel-dark text-center">
                <div class="panel-heading">
                  <h4 class="panel-title">Total Owner</h4>
                </div>
                <div class="panel-body">
                  <p>
                    <?php
                    include("conn.php");
                    $sql1 = "select owner_id from owner order by owner_id";
                    $query1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_num_rows($query1);

                    echo '<h3> <b>' . $row1 . '</b></h3';

                    ?>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-3">
              <div class="panel panel-dark text-center">
                <div class="panel-heading">
                  <h4 class="panel-title">Total Vehicles</h4>
                </div>
                <div class="panel-body">
                  <p>
                    <?php
                    include("conn.php");
                    $sql2 = "select v_id from vehicle order by v_id";
                    $query2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_num_rows($query2);
                    echo '<h3> <b>' . $row2 . '</b></h3';
                    ?>
                  </p>
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
                    include("conn.php");
                    $sql2 = "select order_id from book_tbl order by order_id";
                    $query2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_num_rows($query2);
                    echo '<h3> <b>' . $row2 . '</b></h3';
                    ?>
                  </p>
                </div>
              </div>
            </div>

            <!-- <div class="col-sm-6 col-lg-3">
              <div class="panel panel-dark text-center">
                <div class="panel-heading">
                  <h4 class="panel-title">Feedback Status</h4>
                </div>
                <div class="panel-body">
                  <p>
                    <?php
                    include("conn.php");
                    /*$sql4 = "select feedback_id from tbl_feedback where feedback_type = 1";
                    $query4 = mysqli_query($conn, $sql4);
                    $row4 = mysqli_num_rows($query4);
                    echo '<h3> <b>' . $row4 . '</b></h3';*/
                    ?>
                  </p>
                </div>
              </div>
            </div> -->

          </div>
        </div>
      </div>
      <?php include('footer.php'); ?>
    </div>
  </div>
  <?php include('down_link.php'); ?>
</body>

</html>