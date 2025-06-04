<?php

$city="barcelona";
$appid= "761e204caa9eda6dde4b4646cf7a4e80";
$units="metric";
$lang="es";



$URL= "https://api.openweathermap.org/data/2.5/weather?units=$units&lang=$lang&q=$city&appid=$appid";

$data=file_get_contents($URL);
$json_meteo=json_decode($data,true);


/* echo "<pre>";
print_r($json_meteo);
echo "</pre>"; */

$icono=$data["weather"][0]["icon"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="https://www.imelcf.gob.pa/wp-content/plugins/location-weather/assets/images/icons/weather-icons/<?php echo $icono ?>.svg" alt="">
</body>
</html>