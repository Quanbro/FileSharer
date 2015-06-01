<?php

include 'functions/functions.php';

$files = getFiles();

echo $files[0]['file_name'];