<?php

$servername = "localhost";
$db_name = "u981298853_db_pcclaw";
$user = "u981298853_root";
$pass = "P@55w0rd1234";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $user, $pass);
    // enable niya ang error reporting below...
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("Connection failed: " . $e->getMessage());
}