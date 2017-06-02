<div class="activenav" style="margin-top:0px; margin-left:150px;">

</div>
<div class="column listcolumn" style="width:300px;">
  <p>Here is a list of all movies:</p>

  <?php foreach($movies as $movie) { ?>



        <a href='?controller=schedule&action=movieschedule&movie_id=<?php echo $movie->movie_id;?>'>
          <div class="listitem">
            <p><?php echo $movie->title; ?></p>
            <p class="sub">Director: <?php echo $movie->director; ?></p>
            <p class="sub">Length: <?php echo $movie->length_in_min; ?></p>
          </div>
        </a>



  <?php } ?>

  <a href='?controller=movie&action=addmovie'>
    <div class='listitem'>Add movie</div>
  </a>

</div>
