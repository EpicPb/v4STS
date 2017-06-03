<?php
  class Ticket {
    public $ticket_id;
    public $fk_schedule_id;
    public $fk_seat_id;

    public function __construct($ticket_id, $fk_schedule_id, $fk_seat_id) {
      $this->ticket_id       = $ticket_id;
      $this->fk_schedule_id  = $fk_schedule_id;
      $this->fk_seat_id      = $fk_seat_id;

    }
    public function Ticket($fk_seat_id) {
      $this->fk_seat_id      = $fk_seat_id;

    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM ticket');

      foreach($req->fetchAll() as $ticket) {
        $list[] = new Ticket($ticket['ticket_id'], $ticket['fk_schedule_id'], $ticket['fk_seat_id']);
      }

      return $list;
    }
    public static function all_sched($schedule_id) {
      $list = [];
      $db = Db::getInstance();
      $req = $db->prepare("SELECT * FROM `ticket` WHERE fk_schedule_id = :schedule_id");
      $req->execute(array('schedule_id' => $schedule_id));
      foreach($req->fetchAll() as $ticket) {
        $list[] = new Ticket($ticket['ticket_id'], $ticket['fk_schedule_id'], $ticket['fk_seat_id']);
      }

      return $list;
    }

    public static function find($ticket_id)
    {
      $db = Db::getInstance();

      $movie_id = intval($ticket_id);
      $req = $db->prepare('SELECT * FROM ticket WHERE ticket_id = :ticket_id');

      $req->execute(array('ticket_id' => $ticket_id));
      $ticket = $req->fetch();

      return new Ticket($ticket['$ticket_id'], $ticket['$fk_schedule_id'], $ticket['$fk_seat_id']);
    }
    public static function add($fk_schedule_id, $fk_seat_id)
    {
      $db = Db::getInstance();
      $req = $db->query("INSERT INTO `ticket`(`fk_schedule_id`, `fk_seat_id`)
                        VALUES ('$fk_schedule_id', '$fk_seat_id')");
    }

  }
?>
