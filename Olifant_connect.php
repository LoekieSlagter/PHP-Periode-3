<?php

$servername = "localhost";
$dbname = "olifant";
$uname = "root";
$pword = "";

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $uname, $pword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connectie gelukt";
}
catch (PDOException $e){
    echo "Connectie mislukt: " . $e->getMessage();
}

?>