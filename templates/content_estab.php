<div class="content_estab">
  <?php $id = $_GET['id']; $estab = getEstablishmentById($id); ?>
  <div class="title">
    <h1><?=$estab['name']?></h1>
  </div>
  <div class="photos">
    <script src="javascript/slidePhotos.js"></script>
    <div class="slideshow">
      <?php $i = 1; $c = 0; ?>
      <? for ($i = 1; file_exists('images/estabs/'.$estab['id'].'/photos/'.$i.'.png'); $i++) { $c++; } ?>
      <? for ($i = 1; $i < $c+1; $i++) { ?>
        <div class="mySlides_photos fade">
          <? if ($c > 1) { ?>
            <div class="numbertext_photos"><?=$i?> / <?=$c?></div>
          <? } ?>
          <img src="images/estabs/<?=$estab['id']?>/photos/<?=$i?>.png" onclick="change('slidePhotoImage')">
          <div id="slidePhotoImage">
            <div class="popup_container_image animate">
              <span class="cross_image" href="javascript:void(0)" onclick="change('slidePhotoImage')">&times;</span>
              <img class="popup_img" src="images/estabs/<?=$estab['id']?>/photos/<?=$i?>.png">
            </div>
          </div>
        </div>
      <? } ?>
      <? if ($c > 1) { ?>
        <a class="prev_photos" onclick="plusPhotos(-1)">&#10094;</a>
        <a class="next_photos" onclick="plusPhotos(1)">&#10095;</a>
      <? } ?>
    </div>
    <br>
    <div class="dots_photos">
      <?php for ($i = 1; $i < $c+1 && $c > 1; $i++) { ?>
        <span class="dot_photos" onclick="currentPhotos(<?=$i?>)"></span>
      <? } ?>
    </div>
    <script type="text/javascript">
      showPhotos(1);
    </script>
  </div>
  <div class="atributos">
    <h2>Informações</h2>
    <div class="info">
      <div class="morada">
        <h3>Morada</h3>
        <? $local = htmlspecialchars($estab['address'].", ".$estab['zone'].", ".$estab['city']); ?>
        <h5 id="address"><?=htmlspecialchars_decode($local)?></h5>
        <div id="map">
          <script type="text/javascript">
          function initMap() {
            var coords = {lat: 41.1622023, lng: -8.6569731}
            var options = {
              zoom: 12,
              center: coords
            };
            var map = new google.maps.Map(document.getElementById('map'), options);
            var geocoder = new google.maps.Geocoder();
            var link_user = '<?php echo ($estab['name'])?>';
            var address = '<?php echo($local)?>';
            geocodeAddress(geocoder, map, address, link_user, 1);
          }
          </script>
          <script src="javascript/google_api.js"></script>
          <script type="text/javascript" async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl1qO9yYI_tMH72thIxU6LbxK4ZrVwYgs&callback=initMap">
          </script>
        </div>
      </div>
      <div class="outros">
        <h3>Cozinha</h3>
        <p><?=getEstablishmentCuisineById($estab['id'])?><br>
        <h3>Preço para 2 pessoas</h3>
        <p><?=$estab['price']?>€<br></p>
        <h3>Horário</h3>
        <p><?=$estab['schedule1']?><br><?=$estab['schedule2']?></p>
        <h3>Contactos</h3>
        <p><?=$estab['contact']?></p>
      </div>
      <div class="checkbox">
        <h3>Características</h3>
        <?php if(EstablishmentHas($estab['id'], 1)) {?>
                <p>&#10004; Wifi </p>
        <? } else {?>
                <p>&#10008; Wifi </p>
        <? } ?>
        <?php if(EstablishmentHas($estab['id'], 2)) {?>
                <p>&#10004; Esplanada </p>
        <? } else {?>
                <p>&#10008; Esplanada </p>
        <? } ?>
        <?php if(EstablishmentHas($estab['id'], 3)) {?>
                <p>&#10004; Take Away </p>
        <? } else {?>
                <p>&#10008; Take Away </p>
        <? } ?>
        <?php if(EstablishmentHas($estab['id'], 4)) {?>
                <p>&#10004; Entrega ao Domicílio </p>
        <? } else {?>
                <p>&#10008; Entrega ao Domicílio </p>
        <? } ?>
        <?php if(EstablishmentHas($estab['id'], 5)) {?>
                <p>&#10004; Música ao Vivo </p>
        <? } else {?>
                <p>&#10008; Música ao Vivo </p>
        <? } ?>
      </div>
      <div class="rating">
        <h3>Popularidade</h3>
        <? $rate = round(getRatingAverage($estab['id']), 1);
        if ($rate < 2) { ?>
          <h4  id="rate_estab_2"><?=$rate?></h4>
        <? } else if ($rate < 3) { ?>
          <h4  id="rate_estab_3"><?=$rate?></h4>
        <? } else if ($rate < 4) { ?>
          <h4  id="rate_estab_4"><?=$rate?></h4>
        <? } else if ($rate <= 5) { ?>
          <h4  id="rate_estab_5"><?=$rate?></h4>
        <? } else { ?>
          <h4  id="rate_estab_none"></h4>
        <? } ?>
        <? $total_opinions = getRatingLines($estab['id']);
        if ($total_opinions == 1) { ?>
          <h5>de <?=$total_opinions?> opinião</h5>
        <? } else { ?>
          <h5>de <?=$total_opinions?> opiniões</h5>
        <? } ?>
        <? if (isset($_SESSION['username'])) { ?>
          <div class="hover_rating">
            <form class="only_rating" action="action/add_rating.php?id=<?=$estab['id']?>" method="post">
              <input type="submit" name="avaliar" value="Avaliar">
              <select name="rating">
                  <option value=0> - </option>
                  <option value=5>5 - Muito bom</option>
                  <option value=4>4 - Bom</option>
                  <option value=3>3 - Razoável</option>
                  <option value=2>2 - Mau</option>
                  <option value=1>1 - Péssimo</option>
              </select>
            </form>
          </div>
        <? } ?>
      </div>
    </div>
    <h2>Menu</h2>
    <div class="menu">
      <script src="javascript/slideMenu.js"></script>
      <script src="javascript/slidePopup.js"></script>
      <div class="slideshow">
        <?php $i = 1; $c = 0; ?>
        <? for ($i = 1; file_exists('images/estabs/'.$estab['id'].'/menu/menu'.$i.'.png'); $i++) { ?>
        <?  $c++; ?>
        <? } ?>
        <? if ($c == 0) { ?>
            <h5>Sem informação disponível</h5>
        <? } ?>
        <? for ($i = 1; $i < $c+1; $i++) { ?>
          <div class="mySlides_menu fade">
            <? if ($c > 1) { ?>
              <div class="numbertext_menu"><?=$i?> / <?=$c?></div>
            <? } ?>
            <img src="images/estabs/<?=$estab['id']?>/menu/menu<?=$i?>.png" onclick="change('slideMenuImage')" width="300px" height="500px">
          </div>

        <? } ?>
        <? if ($c > 1) { ?>
          <a class="prev_menu" onclick="plusMenu(-1)">&#10094;</a>
          <a class="next_menu" onclick="plusMenu(1)">&#10095;</a>
        <? } ?>
      </div>
      <br>
      <div class="dots_menu">
        <?php for ($i = 1; $i < $c+1 && $c > 1; $i++) { ?>
          <span class="dot_menu" onclick="currentMenu(<?=$i?>)"></span>
        <? } ?>
      </div>
      <script type="text/javascript">
        showMenu(1);
      </script>
      <div id="slideMenuImage">
        <div class="popup_container_image animate">
          <span class="cross_image" href="javascript:void(0)" onclick="change('slideMenuImage')">&times;</span>
          <? for ($j = 1; $j < $c+1; $j++) { ?>
            <div class="mySlides_popup fade">
              <? if ($c > 1) { ?>
                <div class="numbertext_popup"><?=$j?> / <?=$c?></div>
              <? } ?>
              <img src="images/estabs/<?=$estab['id']?>/menu/menu<?=$j?>.png">
            </div>
          <? } ?>
          <? if ($c > 1) { ?>
            <a class="prev_popup" onclick="plusPopup(-1)">&#10094;</a>
            <a class="next_popup" onclick="plusPopup(1)">&#10095;</a>
          <? } ?>
          <br>
          <div class="dots_popup">
            <?php for ($j = 1; $j < $c+1 && $c > 1; $j++) { ?>
              <span class="dot_popup" onclick="currentPopup(<?=$j?>)"></span>
            <? } ?>
          </div>
          <script type="text/javascript">
            showPopup(1);
          </script>
        </div>
      </div>
    </div>
    <h2>Opiniões</h2>
    <div id="opinions">
      <table>
        <tr>
          <?php if (isset($_SESSION['username'])) { ?>
          <td>
            <div class="top_comment">
              <div class="left_block">
                <h3 class="user_comment"><?=$_SESSION['name']?></h3>
                <h5>agora</h5>
              </div>
              <form method="post" action="action/add_comment.php?id=<?=$estab['id']?>" enctype="multipart/form-data">
                <select class="add_rating" name="rating">
                  <option value=0> Classificar </option>
                  <option value=5>5 - Muito bom</option>
                  <option value=4>4 - Bom</option>
                  <option value=3>3 - Razoável</option>
                  <option value=2>2 - Mau</option>
                  <option value=1>1 - Péssimo</option>
                </select>
            </div>
              <input class="add_comment" type="text" placeholder="Escreva aqui o seu comentário" name="comment">
              <input class="add_comment_img" type="file" name="image">
              <input class="comment_button" type="submit" name="enter" value="Comentar">
            </form>
          </td>
          <? } else { ?>
            <h5>Não possui a sessão iniciada...</h5>
          <? } ?>

          <?php $page = isset($_GET['page'])?$_GET['page']:0;
          $count = getCommentCountFromEstab($estab['id']); ?>
          <?php $comments = getComment($estab['id'],$page);?>
          <? $n_comments = count($comments);?>

          <? foreach ($comments as $comment) { ?>
            <td>
              <div class="top_comment">
                <div class="left_block">
                  <h3 class="user_comment" onclick="location.href='user_feed.php?username=<?=$comment['username']?>'" ><?=getName($comment['username'])?></h3>
                  <?php $timestamp = $comment['date_time'];
                  $dif = time() - strtotime($timestamp);?>
                  <? if ($dif < 60) { ?>                                      <!-- menos de 1 min -->
                    <h5>Agora</h5>
                  <? } else if ($dif < 60*60){ ?>                             <!-- menos de 1 hora -->
                    <h5>Há <?=round($dif/60)?> minutos</h5>
                  <? } else if ($dif < 60*60*2){ ?>                           <!-- menos de 2 horas -->
                    <h5>Há 1 hora</h5>
                  <? } else if ($dif < 60*60*24) {?>                          <!-- menos de 1 dia -->
                    <h5>Há <?=round($dif/(60*60))?> horas</h5>
                  <? } else if ($dif < 60*60*25) {?>                          <!-- menos de 2 dias -->
                    <h5>Ontem</h5>
                  <? } else if ($dif < 60*60*24) {?>                          <!-- menos de 1 mês -->
                    <h5>Há <?=round($dif/(60*60*24))?> dias</h5>
                  <? } else {?>                                               <!-- mais = dia&hora -->
                    <h5><?echo date("Y-m-d h:i:s", strtotime($timestamp))?></h5>
                  <? } ?>
                </div>
                <div class="right_block">
                    <? $id_comment = $comment['id']; ?>
                    <?php if (isset($_SESSION['username']) && !strcmp($_SESSION['username'],'admin')) { ?>
                      <span class="cross"
                        onclick="location.href='action/delete_comment_feed.php?id_comment=<?=$comment['id']?>&id_estab=<?=$estab['id']?>'"
                        >&times;
                      </span>
                    <? } else if (isset($_SESSION['username']) && !strcmp($_SESSION['username'],$comment['username'])) { ?>
                      <span class="cross"
                        onclick="change('verifyDeleteComment')"
                        >&times;
                      </span>
                    <? } else { ?>
                      <span class="cross"></span>
                    <? } ?>
                  <?php $rate = $comment['rate']; ?>
                  <?php if ($rate === 1) { ?>
                    <h4  id="rate_comment_1"><?=$rate?></h4>
                  <? } else if ($rate === 2) { ?>
                    <h4  id="rate_comment_2"><?=$rate?></h4>
                  <? } else if ($rate === 3) { ?>
                    <h4  id="rate_comment_3"><?=$rate?></h4>
                  <? } else if ($rate === 4) { ?>
                    <h4  id="rate_comment_4"><?=$rate?></h4>
                  <? } else if ($rate === 5) { ?>
                    <h4  id="rate_comment_5"><?=$rate?></h4>
                  <? } else { ?>
                    <h4  id="rate_comment_none"></h4>
                  <? } ?>
                </div>
              </div>
              <div class="comment_text">
                <?php if($comment['photo'] == 1) { ?>
                  <div class="comment_photo_stuff">
                    <?php if (isset($_SESSION['username']) && !strcmp($_SESSION['username'],$comment['username'])) { ?>
                      <input class="cross_photo" onclick="change('verifyDeleteCommentPhoto')" type="submit" value="Apagar Foto">
                    <?php }?>
                    <img id="comment_image" src="images/comment/<?=$comment['id']?>/1.png" alt="photo">
                  </div>
                <? } ?>
                <p class="comment"><?=$comment['feedback']?></p>
              </div>
            </td>
          <? } ?>
        </tr>
      </table>

      <!-- Ajax for load comments -->
      <? if(($page)*5+5 < $count){ ?>
        <p id="more">Mais Opiniões</p>
      <?php } else {?>
        <?$page=0;?>
      <?}?>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script>
        $("#more").click(function(){
          $("#opinions").load("establishment.php?id=<?=$estab['id']?>&page=<?=$page+1?> #opinions");
        });
      </script>
  </div>

  <!-- Pops up just when the user is the admin -->
  <?php if (isset($_SESSION['username']) && !strcmp($_SESSION['username'],'admin')) { ?>
      <a class="editpage" href="estab_edit.php?id=<?=$estab['id']?>">Editar a Página</a>
      <a class="editpage" onclick="change('verifyDeleteEstab')">Apagar Estabelecimento</a>
  <? } ?>

  <!-- Popups for delete confirmation -->
  <div id="verifyDeleteComment">
    <div class="popup_container animate">
      <div class="window">
        <span class="cross" href="javascript:void(0)" onclick="change('verifyDeleteComment')">&times;</span>
        <h3>Apagar Comentário</h3>
      </div>
      <div class="data">
        <? $comment_delete = getCommentUser($estab['id'], $_SESSION['username']); ?>
        <h5>Tem a certeza que pretende apagar o comentário "<?=$comment_delete['feedback']?>" ?</h5>
        <h5>Esta ação é irreversível e apagará todas as informações e ações a ele associadas.</h5>
        <form action="action/delete_comment.php?id_comment=<?=$comment_delete['id']?>&id_estab=<?=$estab['id']?>" method="post">
          <label><b>Palavra-Passe</b></label>
          <input type="password" placeholder="Palavra-Passe" name="password"  required>
          <button class="enterbtn" type="submit">Apagar</button>
        </form>
      </div>
    </div>
  </div>
  <div id="verifyDeleteEstab">
    <div class="popup_container animate">
      <div class="window">
        <span class="cross" href="javascript:void(0)" onclick="change('verifyDeleteEstab')">&times;</span>
        <h3>Apagar Estabelecimento</h3>
      </div>
      <div class="data">
        <h5>Tem a certeza que pretende apagar o estabelecimento <?=$estab['name']?> ?</h5>
        <h5>Esta ação é irreversível e apagará todas as informações e ações a ele associadas.</h5>
        <form action="action/delete_estab.php?id=<?=$estab['id']?>" method="post">
          <label><b>Palavra-Passe</b></label>
          <input type="password" placeholder="Palavra-Passe" name="password"  required>
          <button class="enterbtn" type="submit">Apagar</button>
        </form>
      </div>
    </div>
  </div>
  <div id="verifyDeleteCommentPhoto">
    <div class="popup_container animate">
      <div class="window">
        <span class="cross" href="javascript:void(0)" onclick="change('verifyDeleteCommentPhoto')">&times;</span>
        <h3> Apagar Foto do Comentário </h3>
      </div>
      <div class="data">
        <? $comment_delete = getCommentUser($estab['id'], $_SESSION['username']); ?>
        <h4>Tem a certeza que pretende apagar a foto do comentário "<?=$comment_delete['feedback']?>" ?</h4>
        <h4>Esta ação é irreversível e apagará todas as informações e ações a ele associadas.</h4>
        <form action="action/delete_commentphoto.php?id_comment=<?=$comment_delete['id']?>&id_estab=<?=$estab['id']?>" method="post">
          <label><b>Palavra-Passe</b></label>
          <input type="password" placeholder="Palavra-Passe" name="password"  required>
          <button class="enterbtn" type="submit">Apagar</button>
        </form>
      </div>
    </div>
  </div>

</div>
