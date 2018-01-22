/*----------------------------- Slideshow_photos ---------------------------*/

var index_photos = 1;
showPhotos(index_photos);

function plusPhotos(n) {
  showPhotos(index_photos += n);
}

function currentPhotos(n) {
  showPhotos(index_photos = n);
}


function showPhotos(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides_photos");
  var dots = document.getElementsByClassName("dot_photos");
  if (n > slides.length) {
    index_photos = 1;
  }
  if (n < 1) {
    index_photos = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[index_photos-1].style.display = "block";
  dots[index_photos-1].className += " active";
}
