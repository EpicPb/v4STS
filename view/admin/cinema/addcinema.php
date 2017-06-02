<form class="" action="?controller=cinema&action=submitcinema" method="post">
  Cinema Number: <input type="number" name="cinemanum" value="">
  Layout Number: <select class="" name="layout">
    <?php foreach ($layouts as $layout): ?>
      <option value="<?php echo $layout->cinema_id; ?>"><?php echo $layout->cinema_id; ?></option>
    <?php endforeach; ?>
  </select>
  <br><input type="submit" name="" value="Submit">
</form>
