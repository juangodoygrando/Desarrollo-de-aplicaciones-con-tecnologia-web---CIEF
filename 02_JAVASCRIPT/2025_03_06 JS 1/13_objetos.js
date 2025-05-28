let alumnos =["Anna","Pau","Miki"]
let apellidos =["Pou","Garcia","Mouse"]

let objetoAlumno ={}

objetoAlumno["nombre"]="Anna"
objetoAlumno["apellido"]="Pou"
objetoAlumno["fechaNacimiento"]="2000-03-12"
objetoAlumno["distritoPostal"]="08028"

//console.log(objetoAlumno)
//console.log(`El nombre del alumno es ${objetoAlumno["nombre"]}`)

objetoAlumno["nombre"]="Marta"

//console.log(`El nombre del alumno es ${objetoAlumno["nombre"]}`)


let objetoAlumno2 = {nombre:"marco",apellido:"Polo",fechaNacimiento:"1254-09-15",distritoPostal:"30100"}

let listaAlumnos=[objetoAlumno,objetoAlumno2]

for(i=0;i<listaAlumnos.length;i++){
    console.log(listaAlumnos[i])
}

for(i=0;i<listaAlumnos.length;i++){
    console.log(`El alumno se llama ${listaAlumnos[i]["nombre"]}`)
}

for(i=0;i<listaAlumnos.length;i++){
    console.log(`El alumno se llama ${listaAlumnos[i].nombre}`)
}
