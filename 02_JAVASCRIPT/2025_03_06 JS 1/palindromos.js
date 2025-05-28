//PALINDROMO
// Averiguar si un texto es palindromo
// -- ignorar los espacios
//-- ignorar maysculas y minusculas
//-- ignorar tildes (acentos)

    let palindromo = "dabale arroz a la zorra el abad"

    let palindromo1=palindromo.split(" ").join("")


    let palindromoLimpio= palindromo1.split("").reverse().join("")

console.log(palindromo) 

    if(palindromo1 == palindromoLimpio){
        console.log(`La frase "${palindromo}" es un palindromo`)
    }else{
        console.log(`La frase "${palindromo}" no es un palindromo`)
    }