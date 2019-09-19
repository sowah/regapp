<?php
$servername = "localhost";
$username = "root";
$password = "";
//$password = "@pdT,2]eKw?{";
// $username = "mobilead_mobcyb";
// $password = "Sr4ywDJ";

try {
    $conn = new PDO("mysql:host=$servername;dbname=website_formncsc", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
