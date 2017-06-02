<script type="text/javascript">
    function getmovieschedule(movieid) {
      $('.ajaxbox').load('../schedule/movieschedule_view.php',{movieid: movieid},function(){}).hide().fadeIn();
    }
</script>
<?php
$movieid = $_POST['movieid'];
$addtimeID = $_POST['addtimeID'];
$starttime =  $_POST['starttime'];
$cinemanum = $_POST['cinemanum'];

$conn = mysqli_connect('localhost','root','','test1');

$sql ="SELECT * FROM movie WHERE movie_id ='$movieid'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
$endtime = strtotime("+". $row['length_in_min'] ." minutes", strtotime($starttime));
$endtime = date('H:i:s', $endtime);

$datereleased = $row['release_date'];
}

$var1 = date_create($datereleased);
$var2 = date_create($addtimeID);
if($var1 > $var2){
  echo "Error: Cannot schedule because date input is before the movie release date ";
}else{


$sql = "INSERT INTO `schedule`(`fk_movie_id`, `fk_cinema_id`, `datescheduled`, `starttime`, `endtime`)
  VALUES ('$movieid','$cinemanum','$addtimeID','$starttime','$endtime')";
  if (mysqli_query($conn, $sql)) {
    echo "successfully updated schedule<br>";
      echo "<a href='?controller=movie&action=moviedetails&movie_id=$movieid'>Go Back</a>";

  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}


?>
