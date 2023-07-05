<?php
session_start();
$databasenaam = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$databasenaam;dbname=menu", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connected succesfully";
} catch (PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();

}