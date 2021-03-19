<?php
// ako su mysql username/password i ime baze na vasim racunarima drugaciji
// obavezno ih ovde zamenite
$server = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "blog";

try {
  $connection = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
  echo $e->getMessage();
}
// svi postovi
function GetAllPostsFromDB($sql, $connection)
{
  $statement = $connection->prepare($sql);
  $statement->execute();
  $statement->setFetchMode(PDO::FETCH_ASSOC);
  return $statement->fetchAll();
}
//single post
function GetSinglePostFromDB($sql, $connection)
{
  $statement = $connection->prepare($sql);
  $statement->execute();
  $statement->setFetchMode(PDO::FETCH_ASSOC);
  return $statement->fetch();
}
// svi komentari
function GetAllCommentsFromDB($sql, $connection)
{
  $statement = $connection->prepare($sql);
  $statement->execute();
  $statement->setFetchMode(PDO::FETCH_ASSOC);
  return $statement->fetchAll();
}
?>
