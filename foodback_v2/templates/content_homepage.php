<div class="content">
  <?php if (strpos($_SERVER['REQUEST_URI'],'principal.php') !== false) { ?>
    <div class="content_center">
      <?php $estabs = getAllEstablishments();?>
      <table align=center>
        <th>
        <?php foreach ($estabs as $estab) { ?>
          <td onclick="location.href='establishment.php?id=<?=$estab['id']?>'" class="establishment">
            <div class="image">
              <img src="images/pizza.jpg" alt="logo" width="300">
            </div>
            <div class="title">
              <h1><?=$estab['name']?></h1>
              <h3>4.1</h3>
            </div>
            <div class="text">
              <p><?=getEstablishmentCuisineById($estab['id'])?><br><?=$estab['zone']?>,
              <?=$estab['city']?><br>Preço para 2 pessoas: <?=$estab['price']?>€<br></p>
            </div>
          </td>
        <?php } ?>
        </th>
      </table>
    </div>

  <?php } if (strpos($_SERVER['REQUEST_URI'],'filter.php') !== false)  { ?>
    <div class="content_left">
      <div class="filter">
        <h2>Filtros</h2>
        <form action="/action_page.php">
          <input type="checkbox" name="wifi" value="wifi" >Wifi<br>
          <input type="checkbox" name="esplanada" value="esplanada" >Explanada<br>
          <input type="checkbox" name="take_away" value="take_away" >Take Away<br>
          <input type="checkbox" name="delivery" value="delivery" >Entregas ao Domicílio<br>
          <input type="checkbox" name="music" value="music" >Música ao vivo<br>
        <h3>Cozinha</h3>
          <input type="checkbox" name="portuguesa" value="portuguesa">Portuguesa<br>
          <input type="checkbox" name="italiana" value="italiana" >Italiana<br>
          <input type="checkbox" name="chinesa" value="chinesa" >Chinesa<br>
          <input type="checkbox" name="japonesa" value="japonesa" >Japonesa<br>
          <input type="checkbox" name="marisqueira" value="marisqueira" >Marisqueira<br>
          <input type="checkbox" name="hamburgueria" value="hamburgueria" >Hamburgueria<br>
        <h3>Custo para 2 pessoas:</h3>
          <input type="radio" name="cost" value="desc" >Descendente<br>
          <input type="radio" name="cost" value="asc" >Ascendente<br>
          <input type="checkbox" name="less10" value="less10">Menos de 10€<br>
          <input type="checkbox" name="between10_20" value="between10_20" >Entre 10€ e 20€<br>
          <input type="checkbox" name="between20_30" value="between20_30" >Entre 20€ e 30€<br>
          <input type="checkbox" name="between30_40" value="between30_40" >Entre 30€ e 40€<br>
          <input type="checkbox" name="more40" value="more40" >Mais de 40€<br>
        <h3>Popularidade</h3>
          <input type="radio" name="pop" value="desc" >Descendente<br>
          <input type="radio" name="pop" value="asc" >Ascendente<br>
        <div class="filter_search">
          <input type="submit" value="Pesquisar">
        </div>
        </form>
      </div>
    </div>
    <div class="content_center">
      <?php $estabs = getAllEstablishments();?>
      <table align=center>
        <th>
        <?foreach ($estabs as $estab) { ?>
          <td class="establishment">
            <div class="image">
              <img src="images/pizza.jpg" alt="logo" width="300">
            </div>
            <div class="title">
              <h1><?=$estab['name']?></h1>
              <h3>4.1</h3>
            </div>
            <div class="text">
              <p><?=getEstablishmentCuisineById($estab['id'])?><br><?=$estab['zone']?>,
              <?=$estab['city']?><br>Preço para 2 pessoas: <?=$estab['price']?>€<br></p>
            </div>
          </td>
        <? } ?>
        </th>
      </table>
    </div>

  <?php } if (strpos($_SERVER['REQUEST_URI'],'definitions.php') !== false)  { ?>
    <div class="content_def">
      <div class="title">
        <img src="images/user.png" alt="user">
        <?php

        if (!isset($_SESSION['username']))
          die(header('Location: principal.php'));

          $username = $_SESSION['username'];
        ?>
        <h1><?=$_SESSION['name']?></h1>
      </div>
      <h2>Definições</h2>
      <div class="data">
        <form method="post" action="action/definitions.php">
          <label><b>Nome: <?=$_SESSION['name']?></b></label>
          <input type="text" placeholder="Nome" name="name" >

          <label><b>Email: <?=$_SESSION['email']?></b></label>
          <input type="text" placeholder="Email" name="email" >

          <label><b>Morada: <?=$_SESSION['address']?></b></label>
          <input type="text" placeholder="Morada" name="address" >

          <button class="enterbtn" type="submit" href="javascript:void(0)" onclick="change('popup_registar')">Alterar</button>
        </form>
      </div>
      <h3>Alterar a Palavra-Passe</h3>
      <div class="change_psw">
        <form method="post" action="action/changepassword.php">
          <label><b>Antiga Palavra-Passe</b></label>
          <input type="password" placeholder="Palavra-Passe" name="old_password" required>

          <label><b>Nova Palavra-Passe</b></label>
          <input type="password" placeholder="Palavra-Passe" name="new_password" required>

          <label><b>Confirmação da Nova Palavra-Passe</b></label>
          <input type="password" placeholder="Palavra-Passe" name="conf_password" required>

          <button class="enterbtn" type="submit" href="javascript:void(0)" onclick="change('popup_registar')">Alterar</button>
        </form>
      </div>
      </div>
    </div>

  <?php } if (strpos($_SERVER['REQUEST_URI'],'establishment.php') !== false)  { ?>
    <div class="content_estab">
      <?php $id = $_GET['id']; $estab = getEstablishmentById($id);?>
      <div class="title">
        <h1><?=$estab['name']?></h1>
      </div>
      <img src="images/pizza.jpg" alt="logo">
      <div class="atributos">
        <h2>Informações</h2>
        <div class="info">
          <div class="morada">
            <h3>Morada</h3>
            <div id="floating-panel">
              <input id="address" type="textbox" value="<?=$estab['address']?><">
              <input id="submit" type="button" value="Geocode">
            </div>
            <div id="map">
              <script type="text/javascript">
                function initMap() {
                  var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 8,
                    center: {lat: 41.1622023, lng: -8.6569731}
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
            <p><?=getEstablishmentCuisineById($estab['id'])?><br>
            <h3>Preço para 2 pessoas</h3>
            <p><?=$estab['price']?>€<br></p>
            <h3>Horário</h3>
            <p><?=$estab['schedule1']?><br><?=$estab['schedule2']?></p>
            <h3>Contactos</h3>
            <p><?=$estab['contact']?></p>
          </div>
          <div class="checkbox">
            <h3>Características</h3>
            <?php if(EstablishmentWasWifi($estab['id'])) {?>
                    <p>&#10004; Wifi </p>
            <?php }
                  else {?>
                    <p>&#10008; Wifi </p>
            <?php } ?>
            <?php if(EstablishmentWasTerrace($estab['id'])) {?>
                    <p>&#10004; Esplanada </p>
            <?php }
                  else {?>
                    <p>&#10008; Esplanada </p>
            <?php } ?>
            <?php if(EstablishmentWasTakeAway($estab['id'])) {?>
                    <p>&#10004; Take Away </p>
            <?php }
                  else {?>
                    <p>&#10008; Take Away </p>
            <?php } ?>
            <?php if(EstablishmentWasHomeDelivery($estab['id'])) {?>
                    <p>&#10004; Entrega ao Domicílio </p>
            <?php }
                  else {?>
                    <p>&#10008; Entrega ao Domicílio </p>
            <?php } ?>
            <?php if(EstablishmentWasMusic($estab['id'])) {?>
                    <p>&#10004; Música ao Vivo </p>
            <?php }
                  else {?>
                    <p>&#10008; Música ao Vivo </p>
            <?php } ?>
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
              <img src="images/img1.jpg">
              <div class="text">Massa à bolonhesa | 12,90€</div>
            </div>

            <div class="mySlides fade">
              <div class="numbertext">2 / 3</div>
              <img src="images/img2.jpg">
              <div class="text">Pizza Havaiana | 10,90€</div>
            </div>

            <div class="mySlides fade">
              <div class="numbertext">3 / 3</div>
              <img src="images/img3.jpg">
              <div class="text">Pizza Al Formagio | 14,90€</div>
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>
          <br>

          <div class="dots">
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
              <?php if (isset($_SESSION['username'])) { ?>
              <td>
                <div class="top_comment">
                  <div class="left_block">
                    <h3 class="user_comment"><?=$_SESSION['name']?></h3>
                    <h5>agora</h5>
                  </div>
                  <h4>4</h4>
                </div>
                <form action="action/add_comment.php" method="post">
                  <input class="add_comment" type="text" placeholder="Escreva aqui o seu comentário" name="comment">
                </form>
              </td>
              <? } ?>
              <?php $comments = getComment($estab['id']);?>
              <? foreach ($comments as $feedback) { ?>
                <td>
                  <div class="top_comment">
                    <div class="left_block">
                      <h3 class="user_comment"><?=$feedback['username']?></h3>
                      <h5>ontem</h5>
                    </div>
                    <h4>4</h4>
                  </div>
                  <p class="comment"><?=$feedback['feedback']?></p>
                </td>
              <? } ?>
            </tr>
          </table>
        </div>
      </div>
    </div>

  <?php } if (strpos($_SERVER['REQUEST_URI'],'user_feed.php') !== false)  { ?>
    <div class="content_feed">
      <div class="title">
        <img src="images/user.png" alt="user">
        <h1>Baltasar Aroso</h1>
        <p>15 opiniões</p>
      </div>
      <h2>Fotos</h2>
      <div class="images">
        <div class="slideshow">
          <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <div class="time">25/08/2017</div>
            <div class="local"><a href="#"></a>Pizzaria Toscano</div>
            <img src="images/img2.jpg" style="width:60%">
            <div class="text">Pizza Havaiana</div>
            <div class="comment_pic"><p>Uma pizza deliciosa! Voltarei lá com
               a minha namorada novamente, recomendo!</p></div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <div class="time">25/08/2017</div>
            <div class="local"><a href="#"></a>Pizzaria Toscano</div>
            <img src="images/img2.jpg" style="width:60%">
            <div class="text">Pizza Havaiana</div>
            <div class="comment_pic"><p>Uma pizza deliciosa! Voltarei lá com
               a minha namorada novamente, recomendo!</p></div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <div class="time">25/08/2017</div>
            <div class="local"><a href="#"></a>Pizzaria Toscano</div>
            <img src="images/img2.jpg" style="width:60%">
            <div class="text">Pizza Havaiana</div>
            <div class="comment_pic"><p>Uma pizza deliciosa! Voltarei lá com
               a minha namorada novamente, recomendo!</p></div>
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
                  <div>
                    <h3 class="user_comment">Baltasar Aroso</h3>
                    <p>avaliou Restaurante Manuel Alves</p>
                  </div>
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
                  <div>
                    <h3 class="user_comment">Baltasar Aroso</h3>
                    <p>avaliou Pizzaria Pincinello</p>
                  </div>
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
  <?php } ?>
</div>
