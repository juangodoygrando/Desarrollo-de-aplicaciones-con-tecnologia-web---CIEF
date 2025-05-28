let array =[1,2,3,4,5]

for(numero of array){
    console.log(numero)
}



let texto="abracadabra"

for(letra of texto){

    letra=letra.toLowerCase()
    
    
    if(letra=="a"){
        continue
    }
    console.log(letra)
}



let objeto={ nombre:"peter", apellido:"parker"}

for(key in objeto){
    console.log(key, objeto[key])
}