<?php
  include ('../config/init.php');
  include ('../database/users.php');

  $username = $_SESSION['username'];
  $old_password = $_POST['old_password'];
  $new_password = $_POST['new_password'];
  $conf_password = $_POST['conf_password'];

  if($old_password && $new_password && $conf_password){
      if($new_password === $conf_password) { /*VERIFICAR NEW = CONF PASSWORD*/
        if (password_verify($old_password, getPassword($username))) { /*VERIFICAR OLD PASSWORD*/
          try {
            changePassword($username,$new_password);
            $_SESSION['success_message'] = 'Password changed with success!';
            echo ($_SESSION['success_message']);
          } catch (PDOException $e) {
            $_SESSION['error_message'] = 'FAILLL!';
            echo ($_SESSION['error_message']);
            die(header('Location: ../definitions.php'));
          }
        } else {
          $_SESSION['error_message'] = 'Old password wrong!';
          echo ($_SESSION['error_message']);
          die(header('Location: ../definitions.php'));
        }
      } else {
        $_SESSION['error_message'] = 'Confirmation password different from New password!';
        echo ($_SESSION['error_message']);
        die(header('Location: ../definitions.php'));
      }
  }
  header('Location: ../principal.php');
?>
