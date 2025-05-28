
const dias = ["lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo"]
const days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]

const diaElejido = "martes"

for(let i =0;i< dias.length; i++){
    if(dias[i]==diaElejido){
        console.log(days[i])
        break
    }
}

console.log(days[dias.indexOf(diaElejido)])