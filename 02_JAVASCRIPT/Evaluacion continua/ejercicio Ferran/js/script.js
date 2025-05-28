// Datos de las ciudades
const ciudades = {
    "España" : ["Barcelona", "Madrid", "València"],
    "França": ["París", "Marsella", "Lyon"],
    "Itàlia": ["Roma", "Florència", "Pisa"],
    "Argentina": ["Buenos Aires", "Córdoba", "Rosario"],
    "Chile": ["Santiago", "Valparaíso", "Concepción"],
    "Brasil": ["São Paulo", "Río de Janeiro", "Brasilia"],
    "Egipto": ["El Cairo", "Alejandría", "Giza"],
    "Sudafrica": ["Johannesburgo", "Ciudad del Cabo", "Durban"],
    "Nigeria": ["Lagos", "Abuya", "Kano"]
}
const paises = {
    "Europa" : ["España", "França", "Itàlia"],
    "America": ["Argentina", "Chile", "Brasil"],
    "Africa": ["Egipto", "Sudafrica", "Nigeria"]
}

// Obtener el formulario
const form1 = document.forms['form1']


const continente = document.getElementById("continente")

continente.addEventListener('change',()=>{
    const continenteSeleccionado = form1.continente.value
    let paisesHTML = ""
    
    for(continentes in paises){
        if(continenteSeleccionado==continentes){
            const paisesObtenidos=paises[continentes]
            paisesObtenidos.forEach((pais)=>{
                paisesHTML+=`<option value="${pais}">${pais}</option>`
            })
            break
        }
    }
    pais.innerHTML=paisesHTML
    actualizaCiudad(form1.pais.value)
})
// Obtener los select a cambiar
const ciudad = document.getElementById("ciudad")
const pais = document.getElementById("pais")

pais.addEventListener("change", () => {
    const paisSeleccionado = form1.pais.value
    actualizaCiudad(paisSeleccionado)
})

function actualizaCiudad(pais){
    let ciudadesHTML = ""
    for (paisCiudades in ciudades) {
        
        if (pais == paisCiudades) {
            const ciudadesObtenidas = ciudades[paisCiudades];
            ciudadesObtenidas.forEach((ciudad) => {
                ciudadesHTML += `<option value="${ciudad}">${ciudad}</option>`
            })
            break
        }
    }
    ciudad.innerHTML = ciudadesHTML
}