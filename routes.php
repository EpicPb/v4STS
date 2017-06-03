<?php
  function call($controller, $action) {
    // require the file that matches the controller name
    require_once('controller/'. $controller .'_controller.php');


    // create a new instance of the needed controller
    switch($controller) {
      case 'admin':
        $controller = new AdminController();
      break;
      case 'movie':
        // we need the model to query the database later in the controller
        require_once('model/movie.php');
        $controller = new MovieController();
      break;
      case 'layout':
        // we need the model to query the database later in the controller
        require_once('model/layout.php');
        $controller = new LayoutController();
      break;
      case 'cinema':
        // we need the model to query the database later in the controller
        require_once('model/cinema.php');
        $controller = new CinemaController();
      break;
      case 'schedule':
        // we need the model to query the database later in the controller
        require_once('model/schedule.php');
        require_once('model/cinema.php');
        require_once('model/layout.php');
        require_once('model/movie.php');
        $controller = new ScheduleController();
      break;
      case 'user':
        require_once('model/schedule.php');
        require_once('model/cinema.php');
        require_once('model/layout.php');
        require_once('model/movie.php');
        require_once('model/ticket.php');
        $controller = new UserController();
      break;

    }

    // call the action
    $controller->{ $action }();
  }

  // just a list of the controllers we have and their actions
  // we consider those "allowed" values
  $controllers = array('admin' => ['home','error'],
                        'movie' => ['listmovies','moviedetails', 'addmovie','submitmovie','deletemovie'],
                        'layout' => ['listlayouts','layoutdetails','addlayout','layoutselector','submitlayout','deletelayout'],
                        'cinema' => ['listcinemas','cinemadetails','addcinema','submitcinema','deletecinema'],
                        'schedule' => ['listmenu','movie_schedule','movieschedule','',''],
                        'user' => ['home', 'movie_display', 'movie_details','seats','checkout','pay']);

  // check that the requested controller and action are both allowed
  // if someone tries to access something else he will be redirected to the error action of the pages controller
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('admin', 'error');
    }
  } else {
    call('admin', 'error');
  }
?>
