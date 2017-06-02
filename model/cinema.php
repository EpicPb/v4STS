<?php
  class Cinema {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $cinema_id;
    public $layout;
    public $cinemanum;

    public function __construct($cinema_id, $layout, $cinemanum) {
      $this->cinema_id      = $cinema_id;
      $this->layout         = $layout;
      $this->cinemanum      = $cinemanum;

    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM cinema');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $cinema) {
        $list[] = new Cinema($cinema['cinema_id'], $cinema['layout'], $cinema['cinemanum']);
      }

      return $list;
    }

    public static function find($cinema_id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $cinema_id = intval($cinema_id);
      $req = $db->prepare('SELECT * FROM cinema WHERE cinema_id = :cinema_id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('cinema_id' => $cinema_id));
      $cinema = $req->fetch();

      return new Cinema($cinema['cinema_id'], $cinema['layout'], $cinema['cinemanum']);
    }

    public static function add($layout, $cinemanum) {
          $layout = intval($layout);
          $cinemanum = intval($cinemanum);
          $db = Db::getInstance();
          $req = $db->query("INSERT INTO `cinema`(`layout`, `cinemanum`) VALUES ($layout,$cinemanum)");

    }
    public static function delete($cinemaid) {
          $cinemaid = intval($cinemaid);
          $db = Db::getInstance();
          $req = $db->query("DELETE FROM `cinema` WHERE cinema_id = $cinemaid");

    }
  }
?>
