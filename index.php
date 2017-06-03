<head>
  <script src="jquery-3.2.0.min.js" charset="utf-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js" charset="utf-8"></script>
  <script src="view/admin/js/checkbox.js" charset="utf-8"></script>

</head>
<!-- <script type="text/javascript">
    setTimeout(function () {
     window.location.href= 'index.php'; // the redirect goes here

   },5 * 60 * 1000); // 300 seconds
</script> -->
<style media="screen">
    .backButton{
      position: fixed;
      bottom: 20px;
      right: 20px;
      border: 2px solid #555555;
      background-color: rgb(80, 80, 80);
      color: white;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
      cursor: pointer;
    }
    .backButton:hover{
      background-color:  rgba(80, 80, 80, .5);
    }
</style>
<?php
  require_once('controller/connect.php');

  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'user';
    $action     = 'home';
  }

  require_once('view/user/home.php');

  // header( "refresh:300000;url=index.php" );
?>
