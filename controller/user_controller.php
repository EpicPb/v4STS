<?php
/**
 *
 */
class UserController
{

  function home()
  {
    UserController::movie_display();
  }
  function movie_display()
  {
    $movies = Movie::all();
    require_once('view/user/movie_display.php');
  }
  function movie_details()
  {
    if (!isset($_GET['movie_id']))
      return call('pages', 'error');

    $schedules = Schedule::findmovie($_GET['movie_id']);
    $movie = Movie::find($_GET['movie_id']);
    require_once('view/user/movie_details.php');
  }
  function timeschedule()
  {
    if (!isset($_GET['movie_id']))
      return call('pages', 'error');

    $movie = Movie::find($_GET['movie_id']);
    $schedules = Schedule::findmovie($_GET['movie_id']);
    require_once('view/user/movie_schedule.php');
  }
  function seats()
  {
    if (!isset($_GET['cinema-id']) || !isset($_GET['schedule-id']))
      return call('pages', 'error');


    // $schedule = Schedule::find($_GET['schedule_id']);
    $layout = Layout::find($_GET['cinema-id']);
    // $schedule = Schedule::find(intval($_GET['schedule-id']));
    require_once('view/user/seats.php');
  }
  function checkout()
  {
      $schedule = Schedule::find(intval($_POST['schedule-id']));
      $movie = Movie::find($schedule->movie_id);
      require_once('view/user/checkout.php');
  }
}

 ?>
