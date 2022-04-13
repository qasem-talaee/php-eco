<?php
session_start();
include('../includes/db.php');
include('get_ip.php');
if(isset($_SESSION['email'])){
    $id = $_POST['id'];
    $email = $_SESSION['email'];
    if(!isset($_POST['count'])){
        $count = 1;
    }else{
        $count = $_POST['count'];
    }
    $get = "select * from cart where pro_id='$id' and user_email='$email' and status='0'";
    $run = mysqli_query($con, $get);
    $count_cart = mysqli_num_rows($run);
    if($count_cart != 0){
        $row = mysqli_fetch_array($run);
        $cart_id = $row['id'];
        $count_exist = (int)$row['count'];
        $count_new = (string)($count_exist + (int)$count);
        $update = "update cart set count='$count_new' where id=$cart_id";
        $run = mysqli_query($con, $update);
        if($run){
            header('Location: ../cart.php');
        }
    }else{
        $insert = "insert into cart (id, user_email, pro_id, count, date, status, send_status) values (NULL, '$email', '$id', '$count', NOW(), '0', '0')";
        $run = mysqli_query($con, $insert);
        if($run){
            header('Location: ../cart.php');
        }
    }
}else{
    $ip = getUserIP();
    $id = $_POST['id'];
    if(!isset($_POST['count'])){
        $count = 1;
    }else{
        $count = $_POST['count'];
    }
    $get = "select * from uncart where ip='$ip' and pro_id='$id'";
    $run = mysqli_query($con, $get);
    $count_cart = mysqli_num_rows($run);
    if($count_cart != 0){
        $row = mysqli_fetch_array($run);
        $count_exist = (int)$row['count'];
        $count_new = (string)($count_exist + (int)$count);
        $update = "update uncart set count='$count_new' where ip='$ip' and pro_id='$id'";
        $run = mysqli_query($con, $update);
        if($run){
            header('Location: ../cart.php');
        }
    }else{
        $insert = "insert into uncart (id, ip, pro_id, count) values (NULL,'$ip', '$id', '$count')";
        $run = mysqli_query($con, $insert);
        if($run){
            header('Location: ../cart.php');
        }
    }
}
?>