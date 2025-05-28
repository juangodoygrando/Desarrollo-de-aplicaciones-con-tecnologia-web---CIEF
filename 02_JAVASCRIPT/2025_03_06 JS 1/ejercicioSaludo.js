/* 

saludo

vamos a partir de una hora definida 
const hora = 8

si la hora esta entre 7 y 13 entonces decimos "buenos dias"
si la hora esta entre 14 y 20 entonces decimos "buenas tardes"
en lso demas casos decimos "buenas noches"

*/
/* const hora = 2;

//forma 1

switch (hora) {
  case hora >= 7 && hora <= 13:
    console.log("Buenos dias");
    break;
  case hora >= 14 && hora <= 20:
    console.log("Buenas tardes");
    break;
  default:
    console.log("Buenas noches");
    break;
} 

//forma 2


if(hora>=7&&hora<=13){
    console.log("Buenos dias");}
    else if(hora>=14&&hora<=20){
        console.log("Buenas tardes");}
    else{
        console.log("Buenas noches");
    } 

//forma 3

for (let i = 7; i <= 13; i++) {
  if (hora == i) {
    console.log("Buenos dias");
    break;
  }
}
for (let i = 14; i <= 20; i++) {
  if (hora == i) {
    console.log("Buenos tardes");
    break;
  }
}
for (let i = 1; i <= 6; i++) {
    if (hora == i) {
      console.log("Buenos noches");
      break;
    }
  }
for (let i = 21; i <= 24; i++) {
    if (hora == i) {
      console.log("Buenos noches");
      break;
    }
  } */




    const dia ="viernes";

    let miPrimerArray = [ 1, 3.5, 'hola',true, 'viernes'    ]

    console.log(miPrimerArray);
    console.log(miPrimerArray[2]);

    const longitudArray=miPrimerArray.length;
    console.log(longitudArray);
    console.log(miPrimerArray[miPrimerArray.length-1]);

    console.log(miPrimerArray.at(-3));




    