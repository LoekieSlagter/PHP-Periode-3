<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>gar-read-auto1.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<h1>Auto read klant</h1>
<p>
    Dit zijn alle gegevens uit de tabel auto van de database garage.
</p>
<?php

require_once "gar-connect.php";

$klanten = $conn->prepare(" 
                                        select  id,
                                                autokenteken,
                                                automerk,
                                                autotype,
                                                autokmstand,
                                                klant_id
                                        from    auto
                                        ");
$klanten-> execute();

echo "<table>";
foreach($klanten as $klant)
{
    echo "<tr>";
    echo "<td>" . $klant["id"]                   ."</td>";
    echo "<td>" . $klant["autokenteken"]         ."</td>";
    echo "<td>" . $klant["automerk"]            ."</td>";
    echo "<td>" . $klant["autotype"]           ."</td>";
    echo "<td>" . $klant["autokmstand"]        ."</td>";
    echo "<td>" . $klant["klant_id"]              ."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'>terug naar het menu</a>";
?>
</body>
</html>