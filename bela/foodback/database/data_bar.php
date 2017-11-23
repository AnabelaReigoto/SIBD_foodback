<?php

  function getAllBars() {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM establishment WHERE id_cat = 2');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getBarById($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM establishment WHERE id_cat = 2 AND id = ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

?>
