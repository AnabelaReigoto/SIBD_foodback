<!DOCTYPE html>
<html>
<?php
  include ('/usr/users2/mieec2014/up201404125/public_html/bela/foodback/config/init.php'); //MUDAR
  include ('/usr/users2/mieec2014/up201404125/public_html/bela/foodback/database/users.php'); //MUDAR

  //////////////////*TIRAR ENTRAR E REGISTAR*//////////
?>

  <head>
    <title>foodback</title>
    <link rel="stylesheet" href="css/style_def.css">
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
              <a class="logout" href="action/logout.php">Logout</a>
              <a class="definitions_top" href="definitions.php">Definições</a>
              <a class="user" href="#"><?=$_SESSION['username']?></a>
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
            <img src="images/user.png" alt="user">
            <?php

            if (!isset($_SESSION['username']))
              die(header('Location: principal.php'));

              $username = $_SESSION['username'];
            ?>
            <h1><?=$_SESSION['username']?></h1>
          </div>
          <h2>Definições</h2>
          <div class="data">
            <form method="post" action="action/definitions.php">
              <label><b>Nome</b></label>
              <input type="text" placeholder="Nome" name="name" >

              <label><b>Email</b></label>
              <input type="text" placeholder="Email" name="email" >

              <label><b>Morada</b></label>
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
