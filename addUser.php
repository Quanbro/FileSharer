<?php

require 'functions/functions.php';
requireAdmin();
$errors = array();

$email = '';
$display_name = '';
$password = '';


//if the form has been submitted with method = "post"
if (!empty($_POST)):
    $email = $_POST['email'];
    $display_name = $_POST['displayName'];
    $password = $_POST['password'];

    $errors = checkIfEmpty($email, "email", $errors);
    $errors = checkIfEmpty($display_name, "display name", $errors);
    $errors = validatePassword($password, $errors);
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

 	<h1>Add User</h1> 
       <div class=container>

        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">   



          
          <div class="panel panel-info" >

            <div class="panel-heading">
                <div class="panel-title">Add User</div>
                <!--<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>-->
            </div>

            <div style="padding-top:30px" class="panel-body" >

              <?php include 'partials/messages.php'; ?>
              

              <form class="form-group" action="<?php echo $_SERVER['PHP_SELF'];?>" method = "post">

                <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="Email">                                        
                </div>
                 <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="login-username" type="text" class="form-control" name="displayName" value="" placeholder="Display Name">                                        
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                </div>  
                <input type="checkbox" name="forcePasswordChange" value="1" checked>Force Password Change Upon First Login<br>              

                <!--Email: <input type = "text" name = "email" class="form-control"/>
                Password: <input type = "password" name = "password" class="form-control"/>
                -->
                <input type = "submit" value = "Add User" class="btn btn-default"/>

              </form>

            </div>
          </div>

          </div>
        </div>

    </body>
</html>