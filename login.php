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
      loginUser($user['usr_id']);

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

        <title>VERN</title>

        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

        <link rel="stylesheet" href="css/bootstrap.css">

        <link rel="stylesheet" href="css/bootstrap-theme.min.css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.css">

        <script type='text/javascript' src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>

        <script type='text/javascript' src="//cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.js"></script>

        <script type='text/javascript' src="//cdn.datatables.net/fixedheader/2.1.2/js/dataTables.fixedHeader.min.js"></script>

    </head>

    <body>
        <?php include 'partials/messages.php'; ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
            Email: <input type = "text" name = "email" />
            Password: <input type = "password" name = "password" />
            <input type = "submit" value = "Login" />
        </form>


    </body>
</html>