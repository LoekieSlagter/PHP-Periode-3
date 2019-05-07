<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>gar-create-auto2.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <h1>garage create auto 2</h1>
    <p>
    Een auto toevoegen aan de tafel
    klant in de database garage.
    </p>
<?php

$id                 = $_POST  ["idvak"];
$autokenteken       = $_POST  ["autokentekenvak"];
$automerk           = $_POST  ["automerkvak"];
$autotype           = $_POST  ["autotypevak"];
$autokmstand        = $_POST  ["autokmstandvak"];
$klant_id            = $_POST ["klant_idvak"];

require_once "gar-connect.php";

$sql = $conn->prepare("
                                insert into auto values  
                                (
                                        :id,
                                        :autokenteken, 
                                        :automerk,
                                        :autotype, 
                                        :autokmstand, 
                                        :klant_id
                                )
                            ");

$sql->execute([
    "id"                => $id,
    "autokenteken"      =>  $autokenteken,
    "automerk"          =>  $automerk,
    "autotype"          =>  $autotype,
    "autokmstand"       =>  $autokmstand,
    "klant_id"          =>  $klant_id
]);

echo "de auto is toegevoegd";
echo "<a href='gar-menu.php'> terug naar het menu </a>";

?>
</body>
</html>