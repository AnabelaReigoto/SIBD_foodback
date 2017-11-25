<?php

  function getAllCoffees() {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM establishment WHERE id_cat = 3');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getCoffeeById($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM establishment WHERE id_cat = 3 AND id = ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

?>
