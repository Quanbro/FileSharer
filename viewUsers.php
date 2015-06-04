<?php
require 'functions/functions.php';
$users = getUsers();
?>

<html>

    <?php
    include 'partials/header.php';
    ?>

    <body>
    	<?php
    	foreach ($users as $user):
    		echo $user['usr_id'] . " " . $user['usr_email'] . " " . $user['display_name']  . " " . $user['upload_count'];
    		echo "<br>";
    	endforeach;
    	?>
    </body>
</html>