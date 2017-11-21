<!DOCTYPE html>
<html>
  <head>
    <title>foodback</title>
    <link rel="stylesheet" href="style.css">
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
        <div class="header_center">
          <nav class="menu_wrapper">
            <ul>
              <li><a href="#">Restaurante</a></li>
              <li><a href="#">Cafe</a></li>
              <li><a href="#">Bar</a></li>
              <li class="last"><a href="#">Doces</a></li>
            </ul>
          </nav>
        </div>
        <div class="header_bottom">
          <div class="search">
            <input type="text" placeholder="Que Estabelecimento procura?" name="search" required>
            <button type="submit">Pesquisar</button>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="content_top">
          <div class="filter">
            <h2>Filtros</h2>
            <form action="/action_page.php">
              <input type="checkbox" name="wifi" value="wifi" checked>Wifi<br>
              <input type="checkbox" name="esplanada" value="esplanada" checked>Explanada<br>
              <input type="checkbox" name="take_away" value="take_away" >Take Away<br>
              <input type="checkbox" name="delivery" value="delivery" checked>Entregas ao Domicílio<br>
              <input type="checkbox" name="music" value="music" >Música ao vivo<br>
            <h3>Cozinha</h3>
              <input type="checkbox" name="portuguesa" value="portuguesa">Portuguesa<br>
              <input type="checkbox" name="italiana" value="italiana" checked>Italiana<br>
              <input type="checkbox" name="chinesa" value="chinesa" >Chinesa<br>
              <input type="checkbox" name="japonesa" value="japonesa" >Japonesa<br>
              <input type="checkbox" name="marisqueira" value="marisqueira" >Marisqueira<br>
              <input type="checkbox" name="hamburgueria" value="hamburgueria" >Hamburgueria<br>
            <h3>Custo para 2 pessoas:</h3>
              <input type="radio" name="descendente" value="descendente" checked>Descendente<br>
              <input type="checkbox" name="less10" value="less10">Menos de 10€<br>
              <input type="checkbox" name="between10_20" value="between10_20" checked>Entre 10€ e 20€<br>
              <input type="checkbox" name="between20_30" value="between20_30" >Entre 20€ e 30€<br>
              <input type="checkbox" name="between30_40" value="between30_40" >Entre 30€ e 40€<br>
              <input type="checkbox" name="more40" value="more40" >Mais de 40€<br>
            <h3>Popularidade</h3>
              <input type="radio" name="descendente" value="descendente" checked>Descendente<br>
              <input type="radio" name="ascendente" value="ascendente" >Ascendente<br>
            <div class="filter_search">
              <input type="submit" value="Pesquisar">
            </div>
            </form>
          </div>
          <table align=center>
            <tr>
              <td class="establishment">
                <div class="image">
                  <img src="FOTOS/pizza.jpg" alt="logo" width="300">
                </div>
                <div class="title">
                  <h1>Pincinello</h1>
                  <h3 class="rating">4.1</h3>
                </div>
                <div class="text">
                  <p>
                    Pizzaria<br>Foz, Porto<br>Preço para 2 pessoas: 40€<br>
                  </p>
                </div>
              </td>
              <td class="establishment">
                <div class="image">
                  <img src="FOTOS/pizza.jpg" alt="logo" width="300">
                </div>
                <div class="title">
                  <h1>Pincinello</h1>
                  <h3 class="rating">4.1</h3>
                </div>
                <div class="text">
                  <p>
                    Pizzaria<br>Foz, Porto<br>Preço para 2 pessoas: 40€<br>
                  </p>
                </div>
              </td>
              <td class="establishment">
                <div class="image">
                  <img src="FOTOS/pizza.jpg" alt="logo" width="300">
                </div>
                <div class="title">
                  <h1>Pincinello</h1>
                  <h3 class="rating">4.1</h3>
                </div>
                <div class="text">
                  <p>
                    Pizzaria<br>Foz, Porto<br>Preço para 2 pessoas: 40€<br>
                  </p>
                </div>
              </td>
              <td class="establishment">
                <div class="image">
                  <img src="FOTOS/pizza.jpg" alt="logo" width="300">
                </div>
                <div class="title">
                  <h1>Pincinello</h1>
                  <h3 class="rating">4.1</h3>
                </div>
                <div class="text">
                  <p>
                    Pizzaria<br>Foz, Porto<br>Preço para 2 pessoas: 40€<br>
                  </p>
                </div>
              </td>
            </tr>
          </table>
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
