<div class="header">
  <? if(isset($_SESSION['error_message'])) { ?>
  <aside class="error_message">
    <?=$_SESSION['error_message'];
    unset($_SESSION['error_message']);?>
  </aside>
  <? } ?>
  <? if(isset($_SESSION['success_message'])) { ?>
  <aside class="success_message">
    <?=$_SESSION['success_message'];
    unset($_SESSION['success_message']);?>
  </aside>
  <? } ?>
  <div class="login">
    <div class="user_space">
      <?php if (isset($_SESSION['username'])) { ?>
        <div class="top_user">
          <a class="fa fa-user" href="filter.php"></a>
          <a class="users" href="user_feed.php"><?=$_SESSION['name']?></a>
        </div>
        <div class="menu_user">
          <ul>
            <li><a class="homepage" href="principal.php">Página Principal</a></li>
            <li><a class="filters" href="filter.php">Filtros</a></li>
            <? if (($_SESSION['username']) == 'admin') { ?>
              <li><a class="new_estab" href="estab_new.php">Criar Estabelecimento</a></li>
            <? } ?>
            <li><a class="feed" href="user_feed.php">Meu Feed de Notícias</a></li>
            <li><a class="definitions_top" href="user_def.php">Definições</a></li>
            <li><a class="logout" href="action/logout.php">Logout</a></li>
          </ul>
        </div>
      <?php } else { ?>
    </div>
    <div class="visiter">
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
              <input type="password" placeholder="min: 4, max: 20" name="password"  required>
              <button class="enterbtn" type="submit" >Registar</button>
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

              <button class="enterbtn" type="submit" >Entrar</button>
            </form>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  <div class="header_top">

    <!-- Logo -->
    <div class="logo">
      <a href="principal.php"><img src="images/foodback_logo.png" alt="logo"></a>
        <!-- Slogan -->
        <div class="slogan">
          <h5>Because the belly also snores and the better opinions make the better choices!</h5>
        </div>
    </div>
  </div>

  <?php if (strpos($_SERVER['REQUEST_URI'],'principal.php') !== false) {
    $page_link = 'principal';
  } else if (strpos($_SERVER['REQUEST_URI'],'filter.php') !== false) {
    $page_link = 'filter';
  } else if (strpos($_SERVER['REQUEST_URI'],'searching.php') !== false) {
    $page_link = 'searching';
  }

  if(isset($page_link)) { ?>
    <div class="header_center">
      <nav class="menu_wrapper">
        <div class="filter_icon">
          <a class="fa fa-filter" href="filter.php"></a>
        </div>
        <ul>
          <?php if (strpos($_SERVER['REQUEST_URI'],$page_link.'.php?menu_wrapper=1') !== false) { ?>
            <a href="<?=$page_link?>.php?menu_wrapper=1" id="menu_selected">
              <li>Restaurante</li></a>
          <? } else { ?>
            <a href="<?=$page_link?>.php?menu_wrapper=1"><li>Restaurante</li></a>
          <? } ?>

          <?php if (strpos($_SERVER['REQUEST_URI'],$page_link.'.php?menu_wrapper=2') !== false) { ?>
            <a href="<?=$page_link?>.php?menu_wrapper=2" id="menu_selected">
              <li>Bar</li></a>
          <? } else { ?>
            <a href="<?=$page_link?>.php?menu_wrapper=2"><li>Bar</li></a>
          <? } ?>

          <?php if (strpos($_SERVER['REQUEST_URI'],$page_link.'.php?menu_wrapper=3') !== false) { ?>
            <a href="<?=$page_link?>.php?menu_wrapper=3" id="menu_selected">
              <li>Café</li></a>
          <? } else { ?>
            <a href="<?=$page_link?>.php?menu_wrapper=3"><li>Café</li></a>
          <? } ?>

          <?php if (strpos($_SERVER['REQUEST_URI'],$page_link.'.php?menu_wrapper=4') !== false) { ?>
            <a href="<?=$page_link?>.php?menu_wrapper=4" id="menu_selected">
              <li>Sobremesa</li></a>
          <? } else { ?>
            <a href="<?=$page_link?>.php?menu_wrapper=4"><li>Sobremesa</li></a>
          <? } ?>
        </ul>
      </nav>
    </div>
    <div class="header_bottom">
      <div class="search">
        <form action="search_filter.php" method="get">
          <input type="text" placeholder="Que Estabelecimento procura?" name="search" value="<?=isset($_GET['search']) ? $_GET['search'] : ''?>">
          <button type="submit" >Pesquisar</button>
        </form>
      </div>
    </div>
  <? } ?>

</div>
<div class="content">
