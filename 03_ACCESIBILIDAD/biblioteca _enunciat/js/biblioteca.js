// localStorage.removeItem("biblioteca")

// MINI BIBLIOTECA

// const biblioteca = JSON.parse(localStorage.getItem("biblioteca")) || [
const biblioteca = JSON.parse(localStorage.getItem("biblioteca")) || [
  {
    titulo: "Guerra y Paz",
    autor: "Lev Tolstoi",
    categoria: "drama",
    idioma: "español",
    epoca: "s.XIX",
  },
  {
    titulo: "Anna Karenina",
    autor: "Lev Tolstoi",
    categoria: "drama",
    idioma: "català",
    epoca: "s.XIX",
  },
  {
    titulo: "L'Odisea",
    autor: "Homero",
    categoria: "drama",
    idioma: "català",
    epoca: "clásica",
  },
  {
    titulo: "Antologia de la poesia medieval catalana",
    autor: "Diversos",
    categoria: "poesia",
    idioma: "català",
    epoca: "clásica",
  },
  {
    titulo: "La Ilíada",
    autor: "Homero",
    categoria: "drama",
    idioma: "español",
    epoca: "clásica",
  },
  {
    titulo: "Poema del Mio Cid",
    autor: "Anónimo",
    categoria: "poesia",
    idioma: "español",
    epoca: "clásica",
  },
  {
    titulo: "Veinte mil leguas de viaje submarino",
    autor: "Jules Verne",
    categoria: "aventuras",
    idioma: "español",
    epoca: "s.XIX",
  },
  {
    titulo: "De la Terra a la Lluna",
    autor: "Jules Verne",
    categoria: "aventuras",
    idioma: "català",
    epoca: "s.XIX",
  },
  {
    titulo: "Cinco semanas en globo",
    autor: "Jules Verne",
    categoria: "aventuras",
    idioma: "español",
    epoca: "s.XIX",
  },
  {
    titulo: "Robinson Crusoe",
    autor: "Daniel Defoe",
    categoria: "aventuras",
    idioma: "català",
    epoca: "clásica",
  },
  {
    titulo: "Germinal",
    autor: "Émile Zola",
    categoria: "drama",
    idioma: "español",
    epoca: "s.XIX",
  },
  {
    titulo: "Notre Dame de Paris",
    autor: "Victor Hugo",
    categoria: "drama",
    idioma: "català",
    epoca: "s.XIX",
  },
  {
    titulo: "Los Miserables",
    autor: "Victor Hugo",
    categoria: "drama",
    idioma: "español",
    epoca: "s.XIX",
  },
  {
    titulo: "Yo, robot",
    autor: "Isaac Asimov",
    categoria: "ciencia-ficción",
    idioma: "español",
    epoca: "s.XX",
  },
  {
    titulo: "Fundació",
    autor: "Isaac Asimov",
    categoria: "ciencia-ficción",
    idioma: "català",
    epoca: "s.XX",
  },
  {
    titulo: "Ciberiada",
    autor: "Stanislaw Lem",
    categoria: "ciencia-ficción",
    idioma: "español",
    epoca: "s.XX",
  },
  {
    titulo: "Solaris",
    autor: "Stanislaw Lem",
    categoria: "ciencia-ficción",
    idioma: "català",
    epoca: "s.XX",
  },
  {
    titulo: "El hombre bicentenario",
    autor: "Isaac Asimov",
    categoria: "ciencia-ficción",
    idioma: "español",
    epoca: "s.XX",
  },
  {
    titulo: "Tokio Blues",
    autor: "Haruki Murakami",
    categoria: "drama",
    idioma: "español",
    epoca: "s.XX",
  },
  {
    titulo: "Romancero Gitano",
    autor: "Federico García Lorca",
    categoria: "poesia",
    idioma: "español",
    epoca: "s.XX",
  },
  {
    titulo: "Los aventuras de Sherlock Holmes",
    autor: "Arthur Conan Doyle",
    categoria: "misterio",
    idioma: "español",
    epoca: "s.XIX",
  },
  {
    titulo: "Rebelió a la granja",
    autor: "George Orwell",
    categoria: "drama",
    idioma: "català",
    epoca: "s.XX",
  },
  {
    titulo: "La Divina Comedia",
    autor: "Dante Alighieri",
    categoria: "drama",
    idioma: "español",
    epoca: "clásica",
  },
  {
    titulo: "Fahrenheit 451",
    autor: "Ray Bradbury",
    categoria: "ciencia-ficción",
    idioma: "català",
    epoca: "s.XX",
  },
  {
    titulo: "Cròniques Marcianes",
    autor: "Ray Bradbury",
    categoria: "ciencia-ficción",
    idioma: "català",
    epoca: "s.XX",
  },
];

