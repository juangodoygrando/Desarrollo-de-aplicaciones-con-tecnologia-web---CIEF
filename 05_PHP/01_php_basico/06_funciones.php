<?php   
 
 
 /* echo saludar("Steve"); 
 $saludo_maria=saludar("Maria");


function saludar($nombre){
    return "Hola $nombre !"."<br>";
 }

 echo $saludo_maria; */

 $nombre="Son-Goku";

 echo "La variable es $nombre";
 echo "<br>";
 echo "<br>";

 function indicarNombre (){
    global $nombre;
    return $nombre;
 }

 echo "La variable devuelta por la funcion es ". indicarNombre();

 echo "<br>";
 echo "<br>";

 
 function mostrarAlumnos ($nombre, $apellido){
    //1. Nombre apellido
    static $posicion=1;
    echo "$posicion . $nombre $apellido <br>";
    $posicion++;
 };
 
 mostrarAlumnos("juan","Godoy");
 mostrarAlumnos("raul","garcia");
 mostrarAlumnos("pedro","suarez");
 mostrarAlumnos("luis","rodriguez");

 echo "<br>";
 echo "<br>";

 $indice=1;

 function mostrarAlumnosGlobal ($nombre, $apellido){
    global $indice;
    echo "$indice . $nombre $apellido <br>";
    $indice++;
 }

 mostrarAlumnosGlobal ("luis","rodriguez");
 mostrarAlumnosGlobal ("juan","Godoy");
 mostrarAlumnosGlobal ("pedro","suarez");