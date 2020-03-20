<?php
$server = "localhost";
$user = "root";
$pword = "root";
$DBname = "corpoh9";

$connect = mysqli_connect($server,$user,$pword,$DBname) or die("error en conexion ".mysqli_connect_error());
mysqli_set_charset($connect, "utf8");
?>