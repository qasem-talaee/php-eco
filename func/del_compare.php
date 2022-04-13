<?php
session_start();
$id = $_GET['id'];
$first = $_SESSION['compare'];
$_SESSION['compare'] = trim($first, $id);
header('Location: ../compare.php');
?>