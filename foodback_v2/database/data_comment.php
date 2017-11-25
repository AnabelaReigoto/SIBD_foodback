<?php
  function createComment($comment, $id_estab, $username) {
    global $conn;

    $stmt = $conn->prepare('INSERT INTO comment VALUES (DEFAULT, ?, ?, ?)');
    $stmt->execute(array($comment, $id_estab, $username));
  }

  function getComment($id_estab) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM comment WHERE id_estab = ?');
    $stmt->execute(array($id_estab));

    $comments = $stmt->fetchAll();

    return $comments;
  }

  function getCommentUsername($id_estab, $feedback) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM comment
              WHERE feedback LIKE ? AND id_estab = ?');
    $stmt->execute(array($feedback, $id_estab));

    $username = $stmt->fetch();

    return $username['username'];
  }
?>
