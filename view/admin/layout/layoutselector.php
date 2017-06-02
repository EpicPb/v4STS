<div class="">
  <!-- <head>
    <script src="view/admin/js/checkbox.js" charset="utf-8"></script>
  </head> -->
<script type="text/javascript">


</script>



<center class="highlight-area">
  Click + Drag <br>
  Shift + Click + Drag <br>
  to multi-select and deselect
  <br><br><br>

    <?php
    $conn1=mysqli_connect("localhost","root","","test1");


    $columns = $_POST['column'];
    $rows = $_POST['row'];
    $cinemaID = $_POST['cinemaid'];

    $sql1 = "SELECT cinema_id FROM layout where cinema_id='$cinemaID'";
    $result = mysqli_query($conn1, $sql1);
    if(mysqli_num_rows($result) != null){
      // echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
      echo "Error: Cinema ID already exists";
      // echo "<form action='index.php' method='post'>";
      // echo "<input type='submit' value='BACK'>";
      // echo "</form>";

    } else {

    echo "<form action='?controller=layout&action=submitlayout' method='post'>";
      echo "<div class='check-wrapper'><table>";
    for($x = 0; $x<$rows;$x++){
      echo "<tr>";
      for($y = 1; $y<=$columns;$y++){
        echo "<td> <input type='checkbox' name='seats[".$x."][".$y."]' value='0' checked style='display:none'>";
        echo "<td> <div id='container' class='cbc'><input type='checkbox' name='seats[".$x."][".$y."]' value='2'><label for='seats[".$x."][".$y."]'><div class='che'></div></label></div>";
      }
        $y = $y+1;
        echo "<td><input type='checkbox' name='seats[".$x."][".$y."]' value='3' style='display:none' checked>";
      echo "</tr>";
    }
      echo "</table></div>";
    echo "<input type='number' name='columns' value='$columns' style='display:none'>";
    echo "<input type='number' name='rows' value='$rows' style='display:none'>";
    echo "<input type='number' name='cinemaid' value='$cinemaID' style='display:none'>";

    echo "<br><br><input type='submit' name='submit' value='submit'></form>";

  }

    ?>

</center>
</div>
