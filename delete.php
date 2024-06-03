<?php
include('conn.php');
$pid = $_GET['id'];

// if order is exists then can't delete
$dql1="SELECT * FROM book_tbl WHERE v_id='$pid'";
$result1 = mysqli_query($conn, $dql1);
if(mysqli_num_rows($result1) > 0){

    while ($row2 = mysqli_fetch_assoc($result1)) {
        $from_date = $row2['from_date'];
        $to_date = $row2['to_date'];

        // Assuming current date is stored in $current_date
        $current_date = date('Y-m-d');

        // Check if the current date falls between from_date and to_date
        if ($current_date >= $from_date && $current_date <= $to_date) {
            echo "<script>";
          echo "alert ('You Cant Delete This Because This Vehicle Exist In Order List. After Completion Of Order You Should Be Delete..');";
          echo "window.location='vehicle_info.php'";
          echo "</script>";
            break; // No need to check further bookings
        }
        else{
            $sql="DELETE FROM `tbl_product` WHERE product_id=$pid";
            mysqli_query($conn,$sql);
            echo "<script>";
                echo  "alert ('Deleted Sucessfully..');";
                echo "window.location='vehicle_info.php'";
            echo "</script>";
            
        }
    }

}


?>
