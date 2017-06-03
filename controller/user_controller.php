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
    $schedules = Schedule::all_grp_movie();
    $movies = Movie::all();
    require_once('view/user/movie_display.php');
  }
  function movie_details()
  {
    if (!isset($_GET['movie_id']))
      return call('pages', 'error');

    $schedules = Schedule::findmovie_today($_GET['movie_id']);
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

    $taken = [];
    $count =0;
    // $schedule = Schedule::find($_GET['schedule_id']);
    $tickets = Ticket::all_sched($_GET['schedule-id']);
    $layout = Layout::find($_GET['cinema-id']);
    foreach ($tickets as $row) {
      foreach ($row as $key => $value) {
        if($key==='fk_seat_id'){
          $taken[$value] = $count;
          $count++;
        }
      }
    }


    // $schedule = Schedule::find(intval($_GET['schedule-id']));
    require_once('view/user/seats.php');
  }
  function checkout()
  {
      $schedule = Schedule::find(intval($_POST['schedule-id']));
      $movie = Movie::find($schedule->movie_id);
      require_once('view/user/checkout.php');
  }
  function pay(){
    $seatnum = $_POST['seatnum'];
    $total = $_POST['total'];
    foreach ($seatnum as $key => $value) {
    echo "$key = $value <br>";
    Ticket::add($_POST['schedule-id'],$value);
    }
    echo $total;
    echo "<p style='color:white'>Thank you for buying tickets. Your total is: $total</p>";
    echo "<a href='?'>Home</a>";





  }

}

 ?>
