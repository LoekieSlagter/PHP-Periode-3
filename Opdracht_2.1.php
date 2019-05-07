<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
$usernames = array ("Loekie", "Imran", "Nigell", "Weiyi");

$username = $_POST["username"];
$password = $_POST["password"];

$gevonden=false;
for($i=0; $i< count($usernames); $i++)
{
    if($username == $usernames[$i])
    {$gevonden = true;}
}
if($gevonden)
{ echo "Fout, username bestaat al";}
else
{ echo "Succes, account is aangemaakt";}

?>

<!-- $_POST is beter omdat POST gelijk laat zien, GET moet je helemaal opvragen. -->

</body>
</html>