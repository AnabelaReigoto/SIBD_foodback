<!DOCTYPE html>
<html>
  <?php
    include ('config/init.php');

    include ('database/users.php');

    include ('database/data_establishments.php');
    include ('database/data_restaurant.php');
    include ('database/data_coffee.php');
    include ('database/data_bar.php');
    include ('database/data_sweet.php');
  ?>
  <head>
    <title>foodback</title>
    <link rel="stylesheet"
    <?php if (strpos($_SERVER['REQUEST_URI'],'definitions.php') !== false) { ?>
      href="css/test3.css"
    <? } if (strpos($_SERVER['REQUEST_URI'],'establishment.php') !== false) { ?>
      href="css/test2.css"
    <? } if (strpos($_SERVER['REQUEST_URI'],'user_feed.php') !== false) { ?>
      href="css/test1.css"
    <? } else { ?>
      href="css/test.css"
    <? } ?>
    >
    <meta charset="UTF-8">

    <script type="text/javascript">
      function change(id) {
         var e = document.getElementById(id);
         if(e.style.display == 'block')
            e.style.display = 'none';
         else
            e.style.display = 'block';
      }
    </script>

  </head>
  <body>
    <div class="wrapper">
