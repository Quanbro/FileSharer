<?php

$messages = get_messages();    
?>
   <div id="errors">
    <?php
      //Loop over each error in the errors array and print any errors that exist. 
      if (isset($messages['error'])) :
        foreach ($messages['error'] as $error) :
          echo "<p>".htmlentities($error)."</p>";
        endforeach;
      endif;
      //Loop through any errors in form errors array
      if (isset($errors)) :
        foreach ($errors as $error) :
          echo "<p>".htmlentities($error)."</p>";
        endforeach;
      endif;
    ?>
  </div>
   <div id="success">
    <?php
      //Loop over each success in the success array and print any success that exist. 
      if (isset($messages['success'])) :
        foreach ($messages['success'] as $success) :
          echo "<p>".htmlentities($success)."</p>";
        endforeach;      
      endif;   
    ?>
  </div>