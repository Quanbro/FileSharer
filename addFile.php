<?php

require 'functions/functions.php';
requireAdmin();
$errors = array();

$file_name = '';
$file_description = '';
$file_size = '';
$file_usr_id = '';

//if the form has been submitted with method = "post"
if (!empty($_POST)):
    $email = $_POST['email'];
    $display_name = $_POST['displayName'];
    $password = $_POST['password'];

    $errors = checkIfEmpty($email, "email", $errors);
    $errors = checkIfEmpty($display_name, "display name", $errors);

    if (empty($errors)):
        addUser($email, $password, $display_name, 1);
    endif;
endif;

?>

<html>

    <?php
    include 'partials/header.php';
    ?>

    <body>

 	<h1>Add File</h1> 
       <div class=container>

        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">   



          
          <div class="panel panel-info" >

            <div class="panel-heading">
                <div class="panel-title">Add File</div>
                <!--<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>-->
            </div>

            <div style="padding-top:30px" class="panel-body" >

              <?php include 'partials/messages.php'; ?>
              

              <form class="form-group" action="<?php echo $_SERVER['PHP_SELF'];?>" method = "post">

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="File Name">                                        
                </div>
                 <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="login-username" type="text" class="form-control" name="displayName" value="" placeholder="File Description">                                        
                </div>
                  <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="login-username" type="text" class="form-control" name="displayName" value="" placeholder="File Size">                                        
                </div>
                  <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="login-username" type="text" class="form-control" name="displayName" value="" placeholder="Uploader">                                        
                </div>                
                <input type = "submit" value = "Add File" class="btn btn-default"/>

              </form>

            </div>
          </div>

          </div>
        </div>

    </body>
</html>