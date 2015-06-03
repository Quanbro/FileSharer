<?php

include 'functions/functions.php';

$files = getFiles();

?>

<html>

    <head>

        <title>VERN</title>

        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

        <link rel="stylesheet" href="css/bootstrap.css">

        <!--<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.css">

        <script type='text/javascript' src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>

        <script type='text/javascript' src="//cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.js"></script>

        <script type='text/javascript' src="//cdn.datatables.net/fixedheader/2.1.2/js/dataTables.fixedHeader.min.js"></script>

    </head>



    <div class="container">

   	<div style="padding:10px;">
    	<img src="images/logo.png">
    </div>

	<!-- Static navbar -->
	<nav class="navbar navbar-default">
	<div class="container-fluid">
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#">Downloads</a>
	  </div>
	  <div id="navbar" class="navbar-collapse collapse">
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="#">Home</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right" style="padding-right:20px;">
	      <li><a href="./logout.php">Log Out</a></li>
	    </ul>
	  </div><!--/.nav-collapse -->
	</div><!--/.container-fluid -->
	</nav>

	<!--
    <body>

    <div class="pull-right">
        <div class="logout pull-right">
    		<button type="button" class="btn btn-default">Log Out</button>
   		</div>
    </div>
    -->

    <div style="padding-top:10px">

        <table id="files" class="table dataTable table-striped table-bordered" cellpadding="0" cellspacing="0" border="0"  width="100%">

	        <thead>

	            <tr>

	                <th>File Name</th>
	                <th>File Description</th>
	                <th>File Created</th>
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

                	<td><?php echo $file['file_created']?></td>

                	<td>Vern</td>
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