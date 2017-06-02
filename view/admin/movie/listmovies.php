<div class="activenav" style="margin-top:38.5px;">

</div>
<div class="column listcolumn">
  <p>Here is a list of all movies:</p>

  <?php foreach($movies as $movie) { ?>



        <a href='?controller=movie&action=moviedetails&movie_id=<?php echo $movie->movie_id; ?>'>
          <div class="listitem movienum<?php echo $movie->movie_id; ?>">
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
