<?php
  function createComment($comment, $id_estab, $username) {
    global $conn;

    $stmt = $conn->prepare('INSERT INTO comment VALUES (DEFAULT, ?, ?, ?)');
    $stmt->execute(array($comment, $id_estab, $username));
  }

  /*function getCommentID($id_estab) {
    global $conn;

    $stmt = $conn->prepare('SELECT ? FROM establishment WHERE establishment');
    $stmt->execute(array($id_estab));

    $id_estab = $stmt->fetch();
  }*/
?>
