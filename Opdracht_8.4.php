<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
</head>
    <body>

    <?php

    require_once "Olifant_connect.php";

    $id             = $_POST["idvak"];
    $username       = $_POST["usernamevak"];
    $password       = $_POST["passwordvak"];
    $created_at     = $_POST["created_atvak"];
    $Rol            = $_POST["Rolvak"];

    $sql = $conn->prepare
    ("
        update users set   username        = :username,
                          password        = :password,
                          created_at      = :created_at,
                          Rol             = :Rol
                          where             username = :username
     ");

    $sql->execute
    ([
        "id"            => $id,
        "username"      => $username,
        "password"      => $password,
        "created_at"    => $created_at,
        "Rol"           => $Rol
    ]);

    echo "De user is gewijzigd. <br />";

    ?>

    </body>
</html>