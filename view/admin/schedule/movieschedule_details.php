<head>
  <link rel="stylesheet" href="view/admin/css/moviedetails.css">
  <style media="screen">
    .container{
      width: 100%;
      height: 500px;
      background-color: rgb(235, 235, 235);
      overflow-x: auto;
      display: flex;
    }
    .date{
      width: 100px;
      height: 30px;
      background-color: pink;
      margin-right: 2px;

    }
    table, td, th {
      border: 1px solid rgb(171, 171, 171);
      border-top: none;
      border-right: none;
      font-size: 14px;
    }
    table {
    border-collapse: collapse;
    width: 100%;
    border-bottom: 1.5px solid rgb(101, 101, 101);
    border-left: 1.5px solid rgb(101, 101, 101);
    border-top: none;
    border-right: none;
    }
    td{
      min-width: 60px;
      height: 40px;
      text-align: center;
    }
    .time{

    }
    .timechart{
      /*margin-left: 100px;*/
      margin-top: 50px;
    }
    .datechart{
      width: 10%;
      margin-top: 50px;
    }
    .colored{
      height: 40px;
      width: 60px;
      background-color:rgba(102, 165, 251,0.5);
      /*border: 1.5px solid rgba(102, 165, 251, 1);*/
      /*margin-left: 50%;*/

    }
    .timeline{
      border-top: 1.5px solid rgb(101, 101, 101);
      text-align: left;
    }


  </style>
</head>
<div class="column detailcolumn moviedetails">
  <div class="movieheader ">
    <div class="column ">
        <img src="<?php echo $movie->imagename; ?>" alt="" height="200px;">
    </div>
    <div class="column">
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
    </div>
  </div>
  <div class="container">
    <?php
    $size = sizeof($schedules);
    $time = 8;
    $ampm = "AM";
    $dates = [];
    $times = [];
    $endtimes = [];
    foreach ($schedules as $value) {
      foreach ($value as $key => $value1) {
        // echo $key . "<br>". $value1 ."<br>";
        if($key==="datescheduled"){
          $dates[] = $value1;
        }
        if($key==="starttime"){
          $times[] = $value1;
        }
        if($key==="endtime"){
          $endtimes[] = $value1;
        }
      }

    }

    echo "<table class='datechart'>";
    for ($i=0; $i <= $size-1; $i++) {
      echo "<tr>";
      echo "<td>". date_format(date_create($dates[$i]),' l, F j, Y')."</td>";
      echo "</tr>";
    }
    echo "</table>";

    // echo "<table class='datechart'>";
    // for ($i=0; $i <= $size-1; $i++) {
    //   echo "<tr>";
    //   echo "<td style='min-width:150px'>". $times[$i]."-".$endtimes[$i]."</td>";
    //   echo "</tr>";
    // }
    // echo "</table>";



    echo "<table class='timechart'>";
    for ($i=0; $i <= $size; $i++) {
      echo "<tr>";
      if($i==$size){
        for ($j=0; $j < 17; $j++) {

          if ($time==13) {
            $time = 1;
          }
          echo "<td class='time timeline'>$time:00 $ampm</td>";
          $time++;
          if($time == 12){
            if($ampm == "AM"){
              $ampm = "PM";
            }else {
              $ampm = "AM";
            }
          }
        }

      }else {
        for ($j=0; $j < 17; $j++) {
          if ($time==13) {
            $time = 1;
          }
          if(date_format(date_create($times[$i]),'g:A') == $time.":".$ampm || date_format(date_create($endtimes[$i]),'g:A') == $time.":".$ampm){
            echo "<td class='time $time:00$ampm ". date_format(date_create($dates[$i]),'m-j-Y') ."'><div class='colored'></div></td>";
          }else {
            echo "<td class='time $time:00$ampm ". date_format(date_create($dates[$i]),'m-j-Y') ."'>"."</td>";
          }


          $time++;
          if($time == 12){
            if($ampm == "AM"){
              $ampm = "PM";
            }else {
              $ampm = "AM";
            }
          }
            // echo "<td></td>";

        }
      }
      $time = 8;
      echo "</tr>";
    }
    echo "</table>";

     ?>
  </div>
</div>
