<div class="column detailcolumn layoutdetails"><center>
<p>This is the requested layout:</p>

<!-- <p><?php echo $layout->cinema_id; ?></p>
<p><?php echo $layout->columns; ?></p>
<p><?php echo $layout->rows; ?></p>
<p><?php echo $layout->value; ?></p> -->

<?php
$seats = [];
foreach ($layout as $row) {

    $columnNum= $row -> columns;
    $rowsNum= $row -> rows;
    $value= $row -> value;
    $seats[$columnNum][$rowsNum] = $value;

}




$y=1;
$x = 0;
echo "<table>";
  echo "<div class='check-wrapper'>";
  for($x = 0; $x<sizeof($seats);$x++){
    echo "<tr>";
    for($y=1; $y<=sizeof($seats[$x]);$y++){
      if($seats[$x][$y]==0){
          echo "<td> <input type='checkbox' name='seats[".$x."][".$y."]' value='0' disabled checked style='display:none'>";
          echo "<td>&nbsp;";
      }else if($seats[$x][$y]==1){
          echo "<td> <div class='cbc'><input type='checkbox' name='seats[".$x."][".$y."]' value='1' disabled checked><label for='seats[".$x."][".$y."]'><div class='che'></div></label></div>";
          echo "<td>";
      }else if ($seats[$x][$y]==2) {
          echo "<td> <input type='checkbox' name='seats[".$x."][".$y."]' value='2' checked style='display:none'>";
          echo "<td> <div id='container' class='cbc'><input type='checkbox' name='seats[".$x."][".$y."]' value='5'><label for='seats[".$x."][".$y."]'><div class='che'></div></label></div>";
      }
    }
    $y = $y+1;
    echo "<td> <input type='checkbox' name='seats[".$x."][".$y."]' value='3' style='display:none' checked>";
    echo "</tr>";
  }
  echo "</div>";
// echo "<input type='submit' value='submit'>";
echo "</table>";

 ?>

 <br>
 <form class="" action="?controller=layout&action=deletelayout" method="post">
   <input type="hidden" name='id' value="<?php echo $_GET['cinema_id']; ?>"/>
   <input type="submit" name="" value="Delete Layout">
 </form>
</center </div>
