<?php   
 
 
//Los comentarios en PHP se ponen igual que en MySQL
/*Este es otro tipo de comentario */
# Este tambien (No recomendado)


$variable1="minusculas";
$VARIABLE1="Mayusculas";

echo $variable1." ".$VARIABLE1;
echo "<br>";
echo $variable1," ",$VARIABLE1;
 
print $variable1." ".$VARIABLE1;

// VARIABLES()

echo $yo="Pepe";
echo "<br>";
echo $string1="Hola ".$yo;
echo "<br>";
echo $string2="<h1>Hola $yo</h1>";
echo "<br>";
echo $string3='Hola $yo' ;


// CONSTANTES(local: si se pone en una funcion solo sera en esa funcion)

const PI_1=3.1416;
define("PI_2",3.1416, false);
echo "<br>";

echo PI_2;
echo "<br>";
//IF
echo "<br>";
$num1=100;
echo "<br>";

echo gettype($num1);
echo "<br>";
$num2="100";
echo "<br>";
echo gettype($num2);
echo "<br>";

$unEntero=2;
$undecimal=2.0;
$unString="Soy un string";
$unBooleano=true;// o false
$PI=3.1416;
$PI=6.28;

echo "<br>"."-------------------------"."<br>";

$num1='10';
$num2=2;

echo "Concatenacion".$num1.$num2;
echo "Suma".$num1+$num2;












echo "<br>"."-------------------------"."<br>";

//DIFERENCIA IGUALDAD DE VALOR Y DE VALOR CON TIPO(ESTRICA)
if($num1!==$num2){
    echo "<br>";
    echo "Cierto";
    echo "<br>";
}else{
    echo "<br>";
    echo "Falso";
};


// NOS DA INFORMACION DEL DATO
echo "<br>";
var_dump($num1);


//ARRAY 
echo "<br>";
$miArray=['cerezas',"fresas","nisperos"];
echo "<br>";
var_dump($miArray);
echo "<br>";
echo "<br>";
print_r($miArray);
echo "<br>";




?>