const one = document.querySelector(".one");
const two = document.querySelector(".two");
const three = document.querySelector(".three");
const four = document.querySelector(".four");
const five = document.querySelector(".five");

var url_string = window.location.href;
var url = new URL(url_string);
var p = url.searchParams.get("track");

// console.log(p);


// if (p == "rak buku") {
//     one.classList.add("active");
//     two.classList.add("active");
//     three.classList.remove("active");
//     four.classList.remove("active");
//     five.classList.remove("active");
//     // console.log('aman');
// }

// // one.onclick = function() {
// //     one.classList.add("active");
// //     two.classList.remove("active");
// //     three.classList.remove("active");
// //     four.classList.remove("active");
// //     five.classList.remove("active");
// // }

// two.onclick = function() {
//     one.classList.add("active");
//     two.classList.add("active");
//     three.classList.remove("active");
//     four.classList.remove("active");
//     five.classList.remove("active");
// }
// three.onclick = function() {
//     one.classList.add("active");
//     two.classList.add("active");
//     three.classList.add("active");
//     four.classList.remove("active");
//     five.classList.remove("active");
// }
// four.onclick = function() {
//     one.classList.add("active");
//     two.classList.add("active");
//     three.classList.add("active");
//     four.classList.add("active");
//     five.classList.remove("active");
// }
// five.onclick = function() {
//     one.classList.add("active");
//     two.classList.add("active");
//     three.classList.add("active");
//     four.classList.add("active");
//     five.classList.add("active");
// }
