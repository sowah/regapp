<?php
$servername = "localhost";
//$username = "root";
//$password = "badger761676";
//$password = "@pdT,2]eKw?{";
 $username = "cybersecsec";
 $password = "B3nj!CeaGH9N4";

try {
    $conn = new PDO("mysql:host=$servername;dbname=cybersec_ncsc_ncsam_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
