
<div class="" style="color:white">

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
             // date_create($movie->release_date);
             // date_format(date_create($movie->release_date),' l, F j, Y');
             echo date_format(date_create($movie->release_date),'F j, Y');
             // echo $movie->release_date; ?></p>
             <p class="details">Ticket Price:<?php echo $movie->price;?>php</p>
           </div>
           <!-- <div class="gettimeandschedule">
             <a href="?controller=user&action=timeschedule&movie_id=<?php echo $movie->movie_id;?>">Time and Schedule</a>
           </div> -->
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

</div>
