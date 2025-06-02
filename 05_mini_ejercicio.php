<?php

//vamos a tener una variable llamada edad 
// y otra con el nombre de la persona
// hay que mostrar un mensaje 
// >18" fulanito eres mayor de edar desde hace X años"
// 18 "fulanit ya eres mayor de edad"
// <18 "Fulanit te faltan X años para ser mayo de edad"


$edad = 25;
$nombre = "Fulanito";
$mayoriaDeEdad = 18;

if ($edad < 18) {
    $edadParcial = ($mayoriaDeEdad - $edad);
    echo "$nombre te faltan $edadParcial años para ser mayo de edad";
} else if ($edad > 18) {
    $edadParcial = ($edad - $mayoriaDeEdad);
    echo "$nombre eres mayor de edar desde hace $edadParcial años";
} else {
    echo "$nombre ya eres mayor de edad";
}
echo "<br>";





$miArrayDeFrutas = [["cereza", 9.50], ["naranja", 2.50], ["platano", 4.35], ["kiwi", 5.60], ["manzana", 2.25]];



/*
1. Mostrar todas las frutas y sus precios
*/
echo "<br>";
for ($i = 0; $i < count($miArrayDeFrutas); $i++) {
    echo "fruta: " . $miArrayDeFrutas[$i][0] . " => Precio: $" . $miArrayDeFrutas[$i][1] . "<br>";
}

/*
2. Calcular y mostrar el precio promedio de todas las frutas
*/
echo "<br>";

$promedioFrutas = 0;

for ($i = 0; $i < count($miArrayDeFrutas); $i++) {
    $promedioFrutas += $miArrayDeFrutas[$i][1];
}

$promedioFrutas = $promedioFrutas / count($miArrayDeFrutas);

echo "El precio promedio de todas las frutas es:" . $promedioFrutas;
echo "<br>";
/*
3. Mostrar solo las frutas que tienen un precio mayor al promedio
*/
echo "<br>";

echo "Frutas que cuestan mas que el promedio:";
for ($i = 0; $i < count($miArrayDeFrutas); $i++) {

    if ($miArrayDeFrutas[$i][1] > $promedioFrutas) {

        echo " " . $miArrayDeFrutas[$i][0] . " ";
    }
}
/*
4. Encontrar y mostrar la fruta más cara
*/




/*
5. Encontrar y mostrar la fruta más barata
*/


/*
6. Ordenar el array por precio de menor a mayor y mostrarlo
*/


/*
7. Ordenar el array por precio de mayor a menor y mostrarlo
*/


/*
8. Contar cuántas frutas hay con un precio menor a $5.00
*/


/*
9. Buscar una fruta por su nombre (por ejemplo: "kiwi") y mostrar su precio
*/


/*
10. Agregar una nueva fruta al array (por ejemplo: "sandía", $3.80) y mostrar la lista actualizada
*/


/*
11. Eliminar una fruta específica del array (por ejemplo: "naranja")
*/


/*
12. Crear un nuevo array con solo los nombres de las frutas
*/


/*
13. Crear un nuevo array con solo los precios
*/


/*
14. Mostrar cuál es la segunda fruta más cara
*/


/*
15. Calcular cuánto costaría comprar una unidad de cada fruta (total general)
*/





echo "<br>";
echo "<br>";
echo "<br>";
//tenemos uan fruteria y vamos a vender y comprar frutas.
//necesitamos una funcion para vender frutas y otra para comprarla


$frutas = [
    ["nombre" => "cereza", "precio" => 9.50, "stock_kg" => 20],
    ["nombre" => "naranja", "precio" => 2.50, "stock_kg" => 40],
    ["nombre" => "platano", "precio" => 4.35, "stock_kg" => 35],
    ["nombre" => "kiwi", "precio" => 5.60, "stock_kg" => 10],
    ["nombre" => "manzana", "precio" => 2.25, "stock_kg" => 25]
];

// para vender la fruta vender_fruta(fruta, cantidad)
//Tiene que actualizar el array $frutas

//Para comprar frutas (fruta,cantidad,precio)
//Pero si la fruta no esta, la añadiremos




// funcion vender frutas

function vender_fruta(&$frutas, $fruta, $cantidad){

    for ($i = 0; $i < count($frutas); $i++) {
        if ($fruta == $frutas[$i]["nombre"]) {
            if ($cantidad <= $frutas[$i]["stock_kg"]) {
                $frutas[$i]["stock_kg"] = ($frutas[$i]["stock_kg"] - $cantidad);
                $total = $cantidad * $frutas[$i]["precio"];
                return "Compraste $cantidad kg de $fruta y el total es $total €";
            } else {
                return "No hay suficiente stock de $fruta.";
            }
        }
    }
    
}

echo vender_fruta($frutas, "naranja", 12);



echo "<br>";
echo "<br>";
echo "<br>";

// funcion vender frutas

function comprar_Frutas(&$frutas, $fruta, $stock, $precio)
{
    for ($i = 0; $i < count($frutas); $i++) {
        if ($fruta == $frutas[$i]["nombre"]) {
            $nuevoStock = $frutas[$i]["stock_kg"] += $stock;
            $frutas[$i]["stock_kg"] = $nuevoStock;
            $frutas[$i]["precio"] = $precio;
            return "Se actualizo un producto existente!"."<br>"."El nuevo stock de $fruta es $nuevoStock kg";
        }
    }
    array_push($frutas, ["nombre" => $fruta, "precio" => $precio, "stock_kg" => $stock]);
    return "Ingresaste un producto nuevo!" . "<br>" . "Nombre: $fruta Precio: $precio € Stock: $stock kg";
}




echo comprar_Frutas($frutas, "pera", 15, 2.85);
echo "<br>";

echo "<br>";
echo comprar_Frutas($frutas, "platano", 5, 4.90);

echo "<pre>";
print_r($frutas);
echo "</pre>";
