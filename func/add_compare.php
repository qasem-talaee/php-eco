<?php
session_start();
$id = $_GET['id'];
$_SESSION['compare'] = $_SESSION['compare'].$id;
header('Location: ../compare.php');
?>