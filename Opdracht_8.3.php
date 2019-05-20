<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opdracht 8.3</title>
</head>
<body>

<?php
$username = $_POST["usernamevak"];
$password = $_POST["passwordvak"];

require_once "Olifant_connect.php";

$users = $conn->prepare("
                                select *
                                  from users
                                 ");

$users->execute();
$user = $users ->fetch(PDO::FETCH_ASSOC);

echo "<form method='post' action='Opdracht_8.4.php'>";

echo "id: . <input type='text' ";
echo "<input type='hidden' name='idvak' ";
echo " value=' " . $user["id"] . " '> <br /> ";

echo " username: <input type='text' ";
echo "<input type='hidden' name='usernamevak' ";
echo " value=' " . $user["username"] . " '> <br /> ";

echo " password: <input type='password' ";
echo " name = 'passwordvak' ";
echo " value = '" .$user["password"]. "' ";
echo " <br /> ";

echo " created_at: <input type='datetime' ";
echo " name = 'created_atvak' ";
echo " value = '" .$user["created_at"]. "' ";
echo " <br /> ";

echo " Rol: <input type='text' ";
echo " name = 'Rolvak' ";
echo " value = '" .$user["Rol"]. "' ";
echo " <br /> ";

echo "<input type='submit'>";
echo "</form>";

?>

</body>
</html>