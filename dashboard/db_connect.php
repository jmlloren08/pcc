<?php

$servername = "localhost";
$db_name = "db_pcclaw";
$user = "root";
$pass = "";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $user, $pass);
    // enable niya ang error reporting below...
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("Connection failed: " . $e->getMessage());
}