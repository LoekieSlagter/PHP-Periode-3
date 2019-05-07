<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opdracht 5.2</title>
</head>
<body>

<p>Opdracht 5.2, Geen dubbele users</p>

<?php

require_once "Olifant_connect.php";

$usernamePOST          = $_POST["usernamevak"];
$passwordPOST          = $_POST["passwordvak"];
$passwordPOST          = password_hash($passwordPOST, PASSWORD_DEFAULT);

$sql = $conn->prepare("
                               insert into users(username, password) values
                             (:username, :password)");

$sql->execute([
    "username"         => $usernamePOST,
    "password"        => $passwordPOST
]);

$users = $conn->prepare("
                                    select id,
                                           username,
                                           password,
                                           created_at
                                    from   users
                                    ");
$users->execute();

//$gevonden=false;
//for($i=0; $i< count($usernames); $i++)
//{
//    if($username == $username[$i])
//    {$gevonden = true;}
//}
//if($gevonden)
//{ echo "Fout, username bestaat al";}
//else
//{ echo "Succes, account is aangemaakt";}

?>

</body>
</html>