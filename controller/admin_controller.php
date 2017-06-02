<?php
/**
 *
 */
class AdminController
{
  public function home() {
        // $first_name = 'Jon';
        // $last_name  = 'Snow';
        require_once('view/admin/home.php');
      }
      public function movie() {
        require_once('view/admin/movie.php');
      }
      public function cinema() {
        require_once('view/admin/cinema.php');
      }
      public function layout() {
        require_once('view/admin/layout.php');
      }
      public function schedule() {
        require_once('view/admin/schedule.php');
      }

      public function error() {
        require_once('view/admin/error.php');
      }
}
 ?>
