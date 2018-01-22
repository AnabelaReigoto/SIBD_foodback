<?php
  include ('templates/head.php');

  $page_size = 2;

  if ( isset($_GET['search']) && !preg_match ("/^[a-zA-Z\s]+$/", $_GET['search'])) {
    $_SESSION['error_message'] = 'ERROR: Name can only contain letters and spaces';
  } else if (isset($_GET['search'])) {
    $searchText = getSearchText($_GET['search']);
  }

  include ('templates/header_homepage.php');

  include ('templates/content_filter.php');
  include ('templates/content_center.php');

  include ('templates/footer.php');
?>
