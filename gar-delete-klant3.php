<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>gar-delete-klant3.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<h1>Garage Delete Klant 3</h1>
<p>Op klantID gegevens zoeken uit de tabel klanten van de database garage zodat ze verwijderd kunnen worden.</p>

<?php
    $id              = $_POST["klantidvak"];
    $verwijderen     = $_POST["verwijdervak"];

    if ($verwijderen)
    {
        require_once "gar-connect.php";

        $sql = $conn->prepare("
                                delete from klant
                                where id = :id
         ");
        $sql->execute(["id" => $id]);

        echo "De gegevens zijn verwijderd. <br />";
    }
    else
    {
        echo "De gegevens zijn niet verwijderd. <br />";
    }
    echo "<a href='gar-menu.php'> Terug naar menu. </a>";

?>

</body>
</html>