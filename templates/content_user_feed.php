<div class="content_user_feed">
  <?php  $username = isset($_GET['username'])?$_GET['username']:$_SESSION['username'];?>
  <div class="user_header">
    <?php if(file_exists('images/users/'.$_SESSION['username'].'/small/1.jpg')){?>
      <img src="images/users/<?=$_SESSION['username']?>/small/1.jpg" alt="user">
    <?php } else { ?>
      <img src="images/user.png" alt="user">
    <?php } ?>
    <h1><?=$_SESSION['name']?></h1>
    <?php $num_opinions = getAvgOpinions($_SESSION['username']);
    if ($num_opinions == 1) { ?>
      <p><?=$num_opinions?> opinião</p>
    <? } else { ?>
      <p><?=$num_opinions?> opiniões</p>
    <? } ?>
  </div>
  <h2>Opiniões</h2>
  <div id="opinions">
    <table>
      <tr>
        <?php $comments = getCommentsFromUsername($_SESSION['username']);?>
        <? foreach ($comments as $comment) { ?>
        <td>
          <div class="top_comment">
            <div class="left_block">
              <div class="title_comment">
                <h3 class="user_comment"><?=getName($comment['username'])?></h3>
                <div class="estab_commented">
                      <a href="#">opinou sobre</a>
                      <a href="establishment.php?id=<?=$comment['id_estab']?>"><?=getEstablishmentById($comment['id_estab'])['name']?></a>
                </div>
              </div>
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
              <?php if (isset($_SESSION['username'])) { ?>
                <span class="cross"
                onclick="location.href='action/delete_comment_feed.php?id_comment=<?=$comment['id']?>&id_estab=<?=$comment['id_estab']?>'"
                >&times;</span>
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
            <p class="comment"><?=$comment['feedback']?></p>
          </div>
        </td>
        <? } ?>
      </tr>
    </table>
  </div>
  <h2>Recomendações</h2>
  <? $cont = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
  $estabs_id = array();
  for ($i = 0; $i < count($comments); $i++) {
    $cuisines[$i] = getEstablishmentCuisineIdById($comments[$i]['id_estab']);
    $cont[$cuisines[$i]]++;
  }
  $max = 0;
  $max_id = array();
  $j = 0;
  for ($i = 0; $i < count($cont); $i++) {
    if ($cont[$i] > $max) {
      $max_id[$j] = $i;
      $max = $cont[$i];
      $j++;
    }
  }
  usort($max_id, function($a, $b){
    return $a['id']-$b['id'];
  });
  for ($i = 0; $i < count($max_id); $i++) {
    $estabs_id[$i] = getAllEstabByCuisine($max_id[$i]);
  } ?>
  <? if (count($estabs_id) > 0) { ?>
    <div class="recommended">
      <table align=center>
        <th>
        <? $del = 0;
        for ($i = 0; $i < count($estabs_id); $i++) {
          for ($j = 0; $j < count($estabs_id[$i]); $j++) {
            $estabs = getAllEstablishmentsById($estabs_id[$i][$j]['id_estab']);
            foreach ($estabs as $estab) {
              for ($z = 0; $z < count($comments); $z++) {
                if ($estab['id'] == $comments[$z]['id_estab']) {
                  $del = 1;
                  break;
                }
              }
              if ($del == 1) {
                $del = 0;
                continue;
              } ?>
              <td onclick="location.href='establishment.php?id=<?=$estab['id']?>'" class="establishment">
                <div class="image">
                  <img src="images/estabs/<?=$estab['id']?>/photos/1.png" alt="logo" >
                </div>
                <div class="title">
                  <h1><?=$estab['name']?></h1>
                  <? $rate = round(getRatingAverage($estab['id']), 1);
                  if ($rate < 1) { ?>
                    <h3></h3>
                  <? } else if ($rate < 2) { ?>
                    <h3 id="rate_estab_2" ><?=$rate?></h3>
                  <? } else if ($rate < 3) { ?>
                    <h3 id="rate_estab_3"><?=$rate?></h3>
                  <? } else if ($rate < 4) { ?>
                    <h3 id="rate_estab_4"><?=$rate?></h3>
                  <? } else if ($rate <= 5) { ?>
                    <h3 id="rate_estab_5"><?=$rate?></h3>
                  <? } else { ?>
                    <h3 id="rate_estab_none"></h3>
                  <? } ?>
                </div>
                <div class="text">
                  <p><?=getEstablishmentCuisineById($estab['id'])?><br><?=$estab['zone']?>,
                  <?=$estab['city']?><br>Preço para 2 pessoas: <?=$estab['price']?>€<br></p>
                </div>
              </td>
            <? } ?>
          <? } ?>
        <? } ?>
        </th>
      </table>
    </div>
  <? } else { ?>
    <div class="recommended">
      <h5>Para ter recomendações com base nos tipos de estabelecimentos que costuma frequentar, necessita de partilhar mais opininões acerca dos mesmos.</h5>
    </div>
  <? } ?>
</div>
</div>
