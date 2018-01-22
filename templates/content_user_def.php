<div class="content_edit_new_def">
  <?if (!isset($_SESSION['username']))
    die(header('Location: principal.php'));

    $username = $_SESSION['username'];
  ?>
  <div class="title">
    <?php if(file_exists('images/users/'.$_SESSION['username'].'/small/1.jpg')){?>
      <img src="images/users/<?=$_SESSION['username']?>/small/1.jpg" alt="user">
    <?php } else { ?>
      <img src="images/user.png" alt="user">
    <?php } ?>
    <h1><?=$_SESSION['name']?></h1>
  </div>
  <h2>Definições</h2>
  <?php if(file_exists('images/users/'.$username.'/small/1.jpg')){?>
    <h3>Alterar Foto de Perfil</h3>
  <?php } else { ?>
    <h3>Adicionar Foto de Perfil</h3>
  <?php } ?>
  <div class="photo_user">
    <form action="action/uploaduserphoto.php?username=<?=$_SESSION['username']?>" method="post" enctype="multipart/form-data">
      <input type="file" name="image">
      <input type="submit" value="Upload">
    </form>
  </div>
  <div class="data">
    <form method="post" action="action/change_user_def.php">
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
    <form method="post" action="action/change_password.php">
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
