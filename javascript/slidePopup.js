/*----------------------------- Slideshow_popup ---------------------------*/

var index_popup = 1;
showPopup(index_popup);

function plusPopup(n) {
  showPopup(index_popup += n);
}

function currentPopup(n) {
  showPopup(index_popup = n);
}

function showPopup(n) {
  console.log(n);
  var i;
  var slides = document.getElementsByClassName("mySlides_popup");
  var dots = document.getElementsByClassName("dot_popup");
  console.log(slides);
  if (n > slides.length) {
    index_popup = 1;
  }
  if (n < 1) {
    index_popup = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[index_popup-1].style.display = "block";
  dots[index_popup-1].className += " active";
}
