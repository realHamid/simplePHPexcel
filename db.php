<?php

$db_name = "margorate";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";


$db   = new mysqli($db_host,$db_user,$db_pass,$db_name);
@mysqli_query($db,"SET NAMES utf8");
@mysqli_query($db,"SET CHARACTER SET utf8");
@mysqli_set_charset($db,'utf8');


?>