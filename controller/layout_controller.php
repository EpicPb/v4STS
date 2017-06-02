
<?php
  class LayoutController {
    public function listlayouts() {
      // we store all the posts in a variable
      $layouts = Layout::all();
      require_once('view/admin/layout/listlayouts.php');
    }

    public function layoutdetails() {
      LayoutController::listlayouts();
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['cinema_id']))
        return call('admin', 'error');

      // we use the given id to get the right post
      $layout = Layout::find($_GET['cinema_id']);

      require_once('view/admin/layout/layoutdetails.php');
    }
    public function addlayout() {
      LayoutController::listlayouts();
      require_once('view/admin/layout/addlayout.php');;
    }

    public function layoutselector() {
      LayoutController::addlayout();
      $row = $_POST['row'];
      $column = $_POST['column'];
      $cinemaid = $_POST['cinemaid'];
      // Layout::add($row, $column, $cinemaid);
      require_once('view/admin/layout/layoutselector.php');
    }

    public function submitlayout() {
      $seats = $_POST['seats'];
      $cinemanum = $_POST['cinemaid'];
      Layout::add($seats,$cinemanum);
      LayoutController::listlayouts();
      // require_once('view/admin/layout/layout.php');
    }
    public function deletelayout() {
      $cinemaid = $_POST['id'];
      Layout::delete($cinemaid);
      require_once('view/admin/layout/success_deleted.php');
    }
  }
?>
