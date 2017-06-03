
<?php
  class CinemaController {
    public function listcinemas() {
      // we store all the posts in a variable
      $cinemas = Cinema::all();
      require_once('view/admin/cinema/listcinemas.php');
    }

    public function cinemadetails() {
      CinemaController::listcinemas();
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['cinema_id']))
        return call('admin', 'error');

      // we use the given id to get the right post
      $cinema = Cinema::find($_GET['cinema_id']);

      require_once('view/admin/cinema/cinemadetails.php');
    }
    public function addcinema()
    {
      CinemaController::listcinemas();
      require_once('model/layout.php');
      $layouts = Layout::all();
      require_once('view/admin/cinema/addcinema.php');
    }
    public function submitcinema()
    {
      $cinemanum = $_POST['cinemanum'];
      $layout = $_POST['layout'];
      Cinema::add($layout, $cinemanum);
      require_once('view/admin/cinema/success_added.php');
    }
    public function deletecinema() {
      $cinemaid = $_POST['id'];
      Cinema::delete($cinemaid);
      require_once('view/admin/cinema/success_deleted.php');
    }
  }
?>
