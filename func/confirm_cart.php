<?php
session_start();
include('../includes/db.php');
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $get = "select * from cart where user_email='$email' and status='0'";
    $run = mysqli_query($con,$get);
    while($row = mysqli_fetch_array($run)){
        $id = $row['id'];
        #
        $update = "update cart set status='1' where id=$id";
        $run_update = mysqli_query($con, $update);
    }
    header('Location: ../profile.php');
}
?>