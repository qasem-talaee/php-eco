<?php
session_start();
include('../includes/db.php');
if(!isset($_SESSION['admin'])){
    header('Location: ../index.php');
}
$id = $_GET['id'];
$del = "delete from pro where id=$id";
$run = mysqli_query($con, $del);
if($run){
    header('Location: ../index.php');
}
?>