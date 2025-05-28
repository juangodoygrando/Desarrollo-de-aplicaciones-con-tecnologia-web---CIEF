var idioma = navigator.language || navigator.userLanguage || "es";

//obtener el formulario

const formIdioma = document.forms["form-idioma"];

//crear el escuchador(listeenr)

formIdioma.addEventListener("change", () => {
  const idioma = formIdioma["select-idioma"].value;
  cambiarIdioma(idioma);
});

function cambiarIdioma(idioma) {
  jsonIdiomas = "";

  fetch("../data/idiomas.json")
    .then((respuesta) => respuesta.json())
    .then((data) => {
      jsonIdiomas = data;
      document.querySelector("h1").textContent = jsonIdiomas[idioma]["title"];
      document.querySelector("html[lang]").setAttribute("lang", idioma);
    })
    .catch((error) => {
      alert("Error en la petición");
      console.error("Error:", error);
    });
}





