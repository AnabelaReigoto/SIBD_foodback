<?php
  include ('templates/head.php');

  $page_size = 2;

  $order_price = NULL;
  $order_pop = NULL;

  $specs = array();
  if (isset($_GET['wifi'])) {
    $specs[0] = 1;
  }
  if (isset($_GET['terrace'])) {
    $specs[1] = 2;
  }
  if (isset($_GET['takeaway'])) {
    $specs[2] = 3;
  }
  if (isset($_GET['delivery'])) {
    $specs[3] = 4;
  }
  if (isset($_GET['music'])) {
    $specs[4] = 5;
  }

  $eat = array();
  if (isset($_GET['pt'])) {
    $eat[0] = 1;
  }
  if (isset($_GET['it'])) {
    $eat[1] = 2;
  }
  if (isset($_GET['ch'])) {
    $eat[2] = 3;
  }
  if (isset($_GET['jp'])) {
    $eat[3] = 4;
  }
  if (isset($_GET['mar'])) {
    $eat[4] = 5;
  }
  if (isset($_GET['ham'])) {
    $eat[5] = 6;
  }
  if (isset($_GET['coffee'])) {
    $eat[6] = 7;
  }
  if (isset($_GET['bar'])) {
    $eat[7] = 8;
  }
  if (isset($_GET['sweet'])) {
    $eat[8] = 9;
  }

  $price = array();
  if (isset($_GET['10'])) {
    $price[0] = 10;
  }
  if (isset($_GET['20'])) {
    $price[1] = 20;
  }
  if (isset($_GET['30'])) {
    $price[2] = 30;
  }
  if (isset($_GET['40'])) {
    $price[3] = 40;
  }
  if (isset($_GET['50'])) {
    $price[4] = 50;
  }

  $local = array();

  /*-- Porto --*/
  if (isset($_GET['All_Porto'])) {
    $local[0] = 'All_Porto';
  }
  if (isset($_GET['Baixa'])) {
    $local[1] = 'Baixa';
  }
  if (isset($_GET['Boavista'])) {
    $local[2] = 'Boavista';
  }
  if (isset($_GET['Foz'])) {
    $local[3] = 'Foz';
  }
  if (isset($_GET['Matosinhos'])) {
    $local[4] = 'Matosinhos';
  }
  if (isset($_GET['Cedofeita'])) {
    $local[5] = 'Cedofeita';
  }
  if (isset($_GET['Batalha'])) {
    $local[6] = 'Batalha';
  }
  if (isset($_GET['Trindade'])) {
    $local[7] = 'Trindade';
  }

  /*-- Lisboa --*/
  if (isset($_GET['All_Lisboa'])) {
    $local[8] = 'All_Lisboa';
  }
  if (isset($_GET['Belém'])){
    $local[9] = 'Belém';
  }
  if (isset($_GET['Rato'])) {
    $local[10] = 'Rato';
  }
  if (isset($_GET['Chiado'])) {
    $local[11] = 'Chiado';
  }
  if (isset($_GET['Saldanha'])) {
    $local[12] = 'Saldanha';
  }
  if (isset($_GET['Bairro Alto'])) {
    $local[13] = 'Bairro Alto';
  }
  if (isset($_GET['Príncipe Real'])) {
    $local[14] = 'Príncipe Real';
  }


  if(isset($_GET['radio'])) {
    if($_GET['radio'] == 'cost_desc') {
      $order_price = 1;
    } else if ($_GET['radio'] == 'cost_asc'){
      $order_price = 0;
    } else {
      $order_price = 2;
    }
    if ($_GET['radio'] == 'pop_desc') {
      $order_pop = 1;
    } else if ($_GET['radio'] == 'pop_asc'){
      $order_pop = 0;
    } else {
      $order_pop = 2;
    }
  }

  $searchResult = getSearchFilter($specs, $eat, $price, $local, $order_price, $order_pop);

  include ('templates/header_homepage.php');

  include ('templates/content_filter.php');
  include ('templates/content_center.php');

  include ('templates/footer.php');
?>
