//var, let, const

var emri =  "Trim Komandant Sqepi";  // String
var mosha = 20; // int
var isMale = true; // boolean
var fakulteti;

console.log(typeof(emri)); // tipi 
console.log(emri);
console.log(typeof(mosha))
console.log(mosha)
console.log(isMale)
console.log(fakulteti)
document.write(emri); // prints


// var function is scoped
// let is block scoped


function test() {
    var fakulteti = "uBt";
    if (fakulteti == "uBt") {
        var Profesori = "Blerim Blerimi";
    }
    console.log(Profesori);
}

test();

function login() {
    var user = document.getElementById('user').value;
    var useri = document.getElementById('useri').innerHTML;
    // var password = document.getElementById('pass');

    console.log(useri);
}

login()