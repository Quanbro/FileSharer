<?php

  //Loop through any errors in form errors array
  if (isset($errors) and count($errors) > 0):?>
  <div id="errors" class="alert alert-danger fade"><?php
    foreach ($errors as $error) :
      echo "<p>".htmlentities($error)."</p>";
    endforeach;
    echo '<script>$("#errors").removeClass("hidden");</script>';
    echo '<script>$(".alert").delay(200).addClass("in");</script>';
    ?></div><?php
  endif;

?>