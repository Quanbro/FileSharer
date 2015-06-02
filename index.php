<?php

include 'functions/functions.php';

$files = getFiles();

?>

<html>

    <head>

        <title>VERN</title>

        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="stylesheet" href="css/bootstrap-theme.min.css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.css">

        <script type='text/javascript' src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>

        <script type='text/javascript' src="//cdn.datatables.net/plug-ins/e9421181788/integration/bootstrap/3/dataTables.bootstrap.js"></script>

        <script type='text/javascript' src="//cdn.datatables.net/fixedheader/2.1.2/js/dataTables.fixedHeader.min.js"></script>

    </head>

    <body>

        <table id="files" class="table dataTable table-striped table-bordered" cellpadding="0" cellspacing="0" border="0"  width="100%">

	        <thead>

	            <tr>

	                <th>File Name</th>
	                <th>File Description</th>
	                <th>File Created</th>

	            </tr>

	        </thead>

	        <tbody>
	        <?php

            foreach($files as $file){

            ?>

                <tr>
                	<td><?php echo $file['file_name']?></td>

                	<td><?php echo $file['file_descr']?></td>

                	<td><?php echo $file['file_created']?></td>
                </tr>


            <?php

            }

            ?>

	        </tbody>


        </table>

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

                paginateScroll();



            } );









        </script>


    </body>
