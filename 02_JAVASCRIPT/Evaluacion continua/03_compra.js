const brickLeche = 3;
const precioLeche = 1.25;

let resultado = brickLeche * precioLeche;

//console.log(resultado)

const articulo = [brickLeche, precioLeche];

//console.log(`El importe a pagar es ${ articulo[0] * articulo[1] }`)

const articulos = ["leche", "huevos", "sal", "harina", "azucar"];
const cantidad = [2, 1, 1, 3,1];
const precio = [1.25, 3.25, 0.9, 0.78, 1.5];

let totalCompra=0

for (i = 0; i < articulos.length; i++) {

    totalCompra+=cantidad[i]*precio[i]
    parcialCompra=cantidad[i] * precio[i]

  let mensaje = `${articulos[i]}: ${cantidad[i]} X ${precio[i]} = ${parcialCompra}}`;
  //console.log(mensaje)

  //console.log(`Importe total ${totalCompra}€`)
}


let carroCompra=[]
let articuloComprado ={nombreProducto:"leche", cantidad:2, precio:1.25}

carroCompra.push(articuloComprado)

//console.log(carroCompra)

articuloComprado ={nombreProducto:"huevos", cantidad:1, precio:3.25}

//carroCompra.push(articuloComprado)

//onsole.log(carroCompra)

articuloComprado ={nombreProducto:"sal", cantidad:1, precio:0.9}

carroCompra.push(articuloComprado)
//console.log(carroCompra)


for (producto of carroCompra){
    let parcialCompraNumero2 = producto['cantidad']*producto['precio']
    let textoCompraParcial =`${producto['nombreProducto']}: ${producto['cantidad']} X ${producto['precio']}= ${parcialCompraNumero2}`
    console.log(textoCompraParcial)
}