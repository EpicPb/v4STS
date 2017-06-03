
<?php
  class MovieController {
    public function listmovies() {
      // we store all the posts in a variable
      $movies = Movie::all();
      require_once('view/admin/movie/listmovies.php');
    }

    public function moviedetails() {
      MovieController::listmovies();
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['movie_id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $movie = Movie::find($_GET['movie_id']);
      require_once('view/admin/movie/moviedetails.php');
    }
    public function addmovie()
    {
      MovieController::listmovies();
      require_once('view/admin/movie/addmovie.php');
    }
    public function submitmovie()
    {
      $title         = $_POST['title'];
      $genre         = $_POST['genre'];
      $director      = $_POST['director'];
      $rating        = $_POST['rating'];

      $description   = $_POST['description'];
      $length_in_min = $_POST['length_in_min'];
      $release_date  = $_POST['release_date'];

      $price = $_POST['price'];

      require_once('controller/file_upload.php');
      if($uploadOk == 1){
        Movie::add($title, $genre, $director, $rating, $target_file, $description, $length_in_min, $release_date, $price);
        MovieController::listmovies();
      }else {
        require_once('view/admin/error.php');
      }

    }
    public function deletemovie(){
      MovieController::listmovies();
      if (!isset($_GET['movie_id']))
        return call('pages', 'error');

      Movie::delete($_GET['movie_id']);
    }
  }
?>
