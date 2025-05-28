
const numero = 7;
esPrimo=true

for(let i =2; i< numero; i++){
    if(numero%i == 0){
        console.log(`El numero ${numero} no es primo`);
        esPrimo=false
        break;
    }
}

if(esPrimo){
    console.log(`El numero ${numero} no es primo`);
    
}





