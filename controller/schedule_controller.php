
<?php
  class ScheduleController {
    public function listmenu()
    {
      require_once('view/admin/schedule/schedulemenu.php');
    }
    public function movie_schedule()
    {
      ScheduleController::listmenu();
      $movies = Movie::all();
      require_once('view/admin/schedule/listmovies_schedule.php');
    }
    public function movieschedule(){
      ScheduleController::movie_schedule();
      if (!isset($_GET['movie_id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      // $db = Db::getInstance();
      $movie = Movie::find($_GET['movie_id']);
      $schedules = Schedule::findmovie($_GET['movie_id']);
      require_once('view/admin/schedule/movieschedule_details.php');
    }
    
  }
?>
