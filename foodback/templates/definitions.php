<!DOCTYPE html>
<html>
  <head>
    <title>foodback</title>
    <link rel="stylesheet" href="style_definitions.css">
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
            <img src="FOTOS/user.png" alt="user">
            <h1>Baltasar Aroso</h1>
          </div>
          <h2>Definições</h2>
          <div class="dados">
            <label><b>Nome</b></label>
            <input type="text" placeholder="Nome" name="nome" required>

            <label><b>Email</b></label>
            <input type="text" placeholder="Email" name="email" required>

            <label><b>Codigo Postal</b></label>
            <input type="text" placeholder="Codigo Postal" name="cod_postal" required>

            <label><b>Nome de utilizador</b></label>
            <input type="text" placeholder="Nome de Utilizador" name="username" required>

            <button class="enterbtn" type="submit" href="javascript:void(0)" onclick="change('popup_registar')">Alterar</button>
          </div>
          <h3>Alterar a Palavra-Passe</h3>
          <div class="change_psw">
            <label><b>Antiga Palavra-Passe</b></label>
            <input type="password" placeholder="Palavra-Passe" name="old_password" required>

            <label><b>Nova Palavra-Passe</b></label>
            <input type="password" placeholder="Palavra-Passe" name="new_password" required>

            <label><b>Confirmação da Nova Palavra-Passe</b></label>
            <input type="password" placeholder="Palavra-Passe" name="conf_password" required>

            <button class="enterbtn" type="submit" href="javascript:void(0)" onclick="change('popup_registar')">Alterar</button>
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
