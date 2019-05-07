<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opdracht 1</title>
</head>
<body>

<h1>Lijst van alle natuurlijke getallen deelbaar door 3 en/of 5</h1>

<?php

$totaal = 0;
for($i = 1000; $i>=1  ;$i--)
{
    if ($i % 3 == 0 || $i % 5 == 0)
    {
        $totaal = $totaal+ $i;
    }
}

echo "Het totaal van 3 en 5 delers onder de 1000 = " .$totaal;


?>

</body>
</html>