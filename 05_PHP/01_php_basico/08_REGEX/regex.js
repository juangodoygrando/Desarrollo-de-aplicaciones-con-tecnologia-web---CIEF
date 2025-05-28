let regex1=/abc/i;
const regax2= new RegExp('abc')

//EXPRECIONES REGULARES


regex1=/a.c/i; // El punto (. representa cualquier caracter pero solo una vez)

console.log(regex1.test('abc'));
console.log(regex1.test('aBc'));
console.log(regex1.test('a1c'));
console.log(regex1.test('a?c'));


regex1=/a*c/i; // El asterisco (*) representa cero o mas repeticiones del caracter anterior

console.log(regex1.test('ab22222222bc'));
console.log(regex1.test('a12121212asasassBc'));


regex1=/a+c/i; // El signo mas (+) representa una o mas repeticiones del caracter anterior

console.log(regex1.test('ab3333c'));
console.log(regex1.test('1ac1111111'));

regex1=/a?c/i; // El signo interrogante (?) significa que la c esta cero o mas veces despues de la a 

console.log(regex1.test('ab3333c'));
console.log(regex1.test('1ac1111111'));

regex1=/a{2}c/i; // El signo llaves ({}) representan un numero especifico de repeticiones del caracter anterior 

console.log(regex1.test('ab3333c'));
console.log(regex1.test('aac'));
console.log(regex1.test('aabc'));

regex1=/a{2,4}c/i; // El signo llaves ({}) representan un rango de repeticiones del caracter anterior

console.log(regex1.test('ab3333c'));
console.log(regex1.test('aaaaaaac'));
console.log(regex1.test('aaaaaa2c'));

regex1=/[aaa]/i; // Los corchetes ([])representa un conjunto de caracteres

console.log(regex1.test('a'));
console.log(regex1.test('z'));
console.log(regex1.test('ssssa'));



regex1=/[a-z\?]/; // Los corchetes con guion en el medio ([])representa que mirara todas las letras del abecedario en MINUSCULA   

console.log(regex1.test('?'));
console.log(regex1.test('Z'));
console.log(regex1.test('sssa'));


string="Maria";
string="MARIA";
regex1=/[A-Z]/;
regex1=/[a-zA_Z]/;

console.log(regex1.test(string))

string="í";
regex1=/[Í]/;


console.log(regex1.test(string))

string="Maria111";
regex1=/^[A-Z]{1}/; // el simbolo (^) indica el inicio  de la cadena debe eser en mayuscula la primer letra

console.log(regex1.test(string))

string="Maria";
regex1=/^[A-ZÑÇ]{1}[a-z]{4}$/; // el simbolo (^) indica el inicio  de la cadena debe eser en mayuscula la primer letra

console.log(regex1.test(string))

string="María de las Mercedes";
string="María de las Mercedes";
regex1=/^[A-ZÑÇ]{1}[A-za-zí\s]+$/; 

console.log(regex1.test(string))