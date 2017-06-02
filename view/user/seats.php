<head>
  <link rel="stylesheet" href="view/user/css/layoutstyle.css">
</head>
<div class="column detailcolumn layoutdetails"><center>
<br>
<form class="" action="?controller=user&action=checkout" method="post">


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
$a = "A";
$n = 1;
echo "<table>";
  echo "<div class='check-wrapper'>";
  for($x = 0; $x<sizeof($seats);$x++,$a++){
    echo "<tr>";
    for($y=1, $n=1; $y<=sizeof($seats[$x]);$y++,$n++){
      // if($x == 0 &&  $y==1){
      //   echo "<td><p>A</p></td></tr><tr>";
      // }
      if($seats[$x][$y]==0){
          echo "<td> <input type='checkbox' name='seats[".$x."][".$y."]' value='' disabled checked style='display:none'>";
          echo "<td>&nbsp;";
      }else if($seats[$x][$y]==1){
          echo "<td><div class='cbc'><input type='checkbox' name='seats[".$x."][".$y."]' value='' disabled checked><label for='seats[".$x."][".$y."]'><div class='che'></div></label></div>";
          echo "<td>";
      }else if ($seats[$x][$y]==2) {
          echo "<td> <input type='checkbox' name='seats[".$x."][".$y."]' value='' checked style='display:none'>";
          echo "<td><div id='container' class='cbc'><input type='checkbox' name='seats[".$x."][".$y."]' value='$a".$n."'><label for='seats[".$x."][".$y."]'><div class='che'><p class='rc'>".$a."$n</p></div></label></div>";
      }
    }
    $y = $y+1;
    echo "<td> <input type='checkbox' name='seats[".$x."][".$y."]' value='' style='display:none' checked>";
    echo "</tr>";
  }
  echo "</div>";
// echo "<input type='submit' value='submit'>";
echo "</table>";
echo "<input type='hidden' value='".$_GET['schedule-id']."' name='schedule-id'>";
 ?>

 <br>
   <input type="submit" name="" value="Proceed to Checkout">
 </form>
</center </div>
