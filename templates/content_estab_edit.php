<div class="content_edit_new_def">
  <div class="title">
    <?php $estab = getEstablishmentById($_GET['id']); ?>
    <h1><?=$estab['name']?></h1>
  </div>
  <h3>Alterar Fotos</h3>
  <div class="change_photos">
    <form action="action/uploadphoto.php?id=<?=$estab['id']?>" method="post" enctype="multipart/form-data">
      <input type="file" name="image">
      <input type="submit" value="Upload">
    </form>
  </div>
  <h2>Definições</h2>
  <div class="data">
    <form method="post" action="action/estab_edit.php?id=<?=$estab['id']?>">
      <label><b>Nome: <?=$estab['name']?></b></label>
      <input type="text" placeholder="Nome" name="name" >

      <label><b>Morada: <?=$estab['address']?></b></label>
      <input type="text" placeholder="Morada" name="address" >

      <label><b>Zona: <?=$estab['zone']?></b></label>
      <input type="text" placeholder="Zona" name="zone" >

      <label><b>Cidade: <?=$estab['city']?></b></label>
      <input type="text" placeholder="Cidade" name="city" >

      <label><b>Cozinha: <?=getEstablishmentCuisineById($estab['id'])?></b><br></label>
      <select name="cuisine">
          <option value=0> - </option>
          <option value="Portuguesa">Portuguesa</option>
          <option value="Italiana">Italiana</option>
          <option value="Chinesa">Chinesa</option>
          <option value="Japonesa">Japonesa</option>
          <option value="Marisqueira">Marisqueria</option>
          <option value="Hamburgaria">Hamburgaria</option>
          <option value="Café">Café</option>
          <option value="Bar">Bar</option>
          <option value="Sobremesas">Sobremesas</option>
      </select><p></p>

      <label><b>Preço para 2 pessoas: <?=$estab['price']?>€</b></label>
      <input type="text" placeholder="Preço para 2 pessoas" name="price" >

      <label><b>Horário 1: <?=$estab['schedule1']?></b></label>
      <input type="text" placeholder="Horário1" name="schedule1" >

      <label><b>Horário 2: <?=$estab['schedule2']?></b></label>
      <input type="text" placeholder="Horário2" name="schedule2" >

      <label><b>Contacto: <?=$estab['contact']?></b></label>
      <input type="text" placeholder="Contacto" name="contact" >

      <div class="specs">
        <?php if(EstablishmentHas($estab['id'],1)) {?>
          <div class="spec_row">
            <input type="checkbox" name="wifi" value="wifi" checked>
            <h5>Wifi</h5>
          </div>
        <?php } else {?>
          <div class="spec_row">
            <input type="checkbox" name="wifi" value="wifi">
            <h5>Wifi</h5>
          </div>
        <?php } ?>

        <?php if(EstablishmentHas($estab['id'],2)) {?>
          <div class="spec_row">
            <input type="checkbox" name="takeaway" value="takeaway" checked>
            <h5>Take Away</h5>
          </div>
        <?php } else {?>
          <div class="spec_row">
            <input type="checkbox" name="takeaway" value="takeaway" >
            <h5>Take Away</h5>
          </div>
        <?php } ?>

        <?php if(EstablishmentHas($estab['id'],3)) {?>
          <div class="spec_row">
            <input type="checkbox" name="terrace" value="terrace" checked>
            <h5>Esplanada</h5>
          </div>
        <?php } else {?>
          <div class="spec_row">
            <input type="checkbox" name="terrace" value="terrace">
            <h5>Esplanada</h5>
          </div>
        <?php } ?>

        <?php if(EstablishmentHas($estab['id'],4)) {?>
          <div class="spec_row">
            <input type="checkbox" name="delivery" value="delivery" checked>
            <h5>Entrega ao Domicílio</h5>
          </div>
        <?php } else {?>
          <div class="spec_row">
            <input type="checkbox" name="delivery" value="delivery">
            <h5>Entrega ao Domicílio</h5>
          </div>
        <?php } ?>

        <?php if(EstablishmentHas($estab['id'],5)) {?>
          <div class="spec_row">
            <input type="checkbox" name="music" value="music" checked>
            <h5>Música ao Vivo</h5>
          </div>
        <?php } else {?>
          <div class="spec_row">
            <input type="checkbox" name="music" value="music">
            <h5>Música ao Vivo</h5>
          </div>
        <?php } ?>
      </div>

      <button class="enterbtn" type="submit">Alterar</button>
    </form>
  </div>
  <h3>Alterar Menu</h3>
  <div class="change_menu">
    <h5>Alterar a foto </h5>
    <form action="action/uploadmenu.php?id=<?=$estab['id']?>" method="post" enctype="multipart/form-data">
    <select name="choose">
      <option value=0> - </option>
      <?php $i = 1; $c = 0; ?>
      <? for ($i = 1; file_exists('images/estabs/'.$estab['id'].'/menu/menu'.$i.'.png'); $i++) { $c++; } ?>
      <?php for ($i = 1; $i < $c+1; $i++) { ?>
        <option value=<?=$i?>> <?=$i?> </option>
      <? } ?>
    </select>
      <input type="file" name="image">
      <input type="submit" value="Upload">
    </form>
    <h5>Upload de nova foto </h5>
    <form action="action/uploadmenu.php?id=<?=$estab['id']?>&photo=<?=$i?>" method="post" enctype="multipart/form-data">
      <input type="file" name="image">
      <input type="submit" value="Upload">
    </form>
  </div>
</div>
