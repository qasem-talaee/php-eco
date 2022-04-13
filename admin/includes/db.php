<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'eco';
$con = mysqli_connect($db_host, $db_username, $db_password, $db_name);
mysqli_set_charset($con,'utf8');
?>