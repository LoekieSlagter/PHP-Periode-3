<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>gar-delete-auto2.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<h1>Garage Delete Auto 2</h1>
<p>Op autoID gegevens zoeken uit de tabel auto van de database zodat ze verwijderd kunnen worden</p>

<?php
$id = $_POST["idvak"];

require_once  "gar-connect.php";

$selectklant = $conn->prepare("
                                select id,
                                       autokenteken,
                                       automerk,
                                       autotype,
                                       autokmstand,
                                       klant_id
                                from   auto
                                where  id = :id                                      
                              ");
$selectklant->execute([":id" => $id]);
$klant = $selectklant->fetch(PDO::FETCH_ASSOC);

echo "<table>";
//foreach($klanten as $klant)
//{
echo "<tr>";
echo "<td>" . $klant["id"]            ."</td>";
echo "<td>" . $klant["autokenteken"]     ."</td>";
echo "<td>" . $klant["automerk"]    ."</td>";
echo "<td>" . $klant["autotype"] ."</td>";
echo "<td>" . $klant["autokmstand"]   ."</td>";
echo "<td>" . $klant["klant_id"]   ."</td>";
echo "</tr>";
//}
echo "</table><br />";
echo "<form action='gar-delete-auto3.php' method='post'>";

echo "<input type='hidden' name='idvak' value=$id>";
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze auto. <br />";
echo "<input type='submit'>";
echo "</form>";

?>

</body>
</html>