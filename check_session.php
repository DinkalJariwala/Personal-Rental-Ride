<?php
session_start();
if(!isset($_SESSION['owner']))
{
header("location:login_seller.php");
}
?>