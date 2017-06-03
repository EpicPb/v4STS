<?php
  class Schedule {
    public $schedule_id;
    public $movie_id;
    public $cinema_id;
    public $datescheduled;
    public $starttime;
    public $endtime;

    public function __construct($schedule_id, $movie_id, $cinema_id, $datescheduled, $starttime, $endtime) {
      $this->schedule_id    = $schedule_id;
      $this->movie_id       = $movie_id;
      $this->cinema_id      = $cinema_id;
      $this->datescheduled  = $datescheduled;
      $this->starttime      = $starttime;
      $this->endtime        = $endtime;


    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM schedule');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $schedule) {
        $list[] = new Schedule($schedule['schedule_id'],$schedule['fk_movie_id'],$schedule['fk_cinema_id'],$schedule['datescheduled'],$schedule['starttime'],$schedule['endtime']);
      }

      return $list;
    }

    public static function all_grp_movie() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM (SELECT * FROM schedule WHERE datescheduled = DATE(NOW()))AS sub GROUP BY fk_movie_id' );

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $schedule) {
        $list[] = new Schedule($schedule['schedule_id'],$schedule['fk_movie_id'],$schedule['fk_cinema_id'],$schedule['datescheduled'],$schedule['starttime'],$schedule['endtime']);
      }

      return $list;
    }

    public static function find($schedule_id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $schedule_id = intval($schedule_id);
      $req = $db->prepare('SELECT * FROM schedule WHERE schedule_id = :schedule_id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('schedule_id' => $schedule_id));
      $schedule = $req->fetch();

      return new Schedule($schedule['schedule_id'],$schedule['fk_movie_id'],$schedule['fk_cinema_id'],$schedule['datescheduled'],$schedule['starttime'],$schedule['endtime']);
    }
    public static function findmovie($movie_id) {
      $list = [];
      $db = Db::getInstance();
      // we make sure $id is an integer
      $movie_id = intval($movie_id);
      $req = $db->prepare('SELECT * FROM schedule WHERE fk_movie_id = :fk_movie_id ORDER BY fk_cinema_id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('fk_movie_id' => $movie_id));

      // $schedule = $req->fetch();

      foreach($req->fetchAll() as $schedule) {
        $list[] = new Schedule($schedule['schedule_id'],$schedule['fk_movie_id'],$schedule['fk_cinema_id'],$schedule['datescheduled'],$schedule['starttime'],$schedule['endtime']);
      }
      return $list;
    }

    public static function add() {


    }
    public static function delete() {


    }
  }
?>
