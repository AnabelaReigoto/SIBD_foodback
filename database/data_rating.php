<?php

/*******************************---- create ----*******************************/

  function createRating($id_estab, $username, $rate) {
    global $conn;
    $photo = 0;
    $stmt = $conn->prepare('INSERT INTO comment VALUES (DEFAULT, NULL , ?, ?, now(),?, ?)');
    $stmt->execute(array($id_estab, $username, $photo, $rate));
  }

/*******************************---- change ----*******************************/

  function changeRating($id_estab, $username, $rate) {
    global $conn;
    $stmt = $conn->prepare('UPDATE comment SET rate = ?, date_time = now() WHERE id_estab = ? AND username = ?');
    $stmt->execute(array($rate, $id_estab, $username));
  }

/********************************---- get ----*********************************/

  function getRating($id_comment) {
    global $conn;

    $stmt = $conn->prepare('SELECT rate FROM comment WHERE id = ?');
    $stmt->execute(array($id_comment));

    $ratings = $stmt->fetch();

    return $ratings;
  }

  function getRatingAverage($id_estab) {
    global $conn;

    $stmt = $conn->prepare('SELECT AVG(rate) FROM comment WHERE id_estab = ?');
    $stmt->execute(array($id_estab));

    $rateAvg = $stmt->fetch();

    return $rateAvg['avg'];
  }

  function getRatingLines($id_estab) {
    global $conn;

    $stmt = $conn->prepare('SELECT COUNT (rate) AS total FROM comment WHERE id_estab = ?');
    $stmt->execute(array($id_estab));

    $rateOpinions = $stmt->fetch();
    return $rateOpinions['total'];
  }

  function HasRating($id_estab, $username) {
    global $conn;

    $stmt = $conn->prepare('SELECT COUNT(rate) AS count FROM comment WHERE username = ? AND id_estab = ?');
    $stmt->execute(array($username, $id_estab));

    return $stmt->fetch()['count'];
  }
?>
