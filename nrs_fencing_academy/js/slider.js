let currentSlide = 0;

function showSlide(index){

const slides = document.querySelectorAll(".slide");

if(index >= slides.length){
currentSlide = 0;
}

if(index < 0){
currentSlide = slides.length - 1;
}

slides.forEach((slide)=>{
slide.style.display = "none";
});

slides[currentSlide].style.display = "block";

}

function nextSlide(){
currentSlide++;
showSlide(currentSlide);
}

function prevSlide(){
currentSlide--;
showSlide(currentSlide);
}

setInterval(nextSlide,3000);

window.onload=function(){
showSlide(currentSlide);
};