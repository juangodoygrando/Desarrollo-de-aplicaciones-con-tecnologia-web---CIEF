const formInsert = document.forms["formInsert"];

formInsert.addEventListener("submit", (e) => {
  e.preventDefault();

  // Limpiar mensajes de error
  document.getElementById("errorUsuario").textContent = '';
  document.getElementById("errorColor").textContent = '';

  // Capturar valores
  const usuario = formInsert["usuario"].value.trim();
  const color = formInsert["color"].value.trim();
  const web = formInsert["web"].value;
  const sessionToken = formInsert["sesion-token"].value;

  // Validar campos
  if (usuario === "" && color === "") {
    document.getElementById("errorUsuario").textContent = "No pongas espacios en blanco";
    document.getElementById("errorColor").textContent = "El color no puede estar vacío";
    return;
  }

  //validar el formato
   const regexNombre =/^ [a-zA-z\s]+/;

   if(!regexNombre.test(usuario)){
    document.getElementById("errorUsuario").textContent = "Hay que poner un texto valido";
    return;
   }
   if(!regexNombre.test(color)){
    document.getElementById("errorColor").textContent = "Hay que poner un texto valido";
    return;
   }
   if(web!=""){
    alert("Bot detectado")
    return;
   }







});
