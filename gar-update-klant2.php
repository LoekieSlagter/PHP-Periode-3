<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>gar-search-klant2.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="background">
<h1>Garage zoek op klantID 2</h1>
<p>Op klantID gegevens zoeken uit de tabel klanten van de database garage</p>

<?php
    $id = $_POST["klantidvak"];

    require_once "gar-connect.php";

    $selectklant = $conn->prepare("
                                select id,
                                       klantnaam,
                                       klantadres,
                                       klantpostcode,
                                       klantplaats
                                  from klant
                                 where id = :id
                                 ");

    $selectklant->execute([":id" => $id]);
    $klant = $selectklant->fetch(PDO::FETCH_ASSOC);

    echo "<form method='post' action='gar-update-klant3.php'>";
//    foreach ($klanten as $klant)
//    {
        echo "id:" . $klant["id"];
        echo "<input type='hidden' name='klantidvak' ";
        echo " value=' " . $klant["id"] . " '> <br /> ";

        echo " klantnaam: <input type='text' ";
        echo " name = 'klantnaamvak' ";
        echo " value = '" .$klant["klantnaam"]. "' ";
        echo " <br /> ";

        echo " klantadres: <input type='text' ";
        echo " name = 'klantadresvak' ";
        echo " value = '" .$klant["klantadres"]. "' ";
        echo " <br /> ";

        echo " klantpostcode: <input type='text' ";
        echo " name = 'klantpostcodevak' ";
        echo " value = '" .$klant["klantpostcode"]. "' ";
        echo " <br /> ";

        echo " klantplaats: <input type='text' ";
        echo " name = 'klantplaatsvak' ";
        echo " value = '" .$klant["klantplaats"]. "' ";
        echo " <br /> ";
//    }

    echo "<input type='submit'>";
    echo "</form>";
?>

</div>
</body>
</html>
