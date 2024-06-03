<?php
session_start();
//include ('check_session.php');
include ("conn.php");
$owner_id = $_SESSION['owner_id'];
if (isset($_POST['btnS'])) {
    $category = $_POST['category'];
    $pn = $_POST['txtPName'];
    $price = $_POST['txtPPrice'];
    $brand = $_POST['txtbrand'];
    $model = $_POST['txtmodel'];
    $seat = $_POST['txtseat'];
    $fueltype = $_POST['txtfueltype'];
    $v_number=$_POST['txtvnumber'];
    //$img = $_POST['txtPImg'];
    $photo = $_FILES['txtPImg']['name'];
    $photo = strtolower($photo);
    $file_name = $owner_id . "_" . $photo;
    $temp = explode(".", $photo);
    $ext = end($temp);
    $size = $_FILES['txtPImg']['size'];
    $size = $size / 1024; //KB
    $size = $size / 1024; //Now its in MB
    $error = array();
    if ($size > 50) { //more then 50 mb is not allowed 
        $error[] = "File size is larger";
    }
    $allowed_ext = array('jpg', 'png', 'jpeg');
    if (in_array($ext, $allowed_ext) === false) {
        $error[] = "Only JPEG,PNG,JPG File IS Allowd...";
    }
    if (empty($error)) {
        $tmp_name = $_FILES['txtPImg']['tmp_name'];
        move_uploaded_file($tmp_name, "product image/" . $file_name);
        $img = $file_name;
        $sql = "insert into vehicle(`v_id`,`cate_id`,`v_brand`,`v_name`,`v_model`,`v_fuel_type`,`v_seat`,`owner_id`,`v_rentprice`,`v_img`,`v_number`) 
        values(null,'$category','$brand','$pn','$model','$fueltype','$seat','$owner_id','$price','$img','$v_number') ";
        mysqli_query($conn, $sql);
        echo "<script>
            alert('insert successfully...');
            window.location='vehicle_info.php';
        </script>";
        //header("location:product_info.php");
    } else {
        $error[] = "Somthig Wrong...";
        print_r($error);
        exit();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Owner Vehicle Page...</title>
    <?php include ('up_link.php'); ?>
    <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
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
                                <h4 class="pull-left page-title">Vehicle Information</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Perosnal Rental Ride</a></li>
                                    <li><a href="index.php">Vehicle Information</a></li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h3 class="panel-title">List Of Vehicle</h3>
                                        </div>
                                        <div class="col-md-3" align="right">
                                            <a class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                                <i class="fa fa-plus"></i> Add New Vehicle</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>model</th>
                                                <th>Brand</th>
                                                <th>Fuel Type</th>
                                                <th>Seat</th>
                                                <th>Vehicle image</th>
                                                <th>Vehicle Number</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT *
                                                from vehicle where owner_id = $owner_id ";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $owner_id = $row['owner_id'];
                                                $v_id = $row['v_id']
                                                    ?>
                                                <tr>
                                                    <td>
                                                        <?php echo ucwords($row['v_name']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['v_model']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['v_brand']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['v_fuel_type']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['v_seat']; ?>
                                                    </td>
                                                    <td><img src="product image/<?php echo $row['v_img']; ?>"
                                                            style="height:200px;widht:200px" />
                                                    </td>
                                                    <td>
                                                        <?php echo $row['v_number']; ?>
                                                    </td>
                                                    <td align="center">
                                                        <!-- <a href="update.php?id=<?php echo $v_id; ?>">
                                                            <i class="fa fa-pencil" style="color:green;"></i>
                                                        </a> -->

                                                        <a href="delete.php?id=<?php echo $v_id; ?>">
                                                            <i class="fa fa-trash" style="color:red;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                Insert New Vehicle
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Vehicle Name</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="pname" name="txtPName" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Vehicle Price</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="pprice" name="txtPPrice" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Brand Name</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="txtbrand" name="txtbrand" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Model</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="txtmodel" name="txtmodel" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Fuel Type</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="txtfueltype" name="txtfueltype" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Vehicle Number</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="txtvnumber" name="txtvnumber" pattern="[A-Za-z]{2}\s[0-9]{2}\s[A-Za-z]{1,2}\s[0-9]{4}" title="Enter a valid vehicle number (e.g., AB 12 CD 1234)" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Seat</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="txtseat" name="txtseat" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Product Category</label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="category" name="category">
                                            <option value="-1" disabled selected>-----Select Category -----</option>
                                            <?php
                                            $q = mysqli_query($conn, "select * from v_category");
                                            while ($row = mysqli_fetch_assoc($q)) {
                                                echo "<option value='" . $row['cate_id'] . "'>" . $row['cate_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Vehicle Image</label>
                                    <div class="col-md-7">
                                        <input type="file" class="form-control" id="pimage" name="txtPImg" />
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default waves-effect" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" name="btnS" class="btn btn-primary waves-effect waves-light">
                                Insert Vehicle
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php include ('footer.php'); ?>
        </div>
    </div>
    <?php include ('down_link.php'); ?>
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
    <script src="assets/plugins/datatables/jszip.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>
    <script src="assets/pages/datatables.init.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
    <script>
        jQuery(document).ready(function () {
            $(".wysihtml5").wysihtml5();

        });
    </script>
</body>

</html>