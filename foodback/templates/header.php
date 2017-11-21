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
