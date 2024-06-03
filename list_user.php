<?php
include('check_session.php');
include("conn.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Jari Mart List Of User Page...</title>
    <?php include('up_link.php'); ?>
    <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
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
                                <h4 class="pull-left page-title">List Of User</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Personal Rental Ride</a></li>
                                    <li><a href="index.php">User</a></li>
                                    <li class="active">User</li>
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
                                            <h3 class="panel-title">List Of User</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Email Id</th>
                                                <th>Contact No</th>
                                                <th>Licence No</th>
                                                <th>Adhar No</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "select *
                                                from user";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $user_id=$row['user_id'];
                                            ?>
                                                <tr>
                                                    <td><?php echo ucwords($row['user_name']); ?></td>
                                                    <td><?php echo $row['user_mail']; ?></td>
                                                    <td><?php echo $row['user_mobile']; ?></td>
                                                    <td><?php echo $row['user_licence_no']; ?></td>
                                                    <td><?php echo $row['user_adharcard_no']; ?></td>
                                                    <!-- <td>
                                                        <?php
                                                        $status = $row['status'];
                                                        ?>
                                                        <label class="switch">
                                                            <input class="chkStatus" data-sid="
                                                            <?php echo $seller_id;?>" type="checkbox" 
                                                            <?php if ($status == 1) echo "checked"; ?>>
                                                            <span class="slider round"></span>
                                                        </label>

                                                    </td> -->
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
            <?php include('footer.php'); ?>
        </div>
    </div>
    <?php include('down_link.php'); ?>
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
    <!-- <script>
        $(document).ready(function(){
            $('.chkStatus').click(function(){
                var status=$(this).is(':checked');
                var id=$(this).data('sid');
                if(status)
                {
                    //update status 0
                    window.location="update_status.php?status=0&id="+id;

                }
                else
                {
                    //update status 0
                    window.location="update_status.php?status=1&id="+id;
                }
            });
        });
    </script> -->
    </body>
</html>