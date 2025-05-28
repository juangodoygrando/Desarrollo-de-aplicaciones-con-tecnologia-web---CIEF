let arrayFrutas =["kiwi","pera","piña","manzana"]

/* while simple */

//while(condicion){bloque de codigo a ejecutar}

/* let i=0
while(i<10){
    console.log(i)
    i++
}
 */

//do {bloque de codigo } while (condicion)


let dia="miercoles"

do{
    console.log("hoy es miercoles")
    dia="martes"
}while(dia=="miercoles")

let num=1

do{
    console.log(num)
    num++
}while(num<=5)


let lista= [1,2,3]

for(let i=0;i<=lista.length;i++){
    console.log(lista[i])
}