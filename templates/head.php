<!DOCTYPE html>
<html>
  <?php
    include ('config/init.php');
    include ('database/users.php');
    include ('database/data_establishment.php');
    include ("database/data_comment.php");
    include ("database/data_rating.php");
    include ('database/data_search.php');
  ?>
  <head>
    <title>foodback</title>
    <link rel="stylesheet"
    <? if (strpos($_SERVER['REQUEST_URI'],'establishment.php') !== false || strpos($_SERVER['REQUEST_URI'],'user_feed.php') !== false) { ?>
      href="css/estab__userFeed.css"
    <? } if (strpos($_SERVER['REQUEST_URI'],'user_def.php') !== false || strpos($_SERVER['REQUEST_URI'],'estab_edit.php') !== false || strpos($_SERVER['REQUEST_URI'],'estab_new.php') !== false) { ?>
      href="css/edit_new_def.css"
    <? } else { ?>
      href="css/homepage.css"
    <? } ?>
    >

    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8" >

    <script src="javascript/script.js"></script>

  </head>
  <body>
    <div class="wrapper">
