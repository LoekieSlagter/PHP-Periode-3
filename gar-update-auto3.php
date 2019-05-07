<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>gar-update-auto3.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<div class="background">
    <body>
    <h1>Garage Update Auto 3</h1>
    <p>Autogegevens wijzigen in de tabel klant van de database garage.</p>

    <?php
    $id                = $_POST["idvak"];
    $autokenteken      = $_POST["autokentekenvak"];
    $automerk          = $_POST["automerkvak"];
    $autoype           = $_POST["autotypevak"];
    $autokmstand       = $_POST["autokmstandvak"];
    $klant_id          = $_POST["klant_idvak"];

    require_once "gar-connect.php";

    $sql = $conn->prepare
    ("
        update auto set   autokenteken       = :autokenteken,
                          automerk           = :automerk,
                          autotype           = :autotype,
                          autokmstand        = :autokmstand,
                          klant_id           = :klant_id
                          where              id = :id
     ");

    $sql->execute
    ([
        "id"            => $id,
        "autokenteken"  => $autokenteken,
        "automerk"      => $automerk,
        "autotype"      => $autoype,
        "autokmstand"   => $autokmstand,
        "klant_id"      => $klant_id,
    ]);

    echo "De auto is gewijzigd. <br />";
    echo "<a href='gar-menu.php'> Terug naar menu </a>";

    ?>

    </body>
</div>
</html>