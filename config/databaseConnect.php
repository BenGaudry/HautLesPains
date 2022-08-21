<?php
session_start();

$user = 'root';
$password = 'root';
$db = 'hautlespains';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);