<?php

  function getAllSweets() {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM establishment WHERE id_cat = 4');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getSweetById($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM establishment WHERE id_cat = 4 AND id = ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

?>
