<?php


$num1 = 0;


//  IF

if ($num1 > 0) {
    echo "$num1 es mayor que 0 ";
} else if ($num1 < 0) {
    echo "$num1 es menor que 0";
} else {
    echo 'La variable $num1 es 0';
}

echo "<br>";

// SWITCH

switch ($num1) {

    case $num1 > 0:
        echo "$num1 es mayor que 0 ";
        break;

    case $num1 < 0:
        echo "$num1 es menor que 0";
        break;
    default:
        echo 'La variable $num1 es 0';
}

//valores que se asimilan a falso
/* Son el 0,el null ,'',"" */



echo "OPERADORES LOGICOS";

echo " and (y) => &&"."<br>";
echo " or (o) => ||"."<br>";
echo " not (no) => !="."<br>";


$num1=10;
$num2=30;

if ($num1==10 && $num2==20){
    echo "Se cumplen las dos condiciones";
}else if ($num1==10 || $num2==20){
    echo "Se cumple una de las dos condiciones";
}else{
    echo "No se cumple ninguna de las dos condiciones";
}