<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>opdracht 4.2</title>
</head>
<body>
<h1>Account registratie 2</h1>

<?php

$usernamePOST          = $_POST["usernamevak"];
$passwordPOST          = $_POST["passwordvak"];
$passwordPOST          = password_hash($passwordPOST, PASSWORD_DEFAULT);

require_once "Olifant_connect.php";

$sql = $conn->prepare("
                            insert into users(username, password) values 
                             (:username, :password)");

$sql->execute([
    "username"         => $usernamePOST,
    "password"        => $passwordPOST
]);

echo "Uw account is geregistreerd. <br />";
//echo password_hash($passwordPOST, PASSWORD_DEFAULT);

?>

</body>
</html>