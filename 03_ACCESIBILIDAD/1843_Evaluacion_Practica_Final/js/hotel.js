let inputNombre = document.querySelector('#nombre')
let errorNombre = document.querySelector('#errorNombre')
const mensajeErrorNombre = "<span>&#9888;</span> Error: por favor, escriba un nombre válido"

inputNombre.addEventListener('change', () => {

    let nombre = inputNombre.value.trim()

    if(nombre.length <= 2) {
        inputNombre.value = ""
        errorNombre.innerHTML = mensajeErrorNombre
        inputNombre.setAttribute('aria-describedby', "errorNombre")        
        inputNombre.focus()
    }
})

let inputApellido = document.querySelector('#apellidos')
let errorApellido = document.querySelector('#errorApellido')
const mensajeErrorApellido = "<span>&#9888;</span> Error: por favor, escriba un apellido válido"

inputApellido.addEventListener('change', () => {

    let apellido = inputApellido.value.trim()

    if(apellido.length <= 2) {
        inputApellido.value = ""
        errorApellido.innerHTML = mensajeErrorApellido
        inputApellido.setAttribute('aria-describedby', "errorNombre")        
        inputApellido.focus()
    }
})

