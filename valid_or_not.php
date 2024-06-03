<?php
include ('conn.php');
if (isset($_POST['contact'])) {
    $cn = $_POST['contact'];
    $sql = "select * from owner where owner_mobile  ='$cn'";
    $result = mysqli_query($conn, $sql);
    $cnt = mysqli_num_rows($result);
    if ($cnt == 1) {
        echo "1";
    } else {
        echo "0";
    }
}
if (isset($_POST['semail'])) {
    $email = $_POST['semail'];
    $sql = "select * from owner where owner_email='$email'";
    $result = mysqli_query($conn, $sql);
    $cnt = mysqli_num_rows($result);
    if ($cnt == 1) {
        echo "1";
    } else {
        echo "0";
    }
}

?>