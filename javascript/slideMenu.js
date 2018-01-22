/*----------------------------- Slideshow_menu ---------------------------*/

var index_menu = 1;
showMenu(index_menu);

function plusMenu(n) {
  showMenu(index_menu += n);
}

function currentMenu(n) {
  showMenu(index_menu = n);
}

function showMenu(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides_menu");
  var dots = document.getElementsByClassName("dot_menu");
  if (n > slides.length) {
    index_menu = 1;
  }
  if (n < 1) {
    index_menu = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[index_menu-1].style.display = "block";
  dots[index_menu-1].className += " active";
}
