<!doctype html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht 7.2</title>
</head>
<body>

<?php

        require_once "Olifant_connect.php";

        $users = $conn->prepare("
                                            select id,
                                                   username, 
                                                   password,
                                                   created_at,
                                                   Rol 
                                            from   users
                                            ");

        $users->execute();

        echo "<table>";
            foreach($users as $user)
            {
                echo "<tr>";
                echo "<td>". $user ["id"]                      . "</td>";
                echo "<td>". $user["username"]                 . "</td>";
                echo "<td>". $user["password"]                 . "</td>";
                echo "<td>". $user["created_at"]               . "</td>";
                echo "<td>". $user["Rol"]                      . "</td>";
                echo "</tr>";
            }
            echo "</table>";

//            var_dump($_SESSION);

?>

<?php

$username= $_POST ["usernamevak"];
$password= $_POST ["passwordvak"];

require_once "Olifant_connect.php";

$users = $conn->prepare("
                                    select username, 
                                           password,
                                           Rol 
                                    from   users
                                    ");

$users->execute();

$gevonden = false;
$admin = false;
foreach ($users as $rij)

{
    if ($username == $rij ["username"])
    if ($admin == $rij ["admin"])
    {
        if (password_verify($password, $rij["password"]))
        if (password_verify($password, $rij["adminpassword"]))
        {
              $gevonden = true;
              if ($rij ["Rol"] == "admin")
              $admin = true;
        }
    }
}

if ($gevonden)
{
    echo ("Welkom " . $username . ", je bent ingelogd.");
    $_SESSION["Ingelogd"] = true;
    header("location;opdracht_7.3.php");
}
else
{
    echo ("Verkeerde inlog.");
    session_destroy();
}

if ($admin)
{
    echo ("Welkom " . $admin . ", je bent ingelogd als Admin");
    $_SESSION["Ingelogd"] = true;
    header("location;opdracht_7.3.php");
}

echo ("<br />");

//var_dump($_SESSION);

?>

</body>
</html>