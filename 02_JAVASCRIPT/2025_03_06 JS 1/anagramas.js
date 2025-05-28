//ANAGRAMAS

//dos palabras son anagramas si utilizan las mismas letras en orden diferente.

/* const palabra1 = "amor"
const palabra2 = "ramo"
const palabra3= "patata"
 */
// las palabras "amor" y "ramo" son anagramas
// las palabras "amor" y "patata" no son anagramas

const palabra1 = "japones";
const palabra2 = "esponja";
const palabra3 = "amorios";

let palabra1Array = palabra1.split("").sort().join();

let palabra2Array = palabra2.split("").sort().join();

let anagramas = palabra1Array.includes(palabra2Array);

if (anagramas == true) {
  console.log(`Las palabras ${palabra1} y ${palabra2} son anagramas`) 
} else {
  console.log(`Las palabras ${palabra1} y ${palabra2} no son anagramas`);

  console.log(anagramas)    
}
