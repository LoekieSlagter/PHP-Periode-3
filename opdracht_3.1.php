<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opdracht 3.1</title>
</head>
<body>

<?php

require_once  "Olifant_connect.php";

$users = $conn->prepare("
                                    select id,
                                           username,
                                           password,
                                           created_at
                                    from   users
                                    ");
$users->execute();

echo "<table>";
foreach($users as $users)
{
    echo "<ul>";
    echo "<ul>". $users["id"]                       . "</ul>";
    echo "<ul>". $users["username"]                . "</ul>";
    echo "<ul>". $users["password"]               . "</ul>";
    echo "<ul>". $users["created_at"]            . "</ul>";
    echo "</ul>";
}
echo "</table>";
?>

</body>
</html>