<!DOCTYPE html>
<html>
  <head>
    <title>foodback</title>
    <link rel="stylesheet" href="css/style_estab.css">
    <meta charset="UTF-8">

    <script type="text/javascript">
        <!--
            function change(id) {
               var e = document.getElementById(id);
               if(e.style.display == 'block')
                  e.style.display = 'none';
               else
                  e.style.display = 'block';
            }
        //-->
    </script>

    <style>
       #map {
        height: 200px;
        width: 300px;
        background: grey;
       }
     </style>

  </head>
  <body>
    <div class="wrapper">

      <div class="header">
        <div class="header_top">
          <div class="login">
            <!-- Registar -->
            <div class="registar">
              <a href="javascript:void(0)" onclick="change('popup_registar')">Registar</a>
            </div>

            <!-- POPUP - registar -->
            <div id="popup_registar">
              <div class="popup_container animate">
                <div class="window">
                  <span class="cross" href="javascript:void(0)" onclick="change('popup_registar')">&times;</span>
                  <h3>Criar Conta</h3>
                </div>
                <div class="dados">
                  <label><b>Nome</b></label>
                  <input type="text" placeholder="Nome" name="nome" required>

                  <label><b>Email</b></label>
                  <input type="text" placeholder="Email" name="email" required>

                  <label><b>Codigo Postal</b></label>
                  <input type="text" placeholder="Codigo Postal" name="cod_postal" required>

                  <label><b>Nome de utilizador</b></label>
                  <input type="text" placeholder="Nome de Utilizador" name="username" required>

                  <label><b>Palavra-Passe</b></label>
                  <input type="password" placeholder="Palavra-Passe" name="password" required>

                  <button class="enterbtn" type="submit" href="javascript:void(0)" onclick="change('popup_registar')">Registar</button>
                </div>
              </div>
            </div>

            <!-- Entrar -->
            <div class="entrar">
              <a href="javascript:void(0)" onclick="change('popup_entrar')">Entrar</a>
            </div>

            <!-- POPUP - entrar -->
            <div id="popup_entrar">
              <div class="popup_container animate">
                <div class="window">
                  <span class="cross" href="javascript:void(0)" onclick="change('popup_entrar')">&times;</span>
                  <h3>Entrar</h3>
                </div>
                <div class="dados">
                  <label><b>Nome de utilizador</b></label>
                  <input type="text" placeholder="Nome de Utilizador" name="username" required>

                  <label><b>Palavra-Passe</b></label>
                  <input type="password" placeholder="Palavra-Passe" name="password" required>

                  <button class="enterbtn" type="submit" href="javascript:void(0)" onclick="change('popup_entrar')">Entrar</button>
                </div>
                <div class="rodape">
                  <span class="psw"><a href="#">Esqueceu-se da palavra-passe?</a></span>
                </div>
              </div>
            </div>

          </div>


          <!-- Logo -->
          <div class="logo">
            <a href="principal.php"><img src="images/foodback_logo.png" alt="logo"></a> 
              <!-- Slogan -->
                <div class="slogan">
                    <h5>Because the belly also snores and the better opinions make the better choices!</h5>
                  </div>
              </div>
        </div>
      </div>

      <div class="content">
        <div class="content_top">
          <div class="title">
            <h1>Pincinello</h1>
          </div>
          <img src="images/pizza.jpg" alt="logo">
          <div class="atributos">
            <h2>Informações</h2>
            <div class="info">
              <div class="morada">
                <h3>Morada</h3>
                <!--<p>Avenida Brasil, 427, Foz, Porto</p>-->
                <div id="floating-panel">
                  <input id="address" type="textbox" value="Porto, PT">
                  <input id="submit" type="button" value="Geocode">
                </div>
                <div id="map">
                  <script type="text/javascript">
                    function initMap() {
                      var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 8,
                        center: {lat: -34.397, lng: 150.644}
                      });
                      var geocoder = new google.maps.Geocoder();

                      document.getElementById('submit').addEventListener('click', function() {
                        geocodeAddress(geocoder, map);
                      });
                    }

                    function geocodeAddress(geocoder, resultsMap) {
                      var address = document.getElementById('address').value;
                      geocoder.geocode({'address': address}, function(results, status) {
                        if (status === 'OK') {
                          resultsMap.setCenter(results[0].geometry.location);
                          var marker = new google.maps.Marker({
                            map: resultsMap,
                            position: results[0].geometry.location
                          });
                        } else {
                          alert('Geocode was not successful for the following reason: ' + status);
                        }
                      });
                    }

                    /*function initMap() {
                      var uluru = {lat: 41.161774, lng: -8.5857797};
                      var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: uluru
                      });
                      var marker = new google.maps.Marker({
                        position: uluru,
                        map: map
                      });
                    }*/
                  </script>
                  <script type="text/javascript" async defer
                  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl1qO9yYI_tMH72thIxU6LbxK4ZrVwYgs&callback=initMap">
                  </script>
                </div>
              </div>
              <div class="outros">
                <h3>Cozinha</h3>
                <p>Pizzaria<br>
                <h3>Preço para 2 pessoas</h3>
                <p>40€<br></p>
                <h3>Horário</h3>
                <p>Seg. a Sex. 11h - 22h</p>
                <h3>Contactos</h3>
                <p>228305839</p>
              </div>
              <div class="checkbox">
                <h3>Características</h3>
                <input type="checkbox" name="wifi" value="wifi" checked> Wifi<br><br>
                <input type="checkbox" name="esplanada" value="esplanada" checked> Esplanada<br><br>
                <input type="checkbox" name="take_away" value="take_away" > Take Away<br><br>
                <input type="checkbox" name="delivery" value="delivery" checked> Entregas ao Domicílio<br><br>
                <input type="checkbox" name="music" value="music" > Música ao Vivo<br><br>
              </div>
              <div class="rating">
                <h3>Popularidade</h3>
                <h4>4.1</h4>
                <a href="#">Avaliar</a>
              </div>
            </div>
            <h2>Menu</h2>
            <div class="menu">
              <div class="slideshow">
                <div class="mySlides fade">
                  <div class="numbertext">1 / 3</div>
                  <img src="images/img1.jpg" style="width:60%">
                  <div class="text">Massa à bolonhesa | 12,90€</div>
                </div>

                <div class="mySlides fade">
                  <div class="numbertext">2 / 3</div>
                  <img src="images/img2.jpg" style="width:60%">
                  <div class="text">Pizza Havaiana | 10,90€</div>
                </div>

                <div class="mySlides fade">
                  <div class="numbertext">3 / 3</div>
                  <img src="images/img3.jpg" style="width:60%">
                  <div class="text">Pizza Al Formagio | 14,90€</div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
              </div>
              <br>

              <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
              </div>
              <script>
                var slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                  showSlides(slideIndex += n);
                }

                function currentSlide(n) {
                  showSlides(slideIndex = n);
                }

                function showSlides(n) {
                  var i;
                  var slides = document.getElementsByClassName("mySlides");
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
              </script>
            </div>
            <h2>Opiniões</h2>
            <div class="opinions">
              <table>
                <tr>
                  <td>
                    <div class="top_comment">
                      <div class="left_block">
                        <h3 class="user">João Pedro</h3>
                        <h5>há 2 horas</h5>
                      </div>
                      <h4>4</h4>
                    </div>
                    <p class="comment">A comida estava
                      muito boa! O serviço foi bom. O espaço é muito agradável.
                      Boas vistas e um bom ambiente. Recomendo!</p>
                  </td>
                  <td>
                    <div class="top_comment">
                      <div class="left_block">
                        <h3 class="user">Sofia Costa</h3>
                        <h5>ontem</h5>
                      </div>
                      <h4>4</h4>
                    </div>
                    <p class="comment">Apesar do
                      serviço ser demorado, valeu a pena! O preço é um bocado
                      elevado, mas é o preço da qualidade dos alimentos e da
                      preparação dos bonitos pratos, saborosos e muito bem
                      temperados. Voltarei lá!</p>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="content_center"></div>
        <div class="content_bottom"></div>
      </div>

      <div class="footer">
        <p class="made">Made by:</p>
        <p class="workers">Anabela Reigoto and Baltasar Aroso</p>
      </div>
    </div>
  </body>
</html>
