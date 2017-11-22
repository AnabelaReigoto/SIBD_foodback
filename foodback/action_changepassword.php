<?php
  include ('/usr/users2/mieec2014/up201405662/public_html/foodback/config/init.php');
  include ('/usr/users2/mieec2014/up201405662/public_html/foodback/database/users.php');

  $username = $_SESSION['username'];
  //$oldpassword = $_SESSION['oldpassword'];

  $old_password = $_POST['old_password'];
  $new_password = $_POST['new_password'];
  $conf_password = $_POST['conf_password'];


  if($old_password && $new_password && $conf_password){
    //if($oldpassword == $old_password) { /*VERIFICAR NEW = CONF*/
      try {
        changePassword($username,$new_password);
        $_SESSION['success_message'] = 'Password changed with success!';
      } catch (PDOException $e) {
        $_SESSION['error_message'] = 'FAILLL!';
        die(header('Location: definitions.php'));
      }
    //}
  }

    header('Location: definitions.php');
  ?>
