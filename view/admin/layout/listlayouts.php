<div class="activenav">

</div>
<div class="listcolumn column">
  <p>Here is a list of all layouts:</p>

  <?php foreach($layouts as $layout) { ?>
  


        <a href='?controller=layout&action=layoutdetails&cinema_id=<?php echo $layout->cinema_id; ?>'>
          <div class="listitem">
            Layout Number <?php echo $layout->cinema_id; ?>
          </div>
        </a>



  <?php } ?>

  <a href='?controller=layout&action=addlayout'>
    <div class='listitem'>Add layout</div>
  </a>
</div>
