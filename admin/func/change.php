<?php
session_start();
include('../includes/db.php');
if(!isset($_SESSION['admin'])){
    header('Location: ../index.php');
}
$email = $_GET['email'];
$get = "select * from cart where user_email='$email' and status='1' and send_status='0'";
$run = mysqli_query($con, $get);
while($row = mysqli_fetch_array($run)){
    $id = $row['id'];
    $update = "update cart set send_status='1' where id=$id";
    $run_update = mysqli_query($con, $update);
}
header('Location: ../index.php');
?>