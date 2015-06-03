<?php

include 'functions/functions.php';

if (empty($_SESSION['user'])) :
    header('Location: login.php');
    die;
endif;

$user = $_SESSION['user'];
$old_password = $user['usr_password'];

//if the form has been submitted with method = "post"
if (!empty($_POST)):
  if (empty($_POST['new_password_1'])) :
    $errors[] = "Please enter your new password.";
  endif;

  if (empty($_POST['new_password_2'])) :
    $errors[] = "Please enter your new password again.";
  endif;  

  if ($_POST['new_password_1'] != $_POST['new_password_2']):
    $errors[] = "Passwords must match";
  endif;

  // if there are no errors
  if (empty($errors)) :
    $check_password = check_password_correct($user['usr_email'], $_POST['old_password']);
    if ($check_password) :
      changePassword($user, $_POST['new_password_1']);
  

      header('Location: index.php');
      die;
    else :
        $errors[] = "Your old password is incorrect.";
    endif;
    

  else :
    //There must be an error. Set the variables to maintain sticky form.
    //$email = $_POST['email'];
    //$password = $_POST['password'];
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

        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-4 col-md-offset-3">   

        <!--
          <div class="text-center" style="padding-bottom: 15px;">
              <img src="./images/logo_big.png" align= "middle">
          </div>
        -->

          
          <div class="panel panel-info" >

            <div class="panel-heading">
                <div class="panel-title">Change Your Password</div>
                <!--<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>-->
            </div>

            <div style="padding-top:30px" class="panel-body text-center" >

              <?php include 'partials/messages.php'; ?>
              

              <form class="form-group" action="<?php echo $_SERVER['PHP_SELF'];?>" method = "post">

                <div style="margin-bottom: 25px" class="input-group panel-info col-sm-12">
                            <input id="login-username" type="password" class="form-control " name="old_password" value="" placeholder="Old Password">                                        
                </div>
                    
                <div style="margin-bottom: 25px" class="input-group col-sm-12">
                            <input id="login-password" type="password" class="form-control" name="new_password_1" placeholder="New Password">
                </div>  

                <div style="margin-bottom: 25px" class="input-group col-sm-12">
                            <input id="login-password" type="password" class="form-control" name="new_password_2" placeholder="New Password (Again)">
                </div>     

                <!--Email: <input type = "text" name = "email" class="form-control"/>
                Password: <input type = "password" name = "password" class="form-control"/>
                -->
                <input type = "submit" value = "Change Password" class="btn btn-default"/>

              </form>

            </div>
          </div>

          </div>
        </div>

        <!--
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
            Old Password: <input type = "password" name = "old_password" />
            New Password: <input type = "password" name = "new_password_1" />
            New Password (Again): <input type = "password" name = "new_password_2" />
            <input type = "submit" value = "Change Password" />
        </form>
        -->


    </body>
</html>