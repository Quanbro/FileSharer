<?php

include 'functions/functions.php';
requireLogin();

if (!isset($_GET['file_id'])):
	die;
endif;
$file_id = $_GET['file_id'];

if (!fileExists($file_id)):
	die('The provided file does not exist.');
endif;

$file = getFile($file_id);

$filename = 'download.txt';
$filePath = $_SERVER['DOCUMENT_ROOT'] . "/FileSharer/uploads/" . $filename;

    if(file_exists($filePath)) {
        $fileName = basename($filePath);
        $fileSize = filesize($filePath);

        // Output headers.
        header("Cache-Control: private");
        header("Content-Type: application/stream");
        header("Content-Length: " . $fileSize);
        header("Content-Disposition: attachment; filename=" . $file['file_name']);

        // Output file.
        readfile ($filePath);  
        recordDownload($_SESSION['user'], $file);                 
        exit();
    }
    else {
        die('The provided file path is not valid.');
    }