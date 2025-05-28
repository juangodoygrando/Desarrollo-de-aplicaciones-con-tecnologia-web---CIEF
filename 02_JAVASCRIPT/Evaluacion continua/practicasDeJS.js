//Ejercicio 1

const numeros = [10, 20, 30, 40, 50];
let sumaDeNumeros=0
numeros.forEach((num)=>{
    
    sumaDeNumeros+=num
    
})

console.log(sumaDeNumeros)





//Ejercicio 2

const palabras = ["manzana", "sol", "elefante", "casa", "programación"];

let palabrasLargas=0
palabras.forEach(palabra=>{
    if(palabra.length>5){
        palabrasLargas+=1
    }
})

console.log(`La cantidad de palabras con mas de 5 letras es ${palabrasLargas}`)




//Ejercicio 3

const numeros1 = [3, 5, 7, 9, 11];
let numerosMultiplicados=[]

numeros1.forEach((numeros,indices)=>{
    numerosMultiplicados.push(numeros*indices)
})
console.log(numerosMultiplicados)




//Ejercicio 4
const personas = [
    { nombre: "Lucas", edad: 25 },
    { nombre: "Ana", edad: 30 },
    { nombre: "Carlos", edad: 22 }
];
let arrayDePersonas=[]
personas.forEach(nombres=>{

    arrayDePersonas.push(nombres.nombre)

})

console.log(arrayDePersonas)







//Ejercicio 5








//Desafio extra
