  window.onscroll = function() {myFunction()};
  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;
  var slideIndex = 1;
  showSlides(slideIndex);

  function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
  }

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("Slides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
  }



  var slideIndex1 = 0;
  carousel();

  function carousel() {
    var i;
    var x = document.getElementsByClassName("Slides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    slideIndex1++;
    if (slideIndex1 > x.length) {
      slideIndex1 = 1
    }
    x[slideIndex1 - 1].style.display = "block";
    setTimeout(carousel, 5000);
  }