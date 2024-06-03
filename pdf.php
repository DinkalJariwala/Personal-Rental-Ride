<?php
session_start();
include_once('check_session_user.php');
include_once('conn.php');

// Fetch user ID from session
$user_id = $_SESSION['user'];

// Fetch v_id from query string
$v_id = $_GET['v_id'];

// Fetch user and booking information based on user mail and v_id
$sql = "
    SELECT u.*, c.*, v.*
    FROM user AS u
    JOIN book_tbl AS c ON c.user_id = u.user_id
    JOIN vehicle AS v ON v.v_id = c.v_id
    WHERE u.user_mail = '$user_id' AND v.v_id = '$v_id'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Fetch owner information based on vehicle ID
$sql2 = "
    SELECT o.owner_name, o.owner_mobile, o.owner_address, o.owner_email
    FROM owner AS o
    JOIN vehicle AS v ON v.owner_id = o.owner_id
    WHERE v.v_id = '$v_id'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);

$license_no = $row['license_no'];
$email = $row['user_mail'];
$mno= $row['user_mobile'];
$owner_name= $row2['owner_name'];
$owner_contact= $row2['owner_mobile'];
$owner_mail = $row2['owner_email'];
$owner_address = $row2['owner_address'];
$pinfo = $row['v_name'];
$vehicle_no = $row['v_number'];
$Stat_Date = $row['from_date'];
$endDate = $row['to_date'];
$rent = $row['total_rent'];
// $tid = 9865321;//date+time+mmsec 300320220945

require ("fpdf/fpdf.php");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial", "", 12);
$pdf->Cell(0, 10, "Transaction Details", 1, 1, 'C');

$pdf->Cell(50, 10, "License No", 1, 0);
$pdf->Cell(0, 10, $license_no, 1, 1);

$pdf->Cell(50, 10, "Email", 1, 0);
$pdf->Cell(0, 10, $email, 1, 1);

$pdf->Cell(50, 10, "Mobile NO", 1, 0);
$pdf->Cell(0, 10, $mno, 1, 1);

$pdf->Cell(50, 10, "Owner Naame", 1, 0);
$pdf->Cell(0, 10, $owner_name, 1, 1);

$pdf->Cell(50, 10, "Owner Number", 1, 0);
$pdf->Cell(0, 10, $owner_contact, 1, 1);

$pdf->Cell(50, 10, "Owner email ID", 1, 0);
$pdf->Cell(0, 10, $owner_mail, 1, 1);

$pdf->Cell(50, 10, "Owner Address", 1, 0);
$pdf->Cell(0, 10, $owner_address, 1, 1);

$pdf->Cell(50, 10, "Vehicle Name", 1, 0);
$pdf->Cell(0, 10, $pinfo, 1, 1);

$pdf->Cell(50, 10, "Vehicle Number", 1, 0);
$pdf->Cell(0, 10, $vehicle_no, 1, 1);

$pdf->Cell(50, 10, "Start Date", 1, 0);
$pdf->Cell(0, 10, $Stat_Date, 1, 1);

$pdf->Cell(50, 10, "End Date", 1, 0);
$pdf->Cell(0, 10, $endDate, 1, 1);

$pdf->Cell(50, 10, "Total Rent", 1, 0);
$pdf->Cell(0, 10, $rent, 1, 1);

$file = time() . '.pdf';
$pdf->output($file, 'D');


?>

<script>
window.location="index.php";
</script>
