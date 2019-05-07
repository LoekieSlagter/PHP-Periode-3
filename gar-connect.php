<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>gar-update-klant1.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<?php

$servername = "localhost";
$dbname = "garage";
$username = "root";
$password = "";

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connectie gelukt";
}
catch (PDOException $e){
    echo "Connectie mislukt: " . $e->getMessage();
}

?>

</body>
</html>