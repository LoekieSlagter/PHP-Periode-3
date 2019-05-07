<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>gar-read-klant.php</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <h1>Garage Read Klant</h1>
        <p>Dit zijn alle gegevens uit de tabel van de database garage</p>

        <?php

        require_once  "gar-connect.php";

        $klanten = $conn->prepare("
                                    select id,
                                           klantnaam,
                                           klantadres,
                                           klantpostcode,
                                           klantplaats
                                    from   klant
                                    ");
        $klanten->execute();

        echo "<table>";
            foreach($klanten as $klant)
            {
                echo "<tr>";
                echo "<td>". $klant["id"]                       . "</td>";
                echo "<td>". $klant["klantnaam"]                . "</td>";
                echo "<td>". $klant["klantadres"]               . "</td>";
                echo "<td>". $klant["klantpostcode"]            . "</td>";
                echo "<td>". $klant["klantplaats"]              . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<a href='gar-menu.php'> Terug naar het menu </a>";
            ?>

</body>
</html>