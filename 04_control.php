<?php

$num1 = 0;

while($num1<5){
    echo $num1."<br>";
    $num1++;
}
echo "************************"."<br>";
do{
    echo $num1."<br>";
    $num1++;
}
while($num1<5);

echo "************************"."<br>";

$miArray=['cerezas',"fresas","nisperos"];
$miArray[]= "ciruela";

// FOR NORMAL

for($i=0;$i<count($miArray);$i++){
    echo "$i. $miArray[$i]"."<br>";
}

echo "************************"."<br>";

// FOR EACH 

foreach($miArray as $fruta){
    echo $fruta." // ";
    echo "<br>";
}

echo "<br>"."************************"."<br>";
// ARRAY ASOCIATIVO
$arrayAsociativo=["mombre"=>"pepe", "edad"=>25];


var_dump($arrayAsociativo);
echo "<br>";
echo "<br>";
print_r($arrayAsociativo);

echo "************************"."<br>";

$array1=[];
$array1[]="rojo";
$array1[]="verde";
$array1[]="azul";

array_push($array1,"amarillo");

print_r($array1);

// ARRAY MULTIDIMENCIONAL

$arrayMultidimencional=[["cereza",9.50],["naranja",2.50],["platano",4.35],["kiwi",5.60],["manzana",2.25]];

echo "<br>"."************************"."<br>";

//FOR EACH PARA RECORRER ARRAY ASOCIATIVOS

foreach($arrayAsociativo as $clave=> $valor){
    echo " $valor -> $clave";
}