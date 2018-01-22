<?php

/*******************************---- create ----*******************************/

  function createComment($comment, $id_estab, $username, $photo) {
    global $conn;

    $stmt = $conn->prepare('INSERT INTO comment VALUES (DEFAULT, ?, ?, ?, now(), ?, NULL)');
    $stmt->execute(array($comment, $id_estab, $username, $photo));
  }

/*******************************---- change ----*******************************/

  function changeComment($comment, $id_estab, $username, $photo) {
    global $conn;

    $stmt = $conn->prepare('UPDATE comment SET feedback = ?, photo = ?, date_time = now()
                            WHERE username = ? AND id_estab = ?');
    $stmt->execute(array($comment, $photo, $username, $id_estab));
  }

/*********************************---- get ----********************************/

  function getComment($id_estab, $page) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM comment WHERE id_estab = ? ORDER BY date_time desc LIMIT ?');
    $stmt->execute(array($id_estab,$page*5+5));

    return $stmt->fetchAll();
  }

  function getCommentById($id) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM comment WHERE id = ?');
    $stmt->execute(array($id));

    return $stmt->fetchAll();
  }

  function getCommentUser($id_estab, $username) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM comment WHERE id_estab = ? AND username = ?');
    $stmt->execute(array($id_estab, $username));

    return $stmt->fetchAll()[0];
  }

  function getCommentId($id_estab, $comment, $username) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM comment WHERE id_estab = ? AND feedback = ? AND username = ?');
    $stmt->execute(array($id_estab, $comment, $username));
    return $stmt->fetch()['id'];
  }

  function getCommentCountFromEstab($id_estab) {
    global $conn;

    $stmt = $conn->prepare('SELECT COUNT(*) AS count FROM comment WHERE id_estab = ?');
    $stmt->execute(array($id_estab));
    return $stmt->fetch()['count'];
  }

  function HasComment($id_estab, $username) {
    global $conn;

    $stmt = $conn->prepare('SELECT COUNT(username) AS count FROM comment WHERE id_estab = ? AND username = ?');
    $stmt->execute(array($id_estab, $username));
    return $stmt->fetch()['count'];
  }

/*******************************---- delete ----*******************************/

  /* Verificar esta para as imagens ficarem novamente seguidas, tipo apaga 3 a 4 passa a ter o nome 3 ... */
  function deleteComment($id_comment) {
    global $conn;

    if (file_exists("../images/comment/$id_comment")) {
      unlink("../images/comment/$id_comment/1.png");
      rmdir("../images/comment/$id_comment");
    }
    $stmt = $conn->prepare('DELETE FROM comment WHERE id = ?');
    $stmt->execute(array($id_comment));
  }

  function deleteCommentPhoto($id_comment) {
    global $conn;

    if (file_exists("../images/comment/$id_comment")) {
      unlink("../images/comment/$id_comment/1.png");
      rmdir("../images/comment/$id_comment");
    }
    $stmt = $conn->prepare('UPDATE comment SET photo = FALSE WHERE id = ?');
    $stmt->execute(array($id_comment));
  }



?>
