<div class="activenav" style="margin-top:77px;">

</div>
<div class="column listcolumn">
  <p>Here is a list of all cinemas:</p>

  <?php foreach($cinemas as $cinema) { ?>



        <a href='?controller=cinema&action=cinemadetails&cinema_id=<?php echo $cinema->cinema_id; ?>'>
          <div class="listitem">Cinema Number <?php echo $cinema->cinemanum; ?></div>
        </a>



  <?php } ?>

  <a href='?controller=cinema&action=addcinema'>
    <div class='listitem'>Add cinema</div>
  </a>
</div>
