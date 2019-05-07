<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>gar-search-klant2.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<h1>Garage zoek op autoID 2</h1>
<p>Op autoID gegevens zoeken uit de tabel klanten van de database garage</p>

<?php
$id = $_POST["idvak"];

require_once "gar-connect.php";

$klanten = $conn->prepare("
                                select id,
                                       autokenteken,
                                       automerk,
                                       autotype,
                                       autokmstand,
                                       klant_id
                                  from auto
                                 where id = :id
                                 ");

$klanten->execute(["id" => $id]);

echo "<table>";
foreach ($klanten as $auto)
{
    echo "<tr>";
    echo "<td>" . $auto["id"]              ."</td>";
    echo "<td>" . $auto["autokenteken"]    ."</td>";
    echo "<td>" . $auto["automerk"]        ."</td>";
    echo "<td>" . $auto["autotype"]        ."</td>";
    echo "<td>" . $auto["autokmstand"]      ."</td>";
    echo "<td>" . $auto["klant_id"]        ."</td>";
    echo "</tr>";
}

echo "</table><br />";
echo "<a href='gar-menu.php'>Terug naar het menu </a>";

?>

</body>
</html>
