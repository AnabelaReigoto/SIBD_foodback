<!DOCTYPE html>
<html>
  <?php
    include ('/usr/users2/mieec2014/up201405662/public_html/foodback/config/init.php'); //MUDAR
    include ('/usr/users2/mieec2014/up201405662/public_html/foodback/database/users.php'); //MUDAR
  ?>
  <head>
    <title>foodback</title>
    <link rel="stylesheet" href="templates/style.css">
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
            <?php if (isset($_SESSION['username'])) { ?>
              <div class="session">
                <?=$_SESSION['username']?> <a href="action_logout.php">Logout</a> <a href="definitions.php">Definições</a>
              </div>
              <?php } else { ?>
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
                      <form method="post" action="action_register.php">
                        <label><b>Nome</b></label>
                        <input type="text" placeholder="Nome" name="name" required>

                        <label><b>Email</b></label>
                        <input type="text" placeholder="Email" name="email"  required>

                        <label><b>Morada</b></label>
                        <input type="text" placeholder="Morada" name="address"  required>

                        <label><b>Nome de utilizador</b></label>
                        <input type="text" placeholder="Nome de Utilizador" name="username" value ="<?$username?>" required>

                        <label><b>Palavra-Passe</b></label>
                        <input type="password" placeholder="Palavra-Passe" name="password"  required>
                        <button class="enterbtn" type="submit" href="javascript:void(0)" onclick="change('popup_registar')">Registar</button>
                      </form>
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
                      <form method="post" action="action_login.php">
                        <label><b>Nome de utilizador</b></label>
                        <input type="text" placeholder="Nome de Utilizador" name="username" required>

                        <label><b>Palavra-Passe</b></label>
                        <input type="password" placeholder="Palavra-Passe" name="password" required>

                        <button class="enterbtn" type="submit" href="javascript:void(0)" onclick="change('popup_entrar')">Entrar</button>
                      </form>
                    </div>
                    <div class="rodape">
                      <span class="psw"><a href="#">Esqueceu-se da palavra-passe?</a></span>
                    </div>
                  </div>
                </div>
              <?php } ?>
          </div>


          <!-- Logo -->
          <div class="logo">
            <img src="templates/FOTOS/foodback_logo.png" alt="logo">
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
              <li><a href="#">Café</a></li>
              <li><a href="#">Bar</a></li>
              <li class="last"><a href="#">Doces</a></li>
            </ul>
          </nav>
        </div>

        <div class="header_bottom">
          <div class="search">
            <form action="filtros.php" method="post">
              <input type="text" placeholder="Que Estabelecimento procura?" name="search" required>
              <button type="submit">Pesquisar</button>
            </form>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="content_top">
          <table align=center>
            <th>
              <td class="establishment">
                <div class="image">
                  <img src="templates/FOTOS/pizza.jpg" alt="logo" width="300">
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
                  <img src="templates/FOTOS/pizza.jpg" alt="logo" width="300">
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
                  <img src="templates/FOTOS/pizza.jpg" alt="logo" width="300">
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
                  <img src="templates/FOTOS/pizza.jpg" alt="logo" width="300">
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
            </th>
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
