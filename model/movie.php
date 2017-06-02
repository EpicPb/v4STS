<?php
  class Movie {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $movie_id;
    public $title;
    public $genre;
    public $director;
    public $rating;
    public $imagename;
    public $description;
    public $length_in_min;
    public $release_date;
    public $price;

    public function __construct($movie_id, $title, $genre, $director, $rating, $imagename, $description, $length_in_min, $release_date, $price) {
      $this->movie_id       = $movie_id;
      $this->title          = $title;
      $this->genre          = $genre;
      $this->director       = $director;
      $this->rating         = $rating;
      $this->imagename      = $imagename;
      $this->description    = $description;
      $this->length_in_min  = $length_in_min;
      $this->release_date   = $release_date;
      $this->price          = $price;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM movie');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $movie) {
        $list[] = new Movie($movie['movie_id'], $movie['title'], $movie['genre'],
         $movie['director'], $movie['rating'], $movie['imagename'], $movie['description'], $movie['length_in_min'],$movie['release_date'], $movie['price']);
      }

      return $list;
    }

    public static function find($movie_id)
    {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $movie_id = intval($movie_id);
      $req = $db->prepare('SELECT * FROM movie WHERE movie_id = :movie_id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('movie_id' => $movie_id));
      $movie = $req->fetch();

      return new Movie($movie['movie_id'], $movie['title'], $movie['genre'],
       $movie['director'], $movie['rating'], $movie['imagename'], $movie['description'], $movie['length_in_min'],$movie['release_date'],$movie['price']);
    }
    public static function add($title, $genre, $director, $rating, $target_file, $description, $length_in_min, $release_date, $price)
    {
      $mysqli = new mysqli('localhost','root','','test1');
      $title = mysqli_real_escape_string($mysqli,$title);
      $genre = mysqli_real_escape_string($mysqli,$genre);
      $director = mysqli_real_escape_string($mysqli,$director);
      $target_file = mysqli_real_escape_string($mysqli,$target_file);
      $description = mysqli_real_escape_string($mysqli,$description);



      $length_in_min = intval($length_in_min);
      $db = Db::getInstance();
      $req = $db->query("INSERT INTO `movie`(`title`, `genre`, `director`, `rating`, `imagename`, `description`, `length_in_min`, `release_date`,`price` )
                        VALUES ('$title', '$genre', '$director', '$rating', '$target_file', '$description', '$length_in_min', '$release_date', '$price')");
    }

  }
?>
