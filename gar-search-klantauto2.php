<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>gar-search-klant2.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<h1>Garage zoek op klantID 2</h1>
<p>Op klantID gegevens zoeken uit de tabel klanten van de database garage</p>

<?php
$klantid = $_POST["klantidvak"];

require_once "gar-connect.php";

$klanten = $conn->prepare("
                                select klant.id,
                                       klantnaam,
                                       klantadres,
                                       klantpostcode,
                                       klantplaats,
                                       auto.id,
                                       autokenteken,
                                       automerk,
                                       autotype, 
                                       autokmstand,
                                       klant_id
                                  from klant, auto
                                 where klant.id = :klantid
                                 AND auto.klant_id = klant.id
                                 ");

$klanten->execute(["klantid" => $klantid]);

echo "<table>";
foreach ($klanten as $klant)
{
    echo "<tr>";
//    echo "<td>" . $klant["klant.id"]         ."</td>";
    echo "<td>" . $klant["klantnaam"]        ."</td>";
    echo "<td>" . $klant["klantadres"]       ."</td>";
    echo "<td>" . $klant["klantpostcode"]    ."</td>";
    echo "<td>" . $klant["klantplaats"]      ."</td>";
//    echo "<td>" . $klant["auto.id"]          ."</td>";
    echo "<td>" . $klant["autokenteken"]     ."</td>";
    echo "<td>" . $klant["automerk"]         ."</td>";
    echo "<td>" . $klant["autotype"]         ."</td>";
    echo "<td>" . $klant["autokmstand"]      ."</td>";
    echo "<td>" . $klant["klant_id"]         ."</td>";
    echo "</tr>";
}

echo "</table><br />";
echo "<a href='gar-menu.php'>Terug naar het menu </a>";

?>

</body>
</html>