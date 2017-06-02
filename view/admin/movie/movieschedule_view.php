<link rel="stylesheet" href="view/admin/css/movieschedule_view.css">
<script type="text/javascript">
  $('.addtime').click(function(){
    var addtimeID = $(this).attr('id');
    addtimeID += "";

    var html= "<form action='javascript:getaddschedule_time()'";
    html +="  method='post'>Cinema Number: <input type='number' name='cinemanum' value='' min='0' required style='width:100px'><br><br>";
    html +="  Start time:  <input type='time' name='time' value='' required><br><br>";
    html +=" <input type='hidden' name='addtimeID' value='"+ addtimeID +"'>";
    html +="  <input type='submit' value='Submit'></form> ";

    $('#atf'+addtimeID).attr('class','addtimeform').hide().fadeIn();
    $('#atf'+addtimeID).html(html);
    // $('.exit').attr('style','z-index:3;').hide().fadeIn();

  })
  $('.adddate').click(function(){
     $('.adddateform').attr('style','visibility:visible;').fadeIn();
     $('.adddate').attr('style','background-image:none;').fadeIn();

  })

  function getaddschedule_time(){

    var cinemanum = document.getElementsByName('cinemanum')[0].value;
    var starttime = document.getElementsByName('time')[0].value;
    var movieid = document.getElementsByName('movieid')[0].value;
    var addtimeID = document.getElementsByName('addtimeID')[0].value;
    console.log(movieid +" hello movie id");
    $('.ajaxbox').load('view/admin/movie/addschedule_movie.php',{cinemanum: cinemanum, starttime:starttime, addtimeID:addtimeID,movieid:movieid},function(){}).hide().fadeIn(500);
    $('.addtimeform').fadeOut();
  }
  function getaddschedule_day(){

    var cinemanum = document.getElementsByName('cinemanum_day')[0].value;
    var starttime = document.getElementsByName('time_day')[0].value;
    var movieid = document.getElementsByName('movieid')[0].value;
    var addtimeID = document.getElementsByName('date_day')[0].value;
    console.log(movieid +" hello movie id");
    $('.ajaxbox').load('view/admin/movie/addschedule_movie.php',{cinemanum: cinemanum, starttime:starttime, addtimeID:addtimeID,movieid:movieid},function(){}).hide().fadeIn(500);
    $('.addtimeform').fadeOut();
  }


</script>


<?php
$movieid = $_POST['movieid'];
$conn = mysqli_connect('localhost','root','','test1');

$sql = "SELECT * FROM `schedule` WHERE fk_movie_id = '$movieid' ORDER BY datescheduled, starttime";
$result = mysqli_query($conn, $sql);
// echo $movieid;
echo "<input type='hidden' id='movieid' name='movieid' value='". $movieid ."'>";
$dayblockcount = 0;
if(mysqli_num_rows($result) > 0){
  $datecontrol = 0;
  echo "<div class ='layout-row firstrow'>";
  while ($row = mysqli_fetch_assoc($result)) {
      $date = date_create($row['datescheduled']);
      $dateclass = date_format($date,'Y-m-d');
      $datecompare = strtotime(date_format($date,'d-m-Y'));
      $todaycompare = strtotime(date('d-m-Y'));

      $date = date_format($date,' l, F j, Y');

      $starttime = date_format(date_create($row['starttime']), 'g:ia');
      $endtime = date_format(date_create($row['endtime']), 'g:ia');

      if($datecontrol === 0){ //only executes once
        $datecontrol = $date;
        date_dateheader($dateclass,$date,$todaycompare,$datecompare);
      }
      if($datecontrol  === $date){//executes until date changes
          cn_time_row($row['fk_cinema_id'],$starttime, $endtime);
      }else{//on date change add 1 to dateblockcount
        $datecontrol = $date;
        echo "</div></div>";
        $dayblockcount++;
      if($dayblockcount>2){
        echo "</div>";
        echo "<div class='layout-row'>";
        $dayblockcount=0;
      }
          date_dateheader($dateclass,$date,$todaycompare,$datecompare);
          cn_time_row($row['fk_cinema_id'],$starttime, $endtime);
      }
  }
        echo "</div></div>";
        if($dayblockcount===2){
          echo "</div>";
          echo "<div class='layout-row'>";
        }
}


    function cn_time_row($cID, $sT, $eT){
      echo "<div class='layout-row'>";
        echo "<div class='container drow cn'>".$cID ."</div>";
        echo "<div class='container drow time'>". $sT."-". $eT."</div>";
      echo "</div>";
    }
    function date_dateheader($dc,$d,$tC,$dCp){
      echo "<div class='posrelative'>";
      echo "<div class='container addtime' id='". $dc ."'>Add Time</div>";
      echo "<div class='' id='atf". $dc ."'></div>"; //atf = addtimeform
      if($tC > $dCp){
        echo "<div class='container date doneday' id='style-9'>";
      }else {
        echo "<div class='container date' id='style-9'>";
      }
      echo "<div class='container dateheader'>$d</div>";
      echo "<div class='layout-row'>";
      echo "<div class='container drow cn'>Cinema</div>";
      echo "<div class='container drow time'>Time</div>";
      echo "</div>";
    }
?>

  <div class="">
    <div class="container date adddate">
      <form class="adddateform" action="javascript:getaddschedule_day()" method="post" style="visibility:hidden">
        <div class="dateheader dh-1">
          Date: <input type="date" name="date_day" value=""><br>
        </div>
        <div class="layout-row">
          <div class="drow cn">  Cinema: </div>
          <div class="drow time">  Time: </div>
        </div>
        <div class="layout-row">
          <div class="drow cn"><input type="number" name="cinemanum_day" value="" style="width:70px;"></div>
          <div class="drow time"><input type="time" name="time_day" value=""></div>
        </div>
        <div class="dateheader dh-1">
          <input type="submit" name="" value="Submit"><br>
        </div>
      </form>

    </div>
  </div>
</div>




<!--

################## THE CODE ABOVE IS THE LOOPED DYNAMIC VERSION OF THIS CODE #####################

<div class="layout-row" >
  <div class="">

    <div class="container dateheader">May 17, 2017</div>

    <div class="container date"id="style-9">
      <div class="layout-row">
        <div class="container drow cn">Cinema Number</div>
        <div class="container drow time">Time</div>
      </div>
    </div>

    <div class="container addtime month-day-year">Add Time</div>

  </div>
</div> -->
