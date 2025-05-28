//ACCESO AL DOM


const h1 =document.querySelector('h1')

console.log(h1.textContent)

h1.textContent="titulo cambiadooooooo"



function cambiaH1() {
    alert("hiciste un clik en el h1")
}

const h2 =document.querySelector('h2')

h2.onclick=()=>{h2.style.color="red"}
h2.ondblclick=()=>{h2.style.fontSize="3rem"}


const h3 =document.querySelector('h3')

h3.addEventListener("click",()=>{
    h3.style.backgroundColor="darkgreen"
    alert(h3.textContent)
    h3.style.color="white"

})

const parrafos =document.querySelectorAll('p')
console.log(`hay ${parrafos.length} nodos p`)

let ponteAzul=true

for(let i=0;i<parrafos.length;i++){
    parrafos[i].addEventListener("click",()=>{

    if(ponteAzul){

            parrafos[i].style.backgroundColor="steelBlue"
            parrafos[i].style.color="white"
            ponteAzul=false
        
    }else{
        
            parrafos[i].style.backgroundColor="white"
            parrafos[i].style.color=""
            ponteAzul=true
        
    }

    
})
}




const div =document.querySelector('div')

div.addEventListener('click',()=>{
    div.innerHTML="<h2>Soy el nuevo h2</h2>"
})



h1.addEventListener("mousemove",()=>{
    h1.style.backgroundColor="tomato"
        h3.style.color="white"
})

h1.addEventListener("mouseout",()=>{
    h1.style.backgroundColor="tomato"
        h3.style.color="white"
})
    


