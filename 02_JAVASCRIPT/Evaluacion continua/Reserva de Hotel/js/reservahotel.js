let todoOK=true


const nombreHTML = document.getElementById("nombre");

nombreHTML.addEventListener("change", () => {
  let nombre = nombreHTML.value.trim();

  //validacion nombre

  if (nombre.length < 2) {
    nombre.trim()
    document.getElementById("errorNombre").textContent =
      "Hay que introducir un nombre valido";
      todoOK=false
  } else {
    document.getElementById("errorNombre").textContent = "";
  }

 
});

const apellidoHTML = document.getElementById("apellido");

apellidoHTML.addEventListener("change", () => {
  let apellido = apellidoHTML.value.trim();

  //validacion apellido

  if (apellido.length < 2) {
    document.getElementById("errorApellido").textContent =
      "Hay que introducir un apellido valido";
      todoOK=false
  }else{
    document.getElementById("errorApellido").textContent =''
  }
});

const fechaEntradaHTML = document.getElementById("entrada");
const fechaSalidaHTML = document.getElementById("salida");

//control de las fechas

const entrada = new Date();

let salida = new Date(entrada);

salida.setDate(salida.getDate() + 1);

const entradaString = entrada.toISOString().split("T")[0];
const salidaString = salida.toISOString().split("T")[0];

const entradaHTML = document.getElementById("entrada");

entradaHTML.setAttribute("value", entradaString);
entradaHTML.setAttribute("min", entradaString);

const salidaHTML = document.getElementById("salida");

salidaHTML.setAttribute("value", salidaString);
salidaHTML.setAttribute("min", salidaString);

/* entradaHTML.addEventListener("change", () => {
  if (entradaHTML != entrada) {
    salidaHTML.setAttribute("value", entradaHTML.value);
    salidaHTML.setAttribute("min", entradaHTML.value);
  }
}); */

entradaHTML.addEventListener("change", () => {
  salida = new Date(entradaHTML.value);
  salida.setDate(salida.getDate() + 1);
  salidaString = salida.toISOString().split("T")[0];

  salidaHTML.setAttribute("value", salidaString);
  salidaHTML.setAttribute("min", salidaString);
});

const formReserva = document.forms["formReserva"];

formReserva.addEventListener("submit", (e) => {
  e.preventDefault();
    if(!todoOK){
        return;
    }else{Swal.fire({
        title: "Datos de la Reserva:",
        html: `Nombre: <strong>${formReserva["nombre"].value}</strong><br>
          Apellido: <strong>${formReserva["apellido"].value}</strong><br>
          Nº de adultos: <strong>${formReserva["adultos"].value}</strong><br>
          Nº de niños: <strong>${formReserva["ninos"].value}</strong><br>
          Fecha de entrada: <strong>${formReserva["entrada"].value}</strong><br>
          Fecha de salida: <strong>${formReserva["salida"].value}</strong><br>
          Tipo de estancia: <strong>${formReserva["estancia"].value}</strong>`,
        icon: "info",
      });}
  



 
  
});

