<!DOCTYPE html>
<html>
  <head>
    <title>foodback</title>
    <link rel="stylesheet" href="style_feed.css">
    <meta charset="UTF-8" content="initial-scale=1.0">

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
            <img src="foodback_logo.png" alt="logo" width="300">
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
            <h1>Baltasar Aroso</h1>
            <p>15 opiniões, 140 seguidores</p>
          </div>
          <h2>Fotos</h2>
          <div class="fotos">
            <div class="slideshow">
              <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <div class="time">25/08/2017</div>
                <div class="local"><a href="#"></a>Pizzaria Toscano</div>
                <img src="FOTOS/img2.jpg" style="width:60%">
                <div class="text">Pizza Havaiana</div>
                <div class="comment_pic"><p>Uma pizza deliciosa! Voltarei lá com
                   a minha namorada novamente, recomendo!</p></div>
              </div>

              <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <div class="time">25/08/2017</div>
                <div class="local"><a href="#"></a>Pizzaria Toscano</div>
                <img src="FOTOS/img2.jpg" style="width:60%">
                <div class="text">Pizza Havaiana</div>
                <div class="comment_pic"><p>Uma pizza deliciosa! Voltarei lá com
                   a minha namorada novamente, recomendo!</p></div>
              </div>

              <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <div class="time">25/08/2017</div>
                <div class="local"><a href="#"></a>Pizzaria Toscano</div>
                <img src="FOTOS/img2.jpg" style="width:60%">
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
                        <h3 class="user">Baltasar Aroso</h3>
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
                        <h3 class="user">Baltasar Aroso</h3>
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
