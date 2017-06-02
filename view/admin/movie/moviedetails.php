<head>
  <link rel="stylesheet" href="view/admin/css/moviedetails.css">
</head>
<script type="text/javascript">
  function getschedule(data){
    $(".ajaxbox").load('view/admin/movie/movieschedule_view.php',{movieid:data},function(){}).hide().fadeIn();
  }
</script>

<div class="column detailcolumn moviedetails">
  <div class="movieheader ">
    <div class="column ">
        <img src="<?php echo $movie->imagename; ?>" alt="" height="200px;">
    </div>
    <div class="column detailcol">
      <p class="movietitle"><?php echo $movie->title; ?></p>
      <p class="details">Genre: <?php echo $movie->genre; ?></p>
      <p class="details">Director: <?php echo $movie->director; ?></p>
      <p class="details">Rating: <?php echo $movie->rating; ?></p>
      <p class="details">Description: <?php echo $movie->description; ?></p>
      <p class="details">Length: <?php echo $movie->length_in_min; ?> minutes</p>
      <p class="details">Release Date: <?php
      // date_create($movie->release_date);
      // date_format(date_create($movie->release_date),' l, F j, Y');
      echo date_format(date_create($movie->release_date),'F j, Y');
      // echo $movie->release_date; ?></p>
      <p class="details">Ticket Price: <?php echo $movie->price;?>php</p>
    </div>
  </div>
  <div class="buttonrow">
    <a class="moviebuttons" href="#" >
        Update Movie
    </a>
    <a class="moviebuttons" href="#" onclick="javascript:getschedule(<?php echo $movie->movie_id;?>);">
        See Schedule
    </a>
    <a class="moviebuttons delete" href="#">
        Delete Movie
    </a>
  </div>
  <div class="ajaxbox layout-column">

  </div>

</div>
