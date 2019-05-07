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
    <title>Opdracht 6.2</title>
</head>
<body>

<?php
    $username= $_POST ["usernamevak"];
    $password= $_POST ["passwordvak"];

    require_once "Olifant_connect.php";

$users = $conn->prepare("
                                    select username, 
                                           password 
                                    from   users
                                    ");

$users->execute();

$gevonden = false;
foreach ($users as $rij)
{
    if ($username == $rij ["username"])
    {
//        echo ("de username bestaat");
        if (password_verify($password, $rij["password"]))
        {
//            echo ("Het password klopt");
            $gevonden = true;
        }
    }
}

if ($gevonden)
{
    echo ("Welkom " . $username . ", je bent ingelogd.");
    $_SESSION["Ingelogd"] = true;
    header("location;opdracht_6.3.php");
}
else
{
    echo ("Verkeerde inlog.");
    session_destroy();
}
echo ("<br />");

?>

</body>
</html>