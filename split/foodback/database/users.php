<?php

  function isValidUser($username, $password) {
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();

    return $user !== false && password_verify($password, $user['password']);
  }

  function createUser($username, $password,$name,$email,$address) {
    global $conn;

    $options = [
        'cost' => 12,
    ];

    $hash = password_hash ($password , PASSWORD_DEFAULT, $options);

    $stmt = $conn->prepare('INSERT INTO users VALUES (?, ? , ? , ?, ?)');
    $stmt->execute(array($username, $hash, $name, $email, $address));
  }

  function changeName($username, $name){
    global $conn;

    $stmt = $conn->prepare('UPDATE users SET name = ? WHERE username = ?');
    $stmt->execute(array($name, $username));
  }

  function changeEmail($username,$email){
    global $conn;

    $stmt = $conn->prepare('UPDATE users SET email = ? WHERE username = ?');
    $stmt->execute(array($email, $username));
  }

  function changeAddress($username,$address){
    global $conn;

    $stmt = $conn->prepare('UPDATE users SET address = ? WHERE username = ?');
    $stmt->execute(array($address, $username));
  }

  function getPassword($username){
    global $conn;

    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();

    return $user['password'];
  }

  function changePassword($username,$password){
    global $conn;

    $options = [
        'cost' => 12,
    ];

    $hash = password_hash ($password , PASSWORD_DEFAULT, $options);

    $stmt = $conn->prepare('UPDATE users SET password = ? WHERE username = ?');
    $stmt->execute(array($hash, $username));
  }

?>
