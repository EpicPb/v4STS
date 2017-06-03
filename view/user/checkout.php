<head>
  <link rel="stylesheet" href="view/admin/css/moviedetails.css">
  <link rel="stylesheet" href="view/admin/css/grid.css">
</head>
<style media="screen">
  .movieheader{
    background-color: rgba(125, 125, 125, 0.21);
  }
  .movietitle{
    color: white;
  }
</style>
<div class="movieheader ">
  <div class="column column-offset-4">
      <img src="<?php echo $movie->imagename; ?>" alt="" height="200px;">
  </div>
  <div class="column detailcol">
    <table>
      <tr>
        <td colspan="2"><p class="movietitle"><?php echo $movie->title; ?></p></td>
      </tr>
      <tr>
        <td><p class="details">Genre:</p></td>
        <td><p class="details"><?php echo $movie->genre; ?></p></td>
      </tr>
      <tr>
        <td><p class="details">Director:</p></td>
        <td><p class="details"><?php echo $movie->director; ?></p></td>
      </tr>
      <tr>
        <td><p class="details">Rating:</p></td>
        <td><p class="details"> <?php echo $movie->rating; ?></p></td>
      </tr>
      <tr>
        <td><p class="details">Description:</p></td>
        <td><p class="details"> <?php echo $movie->description; ?></p></td>
      </tr>
      <tr>
        <td><p class="details">Length:</p></td>
        <td><p class="details"> <?php echo $movie->length_in_min; ?> minutes</p></td>
      </tr>
      <tr>
        <td><p class="details">Release Date:</p></td>
        <td><p class="details"> <?php echo date_format(date_create($movie->release_date),'F j, Y'); ?></p>
      </tr>
        <td><p class="details">Ticket Price: </p></td>
        <td><p class="details"><?php echo $movie->price;?>php</p></td>
    </tr>
    </table>
  </div>
</div>
<div class="row column column-offset-5">
  <table style="width=400px; border 1px solid black;">
  <?php
  echo "<form action='?controller=user&action=pay' method='post'";
  $seats = $_POST['seats'];
  $total = 0;
  $seatcount = 0;
  foreach ($seats as $value) {
    foreach ($value as $value2) {
      if($value2 != null){
      $seatcount++;
      echo "<p></p>";
      echo "<p style='color:white;'>$value2</p>";
      echo "<p style='color:white;'>$movie->price php</p>";
      echo "<input type='hidden' name='seatnum[$seatcount]' value='$value2'>";
      $total += $movie->price;
    }
  }
}
echo "<input type='hidden' name='schedule-id' value='".$_POST['schedule-id']."'>";
echo "<input type='hidden' name='total' value='$total'>";
echo "<input type='submit' value='Proceed'>";
echo "</form>";
   ?>

</div>


</table>
