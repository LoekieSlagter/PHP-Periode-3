<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>gar-search-auto2.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="background">
    <h1>Garage zoek op autoID 2</h1>
    <p>Op autoID gegevens zoeken uit de tabel klanten van de database garage</p>

    <?php
    $id = $_POST["idvak"];

    require_once "gar-connect.php";

    $selectklant = $conn->prepare("
                                select id,
                                       autokenteken,
                                       automerk,
                                       autotype,
                                       autokmstand,
                                       klant_id
                                  from auto
                                 where id = :id
                                 ");

    $selectklant->execute([":id" => $id]);
    $klant = $selectklant->fetch(PDO::FETCH_ASSOC);

    echo "<form method='post' action='gar-update-auto3.php'>";
    //    foreach ($klanten as $klant)
//        {
    echo "id:" . $klant["id"];
    echo "<input type='hidden' name='idvak' ";
    echo " value=' " . $klant["id"] . " '> <br /> ";

    echo " autokenteken: <input type='text' ";
    echo " name = 'autokentekenvak' ";
    echo " value = '" .$klant["autokenteken"]. "' ";
    echo " <br /> ";

    echo " automerk: <input type='text' ";
    echo " name = 'automerkvak' ";
    echo " value = '" .$klant["automerk"]. "' ";
    echo " <br /> ";

    echo " autoype: <input type='text' ";
    echo " name = 'autotypevak' ";
    echo " value = '" .$klant["autotype"]. "' ";
    echo " <br /> ";

    echo " autokmstand: <input type='text' ";
    echo " name = 'autokmstandvak' ";
    echo " value = '" .$klant["autokmstand"]. "' ";
    echo " <br /> ";

    echo " klant_id: <input type='text' ";
    echo " name = 'klant_idvak' ";
    echo " value = '" .$klant["klant_id"]. "' ";
    echo " <br /> ";
    //    }

    echo "<input type='submit'>";
    echo "</form>";
    ?>

</div>
</body>
</html>