// ==========================================================================================================
// EJERCICIO 1
// Libros disponibleS
// Mostrar la lista de obras alfabéticamente según el título, en forma de lista ordenada

// Llista del llibres

function mostrarArray(id) {
  // ordena por titulo el array de objetos
  biblioteca.sort((a, b) => {
    return a.titulo.localeCompare(b.titulo, "es-ES", { numeric: true });
  });

  const idHTML = document.getElementById(id);
  let htmlEj1 = "<ol>";
  //recorre el array y por cada uno va creando el codigo html
  biblioteca.forEach((libro) => {
    htmlEj1 += `<li>Libro: ${libro.titulo}, Autor: ${libro.autor}, Categoria:  ${libro.categoria}, Idioma: ${libro.idioma} Epoca: ${libro.epoca}</li>`;
  });

  htmlEj1 += "</ol>";
  // inserta codigo guardado en la variable en el html
  idHTML.innerHTML = htmlEj1;
}

mostrarArray("ejer1");

// ==========================================================================================================
// EJERCICIO 2
// Filtrar las obras según los criterios indicados en el formulario.
// Las obras que cumplan las condiciones se mostrarán dentro del div con id salidaFiltrada
// Las obras se mostrarán según aparece en la imagen modelo1.png
// Hay que aplicar algunos estilos que ya están definidos en el css

const ejercicio2 = document.getElementById("ejer2");
mostrarArray("ejer1");

const formFiltrado = document.forms["form-filtrado"];
//al escuchar un cambio en el form-filtrado
formFiltrado.addEventListener("change", () => {
  ejercicio2.innerHTML = "";

  //almacena los datos obtenidos de los input radio
  const categoria = formFiltrado["categoria"].value;
  const idioma = formFiltrado["idioma"].value;
  const epoca = formFiltrado["epoca"].value;

  let noHayResultados = true;

  let htmlEj2 = "<ul>";

  //recorro el array realizando validaciones de el valor de los inputs con el valor de los objetos del array
  biblioteca.forEach((libro) => {
    if (
      (categoria == "todo" || libro.categoria == categoria) &&
      (idioma == "todo" || libro.idioma == idioma) &&
      (epoca == "todo" || libro.epoca == epoca)
    ) {
      //si cumple la condicion inserta codigo html a la variable
      htmlEj2 += `<p><span id="autorFiltrado">${libro.autor}</span>:<span id="tituloFiltrado">${libro.titulo}</span>(${libro.categoria}), ${libro.idioma}</p>`;
      noHayResultados = false;
    }
  });
  //inserta el codigo html guardado
  htmlEj2 += "</ul>";
  ejercicio2.innerHTML += htmlEj2;

  //sino hay coincidencia, inserta un mensaje de que no hay coincidencia
  if (noHayResultados) {
    ejercicio2.innerHTML = "No hay libro que cumpla el criterio filtrado";
  }
});

// ==========================================================================================================
// EJERCICIO 3
// Filtrar por autor
// Selección de obras según el nombre o parte del nombre de un autor.
// Al hacer clic sobre el botón buscar se mostrarán las obras cuyos autores cumplen los requisitos.
// La salida por pantalla será en este formato:
// Isaac Asimov : Yo, robot (ciencia-ficción, idioma : español, época : s.XX)

const ejer3 = document.getElementById("ejer3");

const formEj3 = document.forms["form-autor"];

