const preguntaSegundos=3601


let dia=parseInt(preguntaSegundos/(24*60*60))
console.log(dia)
let restos= preguntaSegundos%86400
console.log(restos)
    
let hora=parseInt(preguntaSegundos/3600)
console.log(hora)

restos= preguntaSegundos%3600
console.log(restos)

let min=parseInt(preguntaSegundos/60)
console.log(min)

restos= preguntaSegundos%60
console.log(restos)

let seg=parseInt((preguntaSegundos)-(min*60))
console.log(seg)


console.log(` Dias:${dia} - Horas:${hora} - Minutos:${min} - Segundos:${seg}`)