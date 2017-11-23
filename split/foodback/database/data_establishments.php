<?php
  function getAllEstablishments() {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM establishment');
    $stmt->execute();
    return $stmt->fetchAll();
  }
?>
