<?php
session_start();

$username = $_POST["usernamevak"];
$password = $_POST["passwordvak"];

require_once "Olifant_connect.php";

$users = $conn->prepare("
                                    select username,
                                            password,
                                            Rol
                                    from users
                                    ");
$users->execute();

$adminGevonden = false;
$userGevonden = false;

foreach($users as $user)
{
    if ($username == $user["username"])
    {
        if (password_verify($password, $user["password"]))
        {

            if ($user["Rol"] === "Admin")
                $adminGevonden = true;
            if ($user["Rol"] === "User")
                $userGevonden = true;
        }
        else
        {
            echo'Helaas, niet ingelogd';
        }
    }
}

if ($adminGevonden)
{
    echo ("Welkom " . $username . ", je bent ingelogd als administrator");
    $_SESSION["ingelogd"] = true;
    require_once "opdracht_7.3.php";
    session_destroy();
}

if ($userGevonden)
{
    echo ("Welkom " . $username . ", je bent niet ingelogd als admin");
    $_SESSION["ingelogd"] = true;
    session_destroy();
}

echo ("</br>");