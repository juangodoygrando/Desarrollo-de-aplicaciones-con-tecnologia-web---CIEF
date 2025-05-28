/*
Hay que programar un carrito de compra de fruta.

El cliente eligirá que fruta quiere haciendo click sobre la imagen.
Un mensaje emergente le preguntará qué cantidad quiere.

Esta información se mostrará a la derecha, bajo "Total carrito", 
en <p id="carrito"></p>, de esta forma:
 Kiwi 2 kg x 4,20€/kg = 8,40 €

El total se actualizará con cada compra
 Total Compra: 8,40€
 
Se dará la opción de añadir o no más productos que se mostrarán
a continuación de los anteriores, y se sumará todo en el total. 
Por ejemplo:  
 Kiwi 2 kg x 4, 20€/kg = 8, 40€
 Pomelo 1 kg x 2,50€/kg = 2,50€
 Total Compra: 10,90€

Puedes modificar el código facilitado si ello te ayuda con el ejercicio,
pero deberás justificarlo.

Recuerda la importancia comentar con detalle el código.

 Lo importante es el cálculo, no los estilos css


*/

const productos = [
  { nombre: "pomelo", precio: 2.5 },
  { nombre: "kiwi", precio: 4.2 },
  { nombre: "limon", precio: 1.2 },
  { nombre: "pinya", precio: 2.8 },
  { nombre: "sandia", precio: 1.2 },
  { nombre: "aguacate", precio: 2.5 },
  { nombre: "fresas", precio: 6.2 },
  { nombre: "mandarina", precio: 1.9 },
  { nombre: "manzanaFuji", precio: 4.2 },
  { nombre: "platano", precio: 3.2 },
  { nombre: "pera", precio: 1.8 },
  { nombre: "manzanaGolden", precio: 3.5 },
];

const divProductos = document.querySelectorAll(".divProductos");

function solicitarcantidad(nombreProducto) {
  let cantidadIngresada = 0;

  do {
    cantidadIngresada = mostrarMensaje(prompt(
      `¿Cual es la cantidad de ${nombreProducto} que quieres comprar?`
    ).trim());

    if (
      (nombreProducto == "aguacate" ||
      nombreProducto == "pinya") && cantidadIngresada % 1 !== 0
    ) {
      alert(
        `El articulo se vende por unidades. Por favor ingrese un numero entero`
      );
    } else if (cantidadIngresada === "" || isNaN(cantidadIngresada)) {
      alert("El valor ingresado es invalido");
    } else {
      break;
    }
  } while (true);

  return cantidadIngresada;
}

function calcularFrutaXPrecio(cantidadIngresada, productos, nombreProducto) {
  let valorfrutaXprecio = 0;

  let producto = productos.find((item) => item.nombre == nombreProducto);

  if (producto) {
    valorfrutaXprecio = (cantidadIngresada * producto.precio).toFixed(2);
  }

  return valorfrutaXprecio;
}

function valorUnitario(productos, nombreProducto) {
  let precioUnitario = 0;

  let producto = productos.find((item) => item.nombre == nombreProducto);
  if (producto) {
    precioUnitario = producto.precio;
  }

  return precioUnitario;
}

function insertarHTMLenCarrito(
  nombreProducto,
  cantidadIngresada,
  valorCantidadXprecio,
  precioUnitario
) {
  const carritoHTML = document.getElementById("carrito");

  carritoHTML.innerHTML += `<div id="${nombreProducto}InsertadoHTML">
  <i class="fa-solid fa-trash" onclick="borrarArticuloDelCarrrito('${nombreProducto}',${valorCantidadXprecio})"></i>
  <p>${nombreProducto}:</p>
  <p>${cantidadIngresada}</p>
  <p>X</p>
  <p>${precioUnitario}€</p>
  <p>=</p>
  <p>${valorCantidadXprecio}€</p>
  </div>
  `;
}

function borrarArticuloDelCarrrito(nombreProducto, valorCantidadXprecio) {
  const articuloAEliminar = document.getElementById(
    `${nombreProducto}InsertadoHTML`
  );

  articuloAEliminar.remove();

  const totalCompra = document.getElementById("precioFinal");
  totalCarrito -= valorCantidadXprecio;
  totalCompra.innerHTML = `${totalCarrito.toFixed(2)}€`;
}

let totalCarrito = 0;

function sumarATotalDelCarrito(valorCantidadXprecio) {
  const totalCompra = document.getElementById("precioFinal");
  totalCarrito += parseFloat(valorCantidadXprecio);
  totalCompra.innerHTML = `${totalCarrito.toFixed(2)}€`;
}

function manejarSeleccionFruta(nombreProducto) {
  let cantidadIngresada = solicitarcantidad(nombreProducto);
  if (cantidadIngresada <= 0) return;

  let valorCantidadXprecio = calcularFrutaXPrecio(cantidadIngresada, productos, nombreProducto);
  let precioUnitario = valorUnitario(productos, nombreProducto);

  insertarHTMLenCarrito(nombreProducto, cantidadIngresada, valorCantidadXprecio, precioUnitario);
  sumarATotalDelCarrito(valorCantidadXprecio);
}

function mostrarMensaje(mensaje) {
  let div = document.getElementById("mensaje");
  div.textContent = mensaje;
}




divProductos.forEach((divProductos) => {

  divProductos.addEventListener("click", () => {

    let nombreProducto = divProductos.id;

    let cantidadIngresada = solicitarcantidad(nombreProducto);

    let valorCantidadXprecio = calcularFrutaXPrecio(
      cantidadIngresada,
      productos,
      nombreProducto
    );

    let precioUnitario = valorUnitario(productos, nombreProducto);

    let insertarProductoCarrito = insertarHTMLenCarrito(
      nombreProducto,
      cantidadIngresada,
      valorCantidadXprecio,
      precioUnitario
    );

    sumarATotalDelCarrito(valorCantidadXprecio);
  });


  divProductos.addEventListener("keydown", (event) => {
    if (event.key === "Enter" || event.key === " ") {
      manejarSeleccionFruta(divProducto.id);
      event.preventDefault();
    }

    let nombreProducto = divProductos.id;

    let cantidadIngresada = solicitarcantidad(nombreProducto);

    let valorCantidadXprecio = calcularFrutaXPrecio(
      cantidadIngresada,
      productos,
      nombreProducto
    );

    let precioUnitario = valorUnitario(productos, nombreProducto);

    let insertarProductoCarrito = insertarHTMLenCarrito(
      nombreProducto,
      cantidadIngresada,
      valorCantidadXprecio,
      precioUnitario
    );

    sumarATotalDelCarrito(valorCantidadXprecio);


  });







});




