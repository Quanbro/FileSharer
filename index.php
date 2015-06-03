<?php

include 'functions/functions.php';

$displayUsersUploads = false;

if (!isset($_GET['usr_id'])):
    $files = getFiles();
else:
    $files = getFilesByUser($_GET['usr_id']);
    $displayUsersUploads = true;
endif;

?>

<html>

    <head>

        <title><?php echo $title; ?></title>

        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

        <link rel="stylesheet" href="css/bootstrap.css">

        <!--<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.css">

        <script type='text/javascript' src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>

        <script type='text/javascript' src="//cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.js"></script>

        <script type='text/javascript' src="//cdn.datatables.net/fixedheader/2.1.2/js/dataTables.fixedHeader.min.js"></script>

        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <script type="text/javascript" src='js/bootstrap.min.js'></script>

    </head>



    <div class="container">

   	<div class="text-center" style="padding:10px;">
    	<img src="images/logo.png">
    </div>

    <nav class="navbar navbar-default" role="navigation">
       <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" 
             data-target="#example-navbar-collapse">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
          </button>
          
       </div>
       <div class="collapse navbar-collapse" id="example-navbar-collapse">
              <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="index.php">Submit A File</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="padding-right:20px;">
              <li><a href="./changepassword.php">Change Password</a></li>
              <li><a href="./logout.php">Log Out</a></li>
            </ul>
       </div>
    </nav>





	<!--
    <body>

    <div class="pull-right">
        <div class="logout pull-right">
    		<button type="button" class="btn btn-default">Log Out</button>
   		</div>
    </div>
    -->
    <h1>
    <?php
    if ($displayUsersUploads):
        $user = getUserByID($_GET['usr_id']);
        echo sprintf("Uploads By %s", $user['display_name'] );
    else:
        echo "All Uploads";
    endif;
    ?>
    </h1>
    <div style="padding-top:10px">

        <table id="files" class="table dataTable table-striped table-bordered" cellpadding="0" cellspacing="0" border="0"  width="100%">

	        <thead>

	            <tr>

	                <th>File Name</th>
	                <th>File Description</th>
	                <th>Date Uploaded</th>
	                <th>Uploaded By</th>

	            </tr>

	        </thead>

	        <tbody>
	        <?php

            foreach($files as $file){

            ?>

                <tr>
                	<td><?php echo '<a href = "./downloadFile.php?file_id='.$file['file_id'].'">'.$file['file_name']?></a></td>

                	<td><?php echo $file['file_descr']?></td>

                	<td><?php echo $file['dateString']?></td>

                	<td>
                    <?php 
                        $user = getUserByID($file['usr_id']);
                        if (isset($user)):
                            echo '<a href = "index.php?usr_id='.$file['usr_id'].'">'.$user['display_name'];
                        endif;
                    ?>
                    </td>
                </tr>


            <?php

            }

            ?>

	        </tbody>


        </table>
    </div>    
    </div>
        <script type="text/javascript">

            $(document).ready(function() {



                console.log('pagination button clicked'); 

                var dataTable = $('#files').DataTable({
                    

                    iDisplayLength: 20,

                    sPaginationType: "full_numbers",

                    "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],

                    "order": [[ 0, "desc" ]]

                });

                //new $.fn.dataTable.FixedHeader( dataTable );



                function paginateScroll() {

                    $('html, body').animate({

                       scrollTop: $(".dataTables_wrapper").offset().top

                    }, 100);

                    $(".paginate_button").unbind('click', paginateScroll);

                    $(".paginate_button").bind('click', paginateScroll);

                }




            } );

        </script>


    </body>
</html>