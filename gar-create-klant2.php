<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-create-klant2.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <h1>Garage create klant 2</h1>
    <p>Een klant toevoegen aan de tabel klant in de database garage.</p>

    <?php

    $id                 = NULL;
    $klantnaam          = $_POST["klantnaamvak"];
    $klantadres         = $_POST["klantadresvak"];
    $klantpostcode      = $_POST["klantpostcodevak"];
    $klantplaats        = $_POST["klantplaatsvak"];

    require_once "gar-connect.php";

    $sql = $conn->prepare("
                            insert into klant values 
                             (
                                  :id, :klantnaam, :klantadres, :klantpostcode, :klantplaats)");

//    $sql->bindParam(":klantid",         $id);
//    $sql->bindParam(":klantnaam",         $klantnaam);
//    $sql->bindParam(":klantadres",         $klantadres);
//    $sql->bindParam(":klantpostcode",         $klantpostcode);
//    $sql->bindParam(":klantplaats",         $klantplaats);
//
//    $sql-> execute();

    $sql->execute([
                    "id"                => $id,
                    "klantnaam"         => $klantnaam,
                    "klantadres"        => $klantadres,
                    "klantpostcode"     => $klantpostcode,
                    "klantplaats"       => $klantplaats
                ]);

    echo "De klant is toegevoegd <br />";
    echo "<a href='gar-menu.php'>Terug naar het menu </a>";

    ?>


</body>
</html>