<?php
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "holodb";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}

