// Datos de trabajo

const flores = [
  { nombre: "rosa", color: "rojo", floracion: "primavera", stock: true },
  { nombre: "rosa", color: "blanco", floracion: "verano", stock: true },
  { nombre: "jazmín", color: "blanco", floracion: "verano", stock: false },
  { nombre: "crisantemo", color: "blanco", floracion: "otoño", stock: false },
  { nombre: "cerezo", color: "blanco", floracion: "primavera", stock: false },
  { nombre: "clavel", color: "rojo", floracion: "verano", stock: true },
];



// ==============================================================================
// EJERCICIO 1

// console.log(flores);

// Hay que mostrar en el HTML los datos de las flores como lista ordenada
// Flor: rosa, de color rojo, florece en primavera y tenemos stock
// Debe aparecer el resultado en #ejercicio1
function mostrarArray(id) {
  const idHTML = document.getElementById(id);
  
flores.sort((a, b) => {
  return a.nombre.localeCompare(b.nombre, "es-ES", { numeric: true });
});
  let htmlEj1 = "<ol>";

  flores.forEach((flor) => {
    // console.log(flor["nombre"]);

    let textStock = "no";
    if (flor.stock) {
      textStock = "";
    }

    htmlEj1 += `<li>Flor: ${flor.nombre}, de color ${flor.color}, florece en ${flor.floracion} y ${textStock} tenemos stock</li>`;
  });

  htmlEj1 += "</ol>";

  idHTML.innerHTML = htmlEj1;
}

mostrarArray("ejercicio1");

// ==============================================================================
// EJERCICIO 2
// Listar las flores de color blanco que florecen en verano
// Modelo de mensaje de salida:
// Flor: rosa, de color blanco, florece en verano y tenemos stock
// Debe aparecer el resultado en #ejercicio2

const ejercicio2HTML = document.getElementById("ejercicio2");

let html2 = "<ol>";

flores.forEach((flor) => {
  if (flor.color == "blanco" && flor.floracion == "verano") {
    let stock = flor.stock;

    if (flor.stock == true) {
      stock = "En stock";
    } else {
      stock = "No hay stock";
    }

    html2 += `<li>Flor: ${flor.nombre} de color ${flor.color},florece en ${flor.floracion} ${stock}</li>`;
  }
});

html2 += "</ol>";

ejercicio2HTML.innerHTML = html2;

// ==============================================================================
// EJERCICIO 3

// A partir del formulario incluido, hay que mostrar que datos
// corresponden a la selección realizada.
// Se mostrarán en forma de lista como los modelos anteriores.
// Si no hay ninguna flor que cumpla las condiciones, se mostrará este mensaje:
// "No hay flor que cumpla las condiciones"
// Debe aparecer el resultado en #ejercicio3

const ejercicio3 = document.getElementById("ejercicio3");

const formEj3 = document.forms["formEj3"];

formEj3.addEventListener("change", () => {
  ejercicio3.innerHTML = "";

  let colorSeleccionado = formEj3["color"].value;
  let floracionSeleccionada = formEj3["floracion"].value;
  let StockSeleccionado = formEj3["stock"].value;

  let sinCoincidencias = true;
  let html3 = "<ol>";

  flores.forEach((flor) => {
    let stock = "no";

    if (flor.stock) {
      stock = "no";
    }

    if (
      (colorSeleccionado == "cualquiera" || flor.color == colorSeleccionado) &&
      (floracionSeleccionada == "cualquiera" ||
        flor.floracion == floracionSeleccionada) &&
      (StockSeleccionado == "cualquiera" ||
        String(flor.stock) == StockSeleccionado)
    ) {
      html3 += `<li>Flor: ${flor.nombre} de color ${flor.color},florece en ${flor.floracion}</li>`;

      sinCoincidencias = false;
    }
  });
  html3 += "</ol>";

  ejercicio3.innerHTML += html3;

  if (sinCoincidencias) {
    ejercicio3.innerHTML = "No hay flor que cumpla las condiciones";
  }
});

mostrarArray("ejercicio3");

// ==============================================================================
// EJERCICIO 4

// Haz un formulario para obtener una flor por cualquier característica:
// nombre, floración o color.
// Debe aparecer el resultado en #ejercicio4

const ejercicio4 = document.getElementById("ejercicio4");

ejercicio4.innerHTML = `<br>
<form action="#ejercicio4" name="formEJ4">
    <div>
      <label for=""
        >Buscar: <input type="search" name="search" id="buscar"
      /></label>
      <input type="submit" value="Comprobar" />
    </div>
     <p id="error"></p>
</form>
`;
const formEJ4 = document.forms["formEJ4"];

const error = document.getElementById("error");

formEJ4.addEventListener("submit", (e) => {
  error.textContent = ``;
  e.preventDefault();

  let textobuscado = document.getElementById("buscar").value.trim();

  if (textobuscado.length == 0) {
    error.textContent = `Hay que incluir texto en la busqueda`;
    return;
  }

  textobuscado = textobuscado.toLowerCase();

  let html4 = "<ol>";

  flores.forEach((flor) => {
    if (
      textobuscado == flor.nombre ||
      textobuscado == flor.color ||
      textobuscado == flor.floracion
    ) {
      html4 += `<li>Flor: ${textobuscado} de color ${flor.color},florece en ${flor.floracion}`;
    } else {
      `<p>"${textobuscado}" no concide con ninguna flor </p>`;
    }
  });
  html4 += "</ol>";
  ejercicio4.innerHTML += html4;
});

// ==============================================================================
// EJERCICIO 5

// Haz un formulario para añadir flores al array.
// Por ejemplo:
// flor: cyclamen, color:rosa, floracion: invierno, stock:true
// Tiene que actualizarse automáticamente la lista del ejercicio 1
// Consigue persistencia con LocalStorage




const formEj5 = document.forms['formEj5']

formEj5.addEventListener('submit', (e) => {
  e.preventDefault()
  let nombre = formEj5['nombreEj5'].value
  let color = formEj5['colorEj5'].value
  let floracion = formEj5['floracionEj5'].value
  let stock = formEj5['stock'].value
  
  let objetoFlor = {nombre, color, floracion, stock}
  
  flores.push(objetoFlor)

  mostrarArray("ejercicio1")

  localStorage.setItem("flores", JSON.stringify(flores))
})














// ==============================================================================
/* E X T R A S */

// ==============================================================================
// EJERCICIO 6

// Crea y programa un formulario para añadir precios a las flores:
// rosa roja : 8.00€
// rosa blanca : 10.00€
// jazmin: 12.00€
// crisantemo: 5.00€
// cerezo: 25.00€
// cyclamen: 4.50€
// Tiene que actualizarse automáticamente la lista del ejercicio 1

// ==============================================================================
// EJERCICIO 7

// Crea la forma de eliminar elementos del array
// Tiene que actualizarse automáticamente la lista del ejercicio 1

// ==============================================================================
// EJERCICIO 8

// Crea la forma de editar elementos del array de flores
// Todas las propiedades deben poder ser editadas: nombre, color, floración, stock  y precio
// Tiene que actualizarse automáticamente la lista del ejercicio 1
