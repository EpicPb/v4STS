
  <center>
      <?php
      $conn=mysqli_connect("localhost","root","","test1");
      $db = mysqli_select_db($conn,"test1");

      $sql = "SELECT * FROM movie";
      $result = mysqli_query($conn, $sql);
      $today = date("Y-m-d");

      $count = 0;

      while($row = mysqli_fetch_array($result)){
        if($count == 0){
          echo "<div class='mainContent'><div class='row'>";
        }
        // echo "<br>";
        // echo $row['movie_id'] . " ";
        foreach ($schedules as $value) {

                if($row['movie_id'] == $value->movie_id){
                  // echo $value->movie_id . " " . $value->datescheduled;
                // echo $row['movie_id'] . " " . $row['title'] . " " . $value->datescheduled ." $today<br>";
                //     echo date('d F Y h:i:s A');

                  // if($value->datescheduled === $today){

                    echo "<div class='cute-3-laptop'>";
                    // echo "<div class='poster ". $row['movie_id']."'><img src='" . $row['imagename'] . "' height=340px></div>";
                    echo "<a href='?controller=user&action=movie_details&movie_id=".$row['movie_id']."' class='poster ". $row['movie_id']."'><img class='posterimg' src='" . $row['imagename'] . "'></a>";

                    echo "<br><br><p class='movietitle'>" . $row['title'] . "</p>";
                    // echo "<form id='target". $row['movie_id']."' action='javascript:getmoviedetails(". $row['movie_id'].")'></form>";

                    echo "</div>";
                    $count++;
                    if($count == 5){
                      echo "</div></div>";
                      $count = 0 ;
                    }
                  // }
              }
        }



      }

       ?>
  </center>
