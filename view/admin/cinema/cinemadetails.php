<div class="column detailcolumn">
  <p>This is the requested Cinema:</p>

  <p>Cinema id: <?php echo $cinema->cinema_id; ?></p>
  <p>Layout: <?php echo $cinema->layout; ?></p>
  <p>Cinema Number: <?php echo $cinema->cinemanum; ?></p>

  <br>
  <form class="" action="?controller=cinema&action=deletecinema" method="post">
    <input type="hidden" name='id' value="<?php echo $_GET['cinema_id']; ?>"/>
    <input type="submit" name="" value="Delete Cinema">
  </form>

</div>
