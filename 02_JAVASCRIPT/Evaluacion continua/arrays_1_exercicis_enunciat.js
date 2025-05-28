// Se te proponen una serie de ejercicios para practicar
// los arrays y el bucle for.

// Para resolver NO hay que utilizar ninguna función matemática
// Crea el código necesario para resolver los requerimientos

// Dado este array:
let arrayNumeros1 = [4, 5, 3, 8, 2, 7, 1, 6];
let arrayNumeros2 = [4, 2, 7, 1, 6];
// o cualquier otro array solo con números

// 1) Mostrar por consola la suma de todos los valores
let sumaNumerosArray1 = 0;
for (let i = 0; i < arrayNumeros1.length; i++) {
  sumaNumerosArray1 = sumaNumerosArray1 + arrayNumeros1[i];
}
console.log(sumaNumerosArray1);

let sumaNumerosArray2 = 0;
for (let i = 0; i < arrayNumeros2.length; i++) {
  sumaNumerosArray2 = sumaNumerosArray2 + arrayNumeros2[i];
}
console.log(sumaNumerosArray2);

// 2) Mostrar por consola el promedio

let promedio1 = 0;
for (let i = 0; i < arrayNumeros1.length; i++) {
  promedio1 = promedio1 + arrayNumeros1[i];
}
promedio1 = promedio1 / arrayNumeros1.length;

console.log(promedio1);

let promedio2 = 0;
for (let i = 0; i < arrayNumeros1.length; i++) {
  promedio2 = promedio2 + arrayNumeros2[i];
}
promedio2 = promedio2 / arrayNumeros2.length;

console.log(promedio2);

// 3) Encontrar los valores máximo y mínimo

let valorMaximo1 = 0;
for (numMax1 of arrayNumeros1) {
  if (valorMaximo1 < numMax1) {
    valorMaximo1 = numMax1;
  }
}

console.log(valorMaximo1);

let valorMinimo1 = 0;
for (i = 0; i < arrayNumeros1.length; i++) {
  if (arrayNumeros1[0] >= arrayNumeros1[i]) {
    valorMinimo1 = arrayNumeros1[i];
  }
}

console.log(valorMinimo1);

let valorMaximo2 = 0;
for (numMax2 of arrayNumeros2) {
  if (valorMaximo2 < numMax2) {
    valorMaximo2 = numMax2;
  }
}

console.log(valorMaximo2);

let valorMinimo2 = 0;
for (i = 0; i < arrayNumeros2.length; i++) {
  if (arrayNumeros2[0] >= arrayNumeros2[i]) {
    valorMinimo2 = arrayNumeros2[i];
  }
}

console.log(valorMinimo1);

// 4) Sumar los valores con índice par y restar los impares

// Hay que mostrar por consola cada resultado
/* let arrayNumeros1 = [4, 5, 3, 8, 2, 7, 1, 6];
let arrayNumeros2 = [4, 2, 7, 1, 6]; */
let indicesPares = 0;

for (let i = 0; i < arrayNumeros1.length; i++) {
  if (i % 2 == 0) {
    i;
    indicesPares += arrayNumeros1[i];
  } else {
    indicesPares -= arrayNumeros1[i];
  }
}

// ====================================================================================================

// Para este array:
let arrayNombres2 = [
  "Clint",
  "Robert",
  "James",
  "Anne",
  "Ingrid",
  "John",
  "Patricia",
  "Marie",
];
// 5) Programa el código para encontrar el elemento con el texto más largo
// y guardarlo en la variable varTextoMasLargo
// Si hay más de un valor, guardarlos en el array arrayTextosMasLargos.
let TextoMasLargo = [];

let varTextoMasLargo = 0;

for (let i = 0; i < arrayNombres2.length; i++) {
  console.log(arrayNombres2[i].length);
  if (arrayNombres2[i].length > varTextoMasLargo) {
    varTextoMasLargo = arrayNombres2[i].length;
    TextoMasLargo = [];
    TextoMasLargo.push(arrayNombres2[i]);
  } else if (arrayNombres2[i].length === varTextoMasLargo) {
    TextoMasLargo.push(arrayNombres2[i]);
  }
}
TextoMasLargo;

// 6) Lo mismo para el texto más corto.

let TextoMasCorto = [];

let varTextoMasCorto = arrayNombres2[0].length;

for (let i = 0; i < arrayNombres2.length; i++) {
  if (arrayNombres2[i].length < varTextoMasCorto) {
    varTextoMasCorto = arrayNombres2[i].length;
    TextoMasCorto = [];
    TextoMasCorto.push(arrayNombres2[i]);
  } else if (arrayNombres2[i].length === varTextoMasCorto) {
    TextoMasCorto.push(arrayNombres2[i]);
  }
}
TextoMasCorto;

//7) Obtén un array llamado longitudNombres que tenga como elementos las longitudes de los textos
// incluidos en cualquiera de los arrays anteriores. Por tanto debes mostrar : [ 5, 6, 5, etc.

let longitudNombres = [];

for (let i = 0; i < arrayNombres2.length; i++) {
  longitudNombres.push(arrayNombres2[i].length);
}
longitudNombres;

// 8) Crea un array llamado arrayNombresConI que incluya solo los nombres que contengan la letra i

let nombresConI = [];

for (let i = 0; i < arrayNombres2.length; i++) {
  if (arrayNombres2[i].includes("i")) {
    nombresConI.push(arrayNombres2[i]);
  }
}
nombresConI;

// ====================================================================================================

// Dado este array:
let arrayMixto = ["Marie", 24, "Pol", 18, "Judith", 22, "Eva", 28];

// 9) Debes obtener otro array llamado arrayBidimensional que sea así:
// [ ["Marie", 24 ], ["Pol", 18], ["Judith", 22 ], [ "Eva", 28] ]

let arrayBidimensional = [];

for (i = 0; i < arrayMixto.length; i += 2) {
  arrayBidimensional.push([arrayMixto[i], arrayMixto[i + 1]]);
}
arrayBidimensional;

// ====================================================================================================

// 10) Este array incluye una operación de compra:
 const compra = [
  ["Leche", 1.2, 2],
  ["Pan", 0.8, 3],
  ["Huevos", 2.5, 1],
  ["Café", 5.2, 0.5],
]; 
// Se muestra el nombre del artículo, su precio y la cantidad comprada.
// Debes obtener la cantidad de artículos comprados (no de cada tipo) y el importe total.
// Por ejemplo: "Has comprado 4 artículos y el importe total es de 12.7 euros"

// Después añade otro articulo al array anterior y muestra de nuevo el mensaje informativo con los nuevos datos.

let cantidadArticulos = 0;
let totalImporte = 0;

compra.forEach(function(item) {
  cantidadArticulos += item[2];
  totalImporte += item[1] * item[2];
});

console.log(`Has comprado ${cantidadArticulos} artículos y el importe total es de ${totalImporte} euros.`)

compra.push(["harina",1.2,3])

console.log(compra)

cantidadArticulos = 0;
totalImporte = 0;

compra.forEach(function(item) {
  cantidadArticulos += item[2];
  totalImporte += item[1] * item[2];
});

console.log(`Has comprado ${cantidadArticulos} artículos y el importe total es de ${totalImporte} euros.`)