formEj3.addEventListener("submit", (e) => {
  //si se hace el submit se borra todo en el div que mostra la informacion
  ejer3.textContent = "";
  e.preventDefault();
  //en el form busco el valor del input ingresado por el usuario
  let peticion = formEj3["autor"].value.trim();

  //si esta vacio le muestro un error

  if (peticion.length == 0) {
    ejer3.textContent = "Hay que incluir texto en la búsqueda";
    return;
  }
  // lo convierto a minusculas todo lo ingresado
  peticion = peticion.toLocaleLowerCase();

  let sinCoincidencia = true;
  let htmlBuscador = "<ol>";
  //recorro el array, si encuentro el mismo nombre o partes incluidas entonces agrego el html siguiente
  biblioteca.forEach((libro) => {
    if (libro.autor.toLocaleLowerCase().includes(peticion)) {
      htmlBuscador += `<li>${libro.autor},${libro.titulo} (${libro.categoria}, Idioma: ${libro.idioma} Epoca: ${libro.epoca})</li>`;
      sinCoincidencia = false;
    }
  });

  htmlBuscador += "</ol>";
  //si la variable encontro algo se cambio a false, y por ello si es true es que no se encontro y false muestra lo que encontro
  if (sinCoincidencia) {
    ejer3.innerHTML = "No hay ningún autor que coincida con la búsqueda";
  } else {
    ejer3.innerHTML = htmlBuscador;
  }
});

// ==========================================================================================================
// EJERCICIO 4
// Añadir obra a la biblioteca
// A partir del formulario, añadir obras a la biblioteca
// Conseguir permanencia con LocalStorage
// Actualizar automáticamente el listado de obras del ejercicio 1

const incluirObra = document.forms["incluirObra"];

incluirObra.addEventListener("submit", (e) => {
  e.preventDefault();

  //al escuchar el envio del formulario, almaceno los valores ingresado en las variables

  let titulo = document.getElementById("incluir-titulo").value;
  let autor = document.getElementById("incluir-autor").value;
  let categoria = document.getElementById("incluir-categoria").value;
  let idioma = document.getElementById("incluir-idioma").value;
  let epoca = document.getElementById("incluir-epoca").value;

  //creo un objeto con los valores ingresados

  let obraNueva = { titulo, autor, categoria, idioma, epoca };
  // pusheo el objeto al array
  biblioteca.push(obraNueva);
  mostrarArray("ejer1");
  //actualizo el local storage
  localStorage.setItem("biblioteca", JSON.stringify(biblioteca));
  //reseteo los inputs
  document.forms["incluirObra"].reset();
  // actualizo el listado de las obrasqeu tengo disponible para borrar
  insertarObrasEnHTML();
});

// ==========================================================================================================
// EJERCICIO 5
// Quitar obras de la biblioteca. Crea en un formulario una etiqueta select con las obras de la biblioteca.
// Al seleccionar una obra y enviar el formulario, se eliminará la obra de la biblioteca.
// Actualizar automáticamente el listado de obras del ejercicio 1
// Actualizar el LocalStorage

//creo una funcion queme permita segun el array de obras, hacer un desplegable para seleccionar y borrar las obras del array
function insertarObrasEnHTML() {
  let divSelectQuitarObra = document.getElementById("selectQuitarObra");
  //inserto el label y select principal
  divSelectQuitarObra.innerHTML = `<label for="obras">Elije la obra que deseas borrar</label>
            <select name="obras" id="obras" >
            </select>`;

  let selecObras = document.getElementById("obras");
  //recorro el array, y por cada obra, inserto un optios con los valores de la obra para que figueren en la lista
  biblioteca.forEach((libro) => {
    if (libro.titulo) {
      selecObras.innerHTML += `<option name="${libro.titulo}" id="${libro.titulo}" >"${libro.titulo}"</option>`;
    }
  });
}

insertarObrasEnHTML(biblioteca);

//creo una funcion para borrar las obras tanto del array como del localStorage y actualizar todos los campos del programa
function borrarObraSeleccionada() {
  const formQuitarObra = document.forms["formQuitarObra"];
  //Agregue un escuchador para cuando se envie el formulario
  formQuitarObra.addEventListener("submit", (e) => {
    e.preventDefault();
    //se obtenga el valor de la obra seleccionada
    const obraSeleccionada = formQuitarObra["obras"].value;

    //Aqui agregue un findIndex, que recorre el array buscando el elemento o parte que cumpla con lo solicitado y devuelve el indice del objeto en el array
    const indiceObjeto = biblioteca.findIndex(
      (libro) => libro.titulo === obraSeleccionada
    );

    //si el indice es valido, borra del array el objeto
    if (indiceObjeto !== -1) {
      biblioteca.splice(indiceObjeto, 1);
      //actualiza el localStorage
      localStorage.setItem("biblioteca", JSON.stringify(biblioteca));
      //actualiza el array
      mostrarArray("ejer1");
      //actualiza la lista de obras que se pueden borrar
      insertarObrasEnHTML();
    }
  });
}

borrarObraSeleccionada();
