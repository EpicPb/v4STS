<head>
  <script src="jquery-3.2.0.min.js" charset="utf-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js" charset="utf-8"></script>
  <!-- <script src="view/admin/js/checkbox.js" charset="utf-8"></script> -->

</head>
<?php
  require_once('controller/connect.php');


  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'admin';
    $action     = 'home';
  }

  require_once('view/admin/home.php');
?>
