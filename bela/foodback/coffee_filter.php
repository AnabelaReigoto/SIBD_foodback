<!DOCTYPE html>
<html>
  <?php
    include ('config/init.php');
    include ('database/users.php');
    include ('database/data_coffee.php');
  ?>
  <head>
    <title>foodback</title>
    <link rel="stylesheet" href="css/style.css">
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
                <a class="logout" href="action/logout.php">Logout</a>
                <a class="definitions_top" href="definitions.php">Definições</a>
                <a class="user" href="#"><?=$_SESSION['username']?></a>
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
                    <div class="data">
                      <form method="post" action="action/action_register.php">
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
                    <div class="data">
                      <form method="post" action="action/login.php">
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
              <a href="principal.php"><img src="images/foodback_logo.png" alt="logo"></a>
                <!-- Slogan -->
                  <div class="slogan">
                      <h5>Because the belly also snores and the better opinions make the better choices!</h5>
                    </div>
                </div>
          </div>
          <div class="header_center">
            <nav class="menu_wrapper">
              <ul>
                <li><a href="restaurant_filter.php">Restaurante</a></li>
                <li style="background-color: black;"><a style="color: #f16521;" href="coffee_filter.php">Café</a></li>
                <li><a href="bar_filter.php">Bar</a></li>
                <li class="last"><a href="sweets_filter.php">Doces</a></li>
              </ul>
            </nav>
          </div>
          <div class="header_bottom">
            <div class="search">
              <form action="filter.php" method="post">
                <input type="text" placeholder="Que Estabelecimento procura?" name="search" required>
                <button type="submit">Pesquisar</button>
              </form>
            </div>
          </div>
        </div>

      <div class="content">
        <div class="content_left">
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
        </div>
        <div class="content_center">
            <?php $estabs = getAllCoffees();?>
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
                      <p>
                        Pizzaria<br><?=$estab['zone']?>, <?=$estab['city']?><br>Preço para 2 pessoas: 40€<br>
                      </p>
                    </div>
                  </td>
                <? } ?>
                </th>
              </table>
          </div>

      </div>

      <div class="footer">
        <p class="made">Made by:</p>
        <p class="workers">Anabela Reigoto and Baltasar Aroso</p>
      </div>
    </div>
  </body>
</html>
