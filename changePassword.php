<?php

include 'functions/functions.php';

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
            Old Password: <input type = "password" name = "old_password" />
            New Password: <input type = "password" name = "new_password_1" />
            New Password (Again): <input type = "password" name = "new_password_2" />
            <input type = "submit" value = "Change Password" />
        </form>


    </body>
</html>