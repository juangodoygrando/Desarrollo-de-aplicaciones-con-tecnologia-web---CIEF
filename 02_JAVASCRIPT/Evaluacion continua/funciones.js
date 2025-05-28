//FUNCIONES





function calculadoraEdad(fechaNac, fechaRef) {
    
  let fecNacimiento = fechaNac.split("-");
  let fecReferencia = fechaRef.split("-");

  let años=fecReferencia[2]-fecNacimiento[2]
  let meses=fecReferencia[1]-fecNacimiento[1]
  let dias=fecReferencia[0]-fecNacimiento[0]

  
    if(fecReferencia[1]<fecNacimiento[1]){
        años= años-1
    }else if(fecNacimiento[1]==fecReferencia[1]&&fecReferencia[0]<fecNacimiento[0]){
        años-=1
    }
    
  return (años);
}

console.log(`La edad del usuario es ${calculadoraEdad("27-02-1993", "13-03-2025")}`);
