<?php

include 'functions/functions.php';
requireLogin();

$user = $_SESSION['user'];

?>

<html>

    <?php
    include 'partials/header.php';
    ?>

    <body>

 	<h1>My Profile</h1> 

    </body>
    <?php
    include 'partials/footer.php';
    ?>
</html>