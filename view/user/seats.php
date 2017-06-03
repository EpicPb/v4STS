<head>
  <link rel="stylesheet" href="view/user/css/layoutstyle.css">
  <link rel="stylesheet" href="view/admin/css/grid.css">
</head>
<script type="text/javascript">
  function goBack(){
    window.history.back();
  }
</script>
<div class="column detailcolumn layoutdetails bg"><center>
<br>
<div class="row">
  <div class="column offset">
    <div id='container' class="cbc sample"></div>
  </div>
  <div class="column">
    <p style="color:white">Available</p>
  </div>
  <div class="column">
    <div id='container' class="cbc sample red"></div>
  </div>
  <div class="column">
    <p style="color:white">Unavailable</p>
  </div>
  <div class="column">
    <div id='container' class="cbc sample green"></div>
  </div>
  <div class="column">
    <p style="color:white">Your Seats</p>
  </div>
</div>

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
          $an = $a."".$n;
          if(array_key_exists($an,$taken)){
          echo "<td> <input type='checkbox' name='seats[".$x."][".$y."]' value='' checked style='display:none'>";
          echo "<td><div id='container' class='cbc' style='background-color:red;'><input type='checkbox' name='seats[".$x."][".$y."]' value='$a".$n."' disabled><label for='seats[".$x."][".$y."]'><div class='che'><p class='rc'>".$a."$n</p></div></label></div>";
        }else{
          echo "<td> <input type='checkbox' name='seats[".$x."][".$y."]' value='' checked style='display:none'>";
          echo "<td><div id='container' class='cbc'><input type='checkbox' name='seats[".$x."][".$y."]' value='$a".$n."'><label for='seats[".$x."][".$y."]'><div class='che'><p class='rc'>".$a."$n</p></div></label></div>";
        }
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
   <input class='button_style' type="submit" name="" value="Proceed to Checkout">
 </form>
</center> </div>
<button onclick="goBack()"><div class="backButton">
BACK
</div></button>
