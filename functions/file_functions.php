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

function getFile($id)
{
  global $db;
  $query = "
  SELECT *, date(file_created) as dateString FROM files
  WHERE file_id = ?
  ";
  
  $stmt = $db->prepare($query);
  $stmt->execute(array($id));
  $file= $stmt->fetch(PDO::FETCH_ASSOC);

  return $file;
}

function fileExists($file_id){

  global $db;
  $query = "
    SELECT COUNT(*) FROM files
    WHERE file_id = ?
  ";  
   
  $stmt = $db->prepare($query);
  $stmt->execute(array($file_id));
  //returns first row
  $row = $stmt->fetch();
  return $row[0] > 0;

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