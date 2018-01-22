<?php

  function getSearchFilter($specs, $eat, $price, $local, $order_price, $order_pop) {

    global $conn;

    $estabs_specs = array();
    $estabs_eat = array();
    $estabs_price = array();
    $estabs_local = array();

    // table with the id_estab and the average rate of each one
    $join_comment = " FULL JOIN ( SELECT id_estab, AVG(rate) AS avg_rate
                                  FROM comment GROUP BY comment.id_estab  ) AS rate_avg
                                  ON establishment.id = rate_avg.id_estab ";

    // Define order of the output
    if ($order_price == 1) {
      $order = ' ORDER BY establishment.price desc';
    }
    if (!$order_price){
      $order = ' ORDER BY establishment.price asc';
    }
    if ($order_pop == 1) {
      $order = ' ORDER BY rate_avg.avg_rate desc';
    }
    if (!$order_pop){
      $order = ' ORDER BY rate_avg.avg_rate asc';
    }
    if($order_price == 2 && $order_pop == 2) {
      $order = '';
    }

    //specs
    $query_specs = "SELECT hasinfo.id_estab
                    FROM hasinfo JOIN establishment ON hasinfo.id_estab = establishment.id"
                    .$join_comment.
                    "WHERE 1=1 AND ";
    $str_specs = array();
    foreach ($specs as $by_specs) {
      $str_specs[] = "hasinfo.id_estab IN ( SELECT hasinfo.id_estab
                                            FROM hasinfo WHERE id_info = ? )";
    }
    if (count($str_specs) > 0) {
      $query_specs .= implode(' AND ', $str_specs);
      $query_specs .= ' GROUP BY establishment.id, hasinfo.id_estab, rate_avg.avg_rate';
      $query_specs .= $order;
      $stmt = $conn->prepare($query_specs);
      $stmt->execute(array_values($specs));
      $aux = $stmt->fetchAll();
      foreach ($aux as $arr) {
        $estabs_specs[]=$arr['id_estab'];
      }
    }

    //eat
    $query_eat = "SELECT hascuisine.id_estab
                  FROM hascuisine JOIN establishment ON hascuisine.id_estab = establishment.id"
                  .$join_comment.
                  "WHERE 1=1 AND ";
    $str_eat = array();
    foreach ($eat as $by_eat) {
      $str_eat[] = "hascuisine.id_estab IN ( SELECT hascuisine.id_estab
                                            FROM hascuisine WHERE id_cuisine = ? )";
    }
    if (count($str_eat) > 0) {
      $query_eat .= implode(' OR ', $str_eat);
      $query_eat .= ' GROUP BY establishment.id, hascuisine.id_estab, rate_avg.avg_rate';
      $query_eat .= $order;
      $stmt = $conn->prepare($query_eat);
      $stmt->execute(array_values($eat));
      $aux = $stmt->fetchAll();
      foreach ($aux as $arr) {
        $estabs_eat[]=$arr['id_estab'];
      }
    }

    //price
    $query_price = "SELECT establishment.id FROM establishment".$join_comment;
    $str_price = array();
    foreach ($price as $by_price) {
      if ($by_price == 10) {
        $str_price[] = "price <= $by_price";
      } else  if ($by_price < 50) {
        $str_price[] = "price > ($by_price-10) AND price <= $by_price";
      } else {
        $str_price[] = "price > ($by_price-10)";
      }
    }
    if (count($str_price) > 0) {
      $query_price .= " WHERE " . implode(' OR ', $str_price);
      $query_price .= ' GROUP BY establishment.id, rate_avg.avg_rate';
      $query_price .= $order;
      $stmt = $conn->prepare($query_price);
      $stmt->execute();
      $aux = $stmt->fetchAll();
      foreach ($aux as $arr) {
        $estabs_price[]=$arr['id'];
      }
    }

    //Location
    $all_Porto = 0;
    $all_Lisboa = 0;
    $query_local = "SELECT establishment.id FROM establishment".$join_comment;
    $str_local = array();
    foreach ($local as $zone) {
      if (!strcmp($zone, 'All_Porto')) {
        $all_Porto = 1;
        break;
      }
      if (!strcmp($zone, 'All_Lisboa')) {
        $all_Lisboa = 1;
        break;
      }
      $str_local[] = "zone = '$zone'";
    }
    if (count($str_local) > 0) {
      $query_local .= " WHERE " . implode(' OR ', $str_local);
      $query_local .= ' GROUP BY establishment.id, rate_avg.avg_rate';
      $query_local .= $order;
      $stmt = $conn->prepare($query_local);
      $stmt->execute();
      $aux = $stmt->fetchAll();
      foreach ($aux as $arr) {
        $estabs_local[]=$arr['id'];
      }
    } else if ($all_Porto) {
      $query_local .= " WHERE city = 'Porto'";
      $query_local .= ' GROUP BY establishment.id, rate_avg.avg_rate';
      $query_local .= $order;
      $stmt = $conn->prepare($query_local);
      $stmt->execute();
      $aux = $stmt->fetchAll();
      foreach ($aux as $arr) {
        $estabs_local[]=$arr['id'];
      }
    } else if ($all_Lisboa) {
      $query_local .= " WHERE city = 'Lisboa'";
      $query_local .= ' GROUP BY establishment.id, rate_avg.avg_rate';
      $query_local .= $order;
      $stmt = $conn->prepare($query_local);
      $stmt->execute();
      $aux = $stmt->fetchAll();
      foreach ($aux as $arr) {
        $estabs_local[]=$arr['id'];
      }
    }

    // Define the return values by knowing the results of each variable

    if(empty($estabs_specs)) {
      if(empty($estabs_eat)) {
        $array = $estabs_price;
      } else if (empty($estabs_price)) {
        $array = $estabs_eat;
      } else {
        $array = array_intersect($estabs_eat, $estabs_price);
      }
    }
    if(empty($estabs_eat)) {
      if(empty($estabs_price)) {
        $array = $estabs_specs;
      } else if (empty($estabs_specs)) {
        $array = $estabs_price;
      } else {
        $array = array_intersect($estabs_price, $estabs_specs);
      }
    }
    if(empty($estabs_price)) {
      if(empty($estabs_eat)) {
        $array = $estabs_specs;
      } else if (empty($estabs_specs)) {
        $array = $estabs_eat;
      } else {
        $array = array_intersect($estabs_specs, $estabs_eat);
      }
    }
    if (!empty($estabs_specs) && !empty($estabs_eat) && !empty($estabs_price)) {
      $array = array_intersect($estabs_specs, $estabs_eat, $estabs_price);
    }

    if (empty($estabs_specs) && empty($estabs_eat) && empty($estabs_price && empty($estabs_local))) {
      $stmt = $conn->prepare('SELECT establishment.id FROM establishment'.$join_comment.$order);
      // print_r('SELECT establishment.id FROM establishment'.$join_comment.$order);
      // die();
      $stmt->execute();
      $aux = $stmt->fetchAll();
      foreach ($aux as $arr) {
        $estabs_local[]=$arr['id'];
      }
    }

    if (empty($estabs_local)) {
      return array_values($array);
    } else if (!empty($array)){
      $array = array_intersect($estabs_local, $array);
    } else {
      $array = $estabs_local;
    }

    return array_values($array);

  }

  function getSearchText($name) {
    global $conn;

    $search = '%'.$name.'%';

    $stmt = $conn->prepare('SELECT * FROM establishment WHERE name ILIKE ?');
    $stmt->execute(array($search));

    return $stmt->fetchAll();
  }

?>
