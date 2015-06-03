<?php

include 'functions/functions.php';

$name = '';
$password = '';
$errors = array();

//if the form has been submitted with method = "post"
if (!empty($_POST)):
  if (empty($_POST['email'])):
    $errors[] = "Please enter your email address.";
  elseif(!preg_match('/@.+\..+/', $_POST['email'])):
    $errors[] = "Please enter a valid email address.";
  else :
    //Check if a user is already associated with that email address
    $check_email = user_exists($_POST['email']);
    if (!$check_email) :
      $errors[] = "That email address is not associated with an account.";
    endif;
  endif;
  if (empty($_POST['password'])) :
    $errors[] = "Please enter your password.";
  endif;
  // if there are no errors
  if (empty($errors)) :
    $check_password = check_password_correct($_POST['email'], $_POST['password']);
    if ($check_password) :
      $user = getUserByEmail($_POST['email']);
      loginUser($user);

      header('Location: index.php');
      die;
    else :
     $errors[] = "Incorrect password.";
     $email = $_POST['email'];
    endif;
  else :
    //There must be an error. Set the variables to maintain sticky form.
    $email = $_POST['email'];
    $password = $_POST['password'];
  endif;    
endif;

?>

<html>

    <head>

        <title><?php echo $title;?></title>

        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

        <link rel="stylesheet" href="css/bootstrap.css">

        <!--<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.css">

        <script type='text/javascript' src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>

        <script type='text/javascript' src="//cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.js"></script>

        <script type='text/javascript' src="//cdn.datatables.net/fixedheader/2.1.2/js/dataTables.fixedHeader.min.js"></script>

    </head>

    <body>

        <div class=container>

        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">   

          <div class="text-center" style="padding-bottom: 15px;">
              <img src="./images/logo_big.png" align= "middle">
          </div>

          
          <div class="panel panel-info" >

            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
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
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                </div>                

                <!--Email: <input type = "text" name = "email" class="form-control"/>
                Password: <input type = "password" name = "password" class="form-control"/>
                -->
                <input type = "submit" value = "Login" class="btn btn-default"/>

              </form>

            </div>
          </div>

          </div>
        </div>


    </body>
</html>