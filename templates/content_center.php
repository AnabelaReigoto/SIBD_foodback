<div class="content_center">
  <? $page = isset($_GET['page'])?$_GET['page']:0; ?>
  <?$estabs = array();?>
  <? if (!isset($searchText)) {
    if(!isset($searchResult)) {
      if (isset($_GET['menu_wrapper'])) {
        if ($_GET['menu_wrapper'] == 1) {
          $estabs = getAllEstabByCategory(1,$page,$page_size);
          $count_estabs = getCountEstabByCategory(1);
        } else if ($_GET['menu_wrapper'] == 2) {
          $estabs = getAllEstabByCategory(2,$page,$page_size);
          $count_estabs = getCountEstabByCategory(2);
        } else if ($_GET['menu_wrapper'] == 3) {
          $estabs = getAllEstabByCategory(3,$page,$page_size);
          $count_estabs = getCountEstabByCategory(3);
        } else if ($_GET['menu_wrapper'] == 4) {
          $estabs = getAllEstabByCategory(4,$page,$page_size);
          $count_estabs = getCountEstabByCategory(4);
        }
      } else {
          $estabs = getAllEstablishments($page,$page_size);
          $count_estabs = getCountAllEstablishments();
      }
    } else {
      if (!$searchResult) { ?>
        <h2>Nenhum resultado obtido...</h2>
        <? $count_estabs = 0; ?>
      <? } else {
        $count_estabs = count($searchResult);
        for ($i = $page_size*$page; $i < $page_size*($page + 1); $i++) {
          if($i < $count_estabs){
            $estabs[] = getEstablishmentById($searchResult[$i]);
          }
        }
      }
    }
  } else {
    if (!$searchText) { ?>
      <h4 class="no_search"><br>Nenhum resultado obtido...</h4>
      <? $count_estabs = 0; ?>
    <? } else {
      $count_estabs = count($searchText);
      for ($i = $page_size*$page; $i < $page_size*($page + 1); $i++) {
        if($i < $count_estabs){
          $estabs[] = getEstablishmentById($searchText[$i]['id']);
        }
      }
    }
  } ?>

  <table align=center>
    <th>
    <?php foreach ($estabs as $estab) { ?>
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
            <h3 class="rate_estab_2" ><?=$rate?></h3>
          <? } else if ($rate < 3) { ?>
            <h3 class="rate_estab_3"><?=$rate?></h3>
          <? } else if ($rate < 4) { ?>
            <h3 class="rate_estab_4"><?=$rate?></h3>
          <? } else if ($rate <= 5) { ?>
            <h3 class="rate_estab_5"><?=$rate?></h3>
          <? } else { ?>
            <h3 class="rate_estab_none"></h3>
          <? } ?>
        </div>
        <div class="text">
          <p><?=getEstablishmentCuisineById($estab['id'])?><br><?=$estab['zone']?>,
          <?=$estab['city']?><br>Preço para 2 pessoas: <?=$estab['price']?>€<br></p>
        </div>
      </td>
    <?php } ?>
    </th>
  </table>
</div>

<? if ((strpos($_SERVER['REQUEST_URI'],'filter.php') !== false || strpos($_SERVER['REQUEST_URI'],'searching.php') !== false) && (count($estabs)!=0) && (isset($_SESSION['username']))) { ?>
  <div class="mapa">
  <? $local = (getAddress($_SESSION['username'])); ?>
  <? $num_page = count($estabs); ?>

  <? for ($i = 0; $i < $num_page; $i++) {
    $establishments[$i] = ($estabs[$i]['address'].", ".$estabs[$i]['zone'].", ".$estabs[$i]['city']);
    $link_estabs[$i] = ($estabs[$i]['name']." - ".getCuisineNameByEstab($estabs[$i]['id']));
    }
  ?>
    <div id="map_user">
    <script type="text/javascript">
    /******* Google API *******/

    function initMap() {
      var coords = {lat: 41.1622023, lng: -8.6569731}
      var options = {
        zoom: 12,
        center: coords
      };
      var map = new google.maps.Map(document.getElementById('map_user'), options);
      var geocoder = new google.maps.Geocoder();
      var address = '<?php echo($local)?>';
      var link_user = JSON.parse('<?php echo json_encode(getAddress($_SESSION['username']), JSON_UNESCAPED_UNICODE)?>');
      geocodeAddress(geocoder, map, address, link_user, 1);
      var page = JSON.parse('<?php echo json_encode($page, JSON_UNESCAPED_UNICODE)?>');
      var page_size = JSON.parse('<?php echo json_encode($page_size, JSON_UNESCAPED_UNICODE)?>');
      var locations = new Array();
      locations = JSON.parse('<?php echo json_encode($establishments, JSON_UNESCAPED_UNICODE)?>');
      var link_estab = new Array();
      link_estab = JSON.parse('<?php echo json_encode($link_estabs, JSON_UNESCAPED_UNICODE)?>');
      var num_page = JSON.parse('<?php echo json_encode($num_page, JSON_UNESCAPED_UNICODE)?>');
      console.log(locations);
      console.log(num_page);
      for (var i = 0; i < num_page; i++) {
        // setTimeout(function {
          console.log(i);
          geocodeAddress(geocoder, map, locations[i], link_estab[i], 0);
        // }, i*200);
      }
    }

    </script>

    <!-- <script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script src="/assets/gmap3.js?body=1" type="text/javascript"></script> -->

    <script src="javascript/google_api.js"></script>
    <script type="text/javascript" async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl1qO9yYI_tMH72thIxU6LbxK4ZrVwYgs&callback=initMap">
    </script>
    </div>
  </div>
<? } ?>
<div id="pagination">

  <?php $page_link = str_replace("&page=$page","", $_SERVER['REQUEST_URI']) ; ?>

  <?php if ($count_estabs != 0 && $count_estabs > $page_size){ ?>
    <?php if ($page != 0) { ?>
      <?php if (strpos($page_link,'php?') != false ){ ?>
        <a href="<?=$page_link?>&page=<?=$page-1?>"><i class="fa fa-arrow-left"></i></a>
      <?php } ?>
      <?php if (strpos($page_link,'php?') != true ){ ?>
        <a href="<?=$page_link?>?page=<?=$page-1?>"><i class="fa fa-arrow-left"></i></a>
      <?php } ?>
    <?php } ?>

      <?=$page+1?>

    <?php if (($page + 1) * $page_size < $count_estabs) { ?>
      <?php if (strpos($page_link,'php?') != false ){ ?>
        <a href="<?=$page_link?>&page=<?=$page+1?>"><i class="fa fa-arrow-right"></i></a>
      <?php } ?>
      <?php if (strpos($page_link,'php?') != true ){ ?>
        <a href="<?=$page_link?>?page=<?=$page+1?>"><i class="fa fa-arrow-right"></i></a>
      <?php } ?>
    <?php } ?>
  <?php } ?>
</div>
