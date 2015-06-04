<?php

function getFiles()
{
  global $db;
  $query = "
    SELECT *, date(file_created) as dateString FROM files
  ";
  $stmt = $db->prepare($query);
  $stmt->execute();

  $files = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $files[] = $row;
  }

  return $files;  
}
function getFilesByUser($usr_id)
{
  global $db;
  $query = "
    SELECT *, date(file_created) as dateString FROM files WHERE usr_id = ?
  ";
  $stmt = $db->prepare($query);
  $stmt->execute(array($usr_id));

  $files = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $files[] = $row;
  }

  return $files;  
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

function addFile($file_name, $usr_id, $description, $size)
{
  global $db;

  $query = '
  INSERT INTO files
  (file_name, usr_id, file_descr, size)
  VALUES
  (?, ?, ?, ?)
  ';

  $stmt = $db->prepare($query);
  $stmt->execute(array($file_name, $usr_id, $description, $size));
}

function setFileStatus($file)
{

}

function updateFileDetails()
{

}

function saveFile()
{
	
}