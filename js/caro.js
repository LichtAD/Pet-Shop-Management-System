let slideIndex = 0;
let slideIndex2 = 0;
let slideIndex3 = 0;
showSlides();
showSlides2();
showSlides3();
function showSlides() {
let i;
let slides = document.getElementsByClassName("mySlides");
for (i = 0; i < slides.length; i++) {
  slides[i].style.display = "none";
}
slideIndex++;
if (slideIndex > slides.length) {slideIndex = 1}
slides[slideIndex-1].style.display = "block";
setTimeout(showSlides, 3000); // Change image every 2 seconds
}
function showSlides2() {
let i;
let slides2 = document.getElementsByClassName("mySlides2");
for (i = 0; i < slides2.length; i++) {
  slides2[i].style.display = "none";
}
slideIndex2++;
if (slideIndex2 > slides2.length) {slideIndex2 = 1}
slides2[slideIndex2-1].style.display = "block";
setTimeout(showSlides2, 3500); // Change image every 2 seconds
}
function showSlides3() {
let i;
let slides3 = document.getElementsByClassName("mySlides3");
for (i = 0; i < slides3.length; i++) {
  slides3[i].style.display = "none";
}
slideIndex3++;
if (slideIndex3 > slides3.length) {slideIndex3 = 1}
slides3[slideIndex3-1].style.display = "block";
setTimeout(showSlides3, 2500); // Change image every 2 seconds
}