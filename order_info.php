<?php
session_start();
//include ('check_session.php');
include ("conn.php");
$owner_id = $_SESSION['owner_id'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Owner Order Page...</title>
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
                                <h4 class="pull-left page-title">Order Information</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Perosnal Rental Ride</a></li>
                                    <li><a href="index.php">Order Information</a></li>
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
                                        <div class="col-md-10">
                                            <h3 class="panel-title">List Of Order</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Vehicle image</th>
                                                <th>Vehicle Number</th>
                                                <th>user Name</th>
                                                <th>user Email ID</th>
                                                <th>user Contact No</th>
                                                <th>From Date</th>
                                                <th>To Date</th>
                                                <th>Total Rent</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql5 = "SELECT * FROM book_tbl AS b
                                            JOIN user AS u ON b.user_id = u.user_id 
                                            JOIN vehicle AS v ON b.v_id = v.v_id 
                                            WHERE v.owner_id = $owner_id";
                                            
                                            $query5 = mysqli_query($conn, $sql5);


                                            while ($row = mysqli_fetch_assoc($query5)) {
                                                $owner_id = $row['owner_id'];
                                                $v_id = $row['v_id']
                                                    ?>
                                                <tr>
                                                    
                                                    <td><img src="product image/<?php echo $row['v_img']; ?>"
                                                            style="height:50px;widht:50px" />
                                                    </td>
                                                    <td>
                                                        <?php echo $row['v_number']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['user_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['user_mail']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['user_mobile']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['from_date']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['to_date']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['total_rent']; ?>
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
                                        <input type="text" class="form-control" id="pname" name="txtPName" required />
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
                                        <input type="text" class="form-control" id="txtbrand" name="txtbrand"
                                            required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Model</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="txtmodel" name="txtmodel"
                                            required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Fuel Type</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="txtfueltype" name="txtfueltype"
                                            required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Vehicle Number</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="txtvnumber" name="txtvnumber"
                                            pattern="[A-Za-z]{2}\s[0-9]{2}\s[A-Za-z]{1,2}\s[0-9]{4}"
                                            title="Enter a valid vehicle number (e.g., AB 12 CD 1234)" required />
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