<?php
  class Layout {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $cinema_id;
    public $rows;
    public $columns;
    public $value;


    public function __construct($cinema_id, $rows, $columns, $value) {
      $this->cinema_id      = $cinema_id;
      $this->rows           = $rows;
      $this->columns        = $columns;
      $this->value          = $value;

    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM layout GROUP BY cinema_id');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $layout) {
        $list[] = new Layout($layout['cinema_id'], $layout['rows'], $layout['columns'], $layout['value']);
      }

      return $list;
    }

    public static function find($cinema_id) {
      $list = [];

      $db = Db::getInstance();
      // we make sure $id is an integer
      $cinema_id = intval($cinema_id);
      $req = $db->prepare('SELECT * FROM layout WHERE cinema_id = :cinema_id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('cinema_id' => $cinema_id));
      // $layout = $req->fetchAll();
      foreach($req->fetchAll() as $layout) {
        $list[] = new Layout($layout['cinema_id'], $layout['rows'], $layout['columns'], $layout['value']);
      }

      return $list;
    }
    public static function add($seats,$cinemaID){
      $db = Db::getInstance();

      $counterX =0;
      $counterY =1;
      $a = "A";

      foreach ($seats as $value) {
        foreach ($value as $value2) {

            $seats[$counterX][$counterY] = $value2;
            $seatnum = $a."".$counterY;

            $req = $db->query("INSERT INTO layout (cinema_id, columns, rows, seatnum, value) VALUES ('$cinemaID','$counterX','$counterY', '$seatnum','$value2')");

            $counterY = $counterY +1;
        }
        $a++;
        $counterX = $counterX +1;
        $counterY = 1;
        echo "<br>";
      }
    }

    public static function delete($cinemaid){
      $cinemaid = intval($cinemaid);
      echo $cinemaid;
      $db = Db::getInstance();
      $req = $db->query("DELETE FROM `layout` WHERE cinema_id = $cinemaid");

    }
  }
?>
