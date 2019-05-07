<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>gar-update-klant3.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<div class="background">
<body>
<h1>Garage Update Klant 3</h1>
<p>Klantgegevens wijzigen in de tabel klant van de database garage.</p>

<?php
    $id             = $_POST["klantidvak"];
    $klantnaam      = $_POST["klantnaamvak"];
    $klantadres     = $_POST["klantadresvak"];
    $klantpostcode  = $_POST["klantpostcodevak"];
    $klantplaats    = $_POST["klantplaatsvak"];

    require_once "gar-connect.php";

    $sql = $conn->prepare
    ("
        update klant set  klantnaam       = :klantnaam,
                          klantadres      = :klantadres,
                          klantpostcode   = :klantpostcode,
                          klantplaats     = :klantplaats
                          where        id = :id
     ");

$sql->execute
([
    "id"            => $id,
    "klantnaam"     => $klantnaam,
    "klantadres"    => $klantadres,
    "klantpostcode" => $klantpostcode,
    "klantplaats"   => $klantplaats
]);

    echo "De klant is gewijzigd. <br />";
    echo "<a href='gar-menu.php'> Terug naar menu </a>";

?>

</body>
</div>
</html>