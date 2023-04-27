let slideIndex = 1;
let mainslideIndex = 1;
showSlides(slideIndex);
showmainSlides(mainslideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
  showmainSlides(mainslideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
  showmainSlides(mainslideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("slide");
  let dots = document.getElementsByClassName("indicator");
  if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" act", "");
    }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " act";
}

function showmainSlides(n) {
  let j;
  let mainslides = document.getElementsByClassName("slide-main");
  let maindots = document.getElementsByClassName("indicator-main");
  if (n > mainslides.length) {mainslideIndex = 1}
    if (n < 1) {mainslideIndex = mainslides.length}
    for (j = 0; j < mainslides.length; j++) {
      mainslides[j].style.display = "none";
    }
    for (j = 0; j < maindots.length; j++) {
      maindots[j].className = maindots[j].className.replace(" active", "");
    }
  mainslides[mainslideIndex-1].style.display = "block";
  maindots[mainslideIndex-1].className += " active";
}
