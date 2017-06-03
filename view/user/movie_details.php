<head>
  <link rel="stylesheet" href="view/admin/css/grid.css">
  <link rel="stylesheet" href="view/user/css/movie_details.css">
  <script type="text/javascript">
    function startTime() {
      var d = new Date();
      var h = d.getHours();
      var m = d.getMinutes();
      var s = d.getSeconds();
      document.getElementById("txt").innerHTML=h+":"+m+":"+":"+s;
      setTimeout('startTime()',1000);
    }
  </script>

</head>

<div class="column movie_col">
 <img class="movie_poster" src="<?php echo $movie->imagename;?>" alt="">
 <table>
   <tr>
     <td colspan="2"><p class="movietitle"><?php echo $movie->title; ?></p></td>
   </tr>
   <tr>
     <td><p class="details">Genre:</p></td>
     <td><p class="details"><?php echo $movie->genre; ?></p></td>
   </tr>
   <tr>
     <td> <p class="details">Director: </p></td>
     <td> <p class="details"><?php echo $movie->director; ?></p></td>
   </tr>
   <tr>
     <td><p class="details">Rating: </p></td>
     <td><p class="details"><?php echo $movie->rating; ?></p></td>
   </tr>
   <tr>
     <td> <p class="details">Length:</p></td>
     <td> <p class="details"><?php echo $movie->length_in_min; ?> minutes</p></td>
   </tr>
   <tr>
     <td><p class="details">Release Date:</p></td>
     <td><p class="details"><?php echo date_format(date_create($movie->release_date),'F j, Y');?></p></td>
   </tr>
   <tr>
     <td> <p class="details">Ticket Price:</p></td>
     <td> <p class="details"><?php echo $movie->price;?>php</p></td>
   </tr>
   <tr>
     <td><p class="details">Description: </p></td>
     <td><p class="details"> <?php echo $movie->description; ?></p></td>
   </tr>
 </table>
</div>
<div class="column schedule_col">
  <div class="">

    <?php
    $today = date("Y-m-d");
    if($schedules == null){
      echo "<div class='no_sched_avail'><p>There are no schedules available for this movie today.</p></div>";
    }
    foreach ($schedules as $value) {
      if($value->movie_id === $movie->movie_id){
        echo "<div class='column'>";
        echo "<a href='?controller=user&action=seats&cinema-id=". $value->cinema_id ."&schedule-id=".$value->schedule_id."'>";
        echo "<div class='time_box'>";
        echo "Cinema: $value->cinema_id <br>";
        echo date_format(date_create($value->starttime),'h:i A');
        echo "</div></a></div>";
      }

    }
     ?>
  </div>
</div>
<a href="?"><div class="backButton">
BACK
</div></a>



<!-- <div class="" style="color:white">

     <div class="mainContent">
       <div class="row">
         <div class="cute-12-laptop">
           <div class="cute-4-laptop">
             <div class="poster">
               <img src="<?php echo $movie->imagename;?>" alt="" height="440px">
             </div>
           </div>
           <div class="cute-8-laptop">
             <p class="movietitle"><?php echo $movie->title; ?></p>
             <p class="details">Genre: <?php echo $movie->genre; ?></p>
             <p class="details">Director: <?php echo $movie->director; ?></p>
             <p class="details">Rating: <?php echo $movie->rating; ?></p>
             <p class="details">Description: <?php echo $movie->description; ?></p>
             <p class="details">Length: <?php echo $movie->length_in_min; ?> minutes</p>
             <p class="details">Release Date: <?php

             echo date_format(date_create($movie->release_date),'F j, Y');
             ?></p>
             <p class="details">Ticket Price:<?php echo $movie->price;?>php</p>
           </div>

           <?php
           $today = date("Y-m-d");

           foreach ($schedules as $value) {
             if($value->datescheduled === $today){
               echo "Cinema: $value->cinema_id";
               echo "<br><a href='?controller=user&action=seats&cinema-id=". $value->cinema_id ."&schedule-id=".$value->schedule_id."'> $value->starttime </a>";
               echo "<br>";
             }

           }
            ?>
         </div>
       </div>
     </div>

</div>  -->
