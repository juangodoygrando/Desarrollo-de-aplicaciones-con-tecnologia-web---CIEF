let num1 = 10;
let num2 = 5;
let operacion = "/";

//console.log(num1, operacion, num2, "=",num1 / num2);

if (operacion == "+") {
  console.log(num1 + num2);
} else if (operacion == "-") {
  console.log(num1 - num2);
} else if (operacion == "*") {
  console.log(num1 * num2);
} else if (operacion == "/") {
  console.log(num1 / num2);
}

/* Operaciones matematicas 

+
-
*
/       

** Elevar a un exponente

*/

let num3 = 7;

//sumar un numero a la variable

num3 = num3 + 1;
num3 += 1;

//incrementar en uno la variable

num3++;

//console.log(num3);

//restar un numero a la variable

num3 = num3 - 1;
num3 -= 1;

//decrementar en uno la variable

num3--;

//console.log(num3);

switch (operacion) {
  case "+":
    console.log(num1, operacion, num2, "=", num1 + num2);
    break;
  case "-":
    console.log(num1, operacion, num2, "=", num1 - num2);
    break;
  case "*":
    console.log(num1, operacion, num2, "=", num1 * num2);
    break;
  case "/":
    console.log(num1, operacion, num2, "=", num1 / num2);
    break;
}
