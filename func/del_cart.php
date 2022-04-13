<?php
include('get_ip.php');
include('../includes/db.php');
session_start();
$id = $_POST['id'];
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $get = "select * from cart where user_email='$email' and pro_id='$id' and status='0'";
    $run = mysqli_query($con, $get);
    if(mysqli_num_rows($run) != 0){
        $del = "delete from cart where user_email='$email' and pro_id='$id' and status='0'";
        $run = mysqli_query($con, $del);
    }
    header('Location: ../index.php');
}else{
    $ip = getUserIP();
    $get = "select * from uncart where ip='$ip' and pro_id='$pro_id'";
    $run = mysqli_query($con , $get);
    if(mysqli_num_rows($run) != 0){
        $del = "delete from uncart where ip='$ip' and pro_id='$pro_id'";
        $run = mysqli_query($con, $del);
    }
    header('Location: ../index.php');
}
?>