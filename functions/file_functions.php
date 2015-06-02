<?php

function getFiles()
{
  global $db;
  $query = "
    SELECT * FROM files
  ";
  $stmt = $db->prepare($query);
  $stmt->execute();

  $registrations = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $registrations[] = $row;
  }

  return $registrations;  
}

function addFile()
{
  //INSERT INTO files
}

function setFileStatus($file)
{

}

function updateFileDetails()
{

}

function getFileMD5()
{

}

function saveFile()
{
	
}