<?php
// function getDb(){
//   $dsn = 'mysql:dbname=schedule;host=localhost;charset=utf8';
//   $user = 'root';
//   $passord = 'nami8824';
//   $db = new PDO($dsn, $user, $passord);
//   $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//   $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//   return $db;
// }

function getDb(){
  $dsn = 'mysql:dbname=heroku_e4e44d54c32c224;host=us-cdbr-east-06.cleardb.net;charset=utf8';
  $user = 'b7492c58eddf9d';
  $passord = '42dbb933';
  $db = new PDO($dsn, $user, $passord);
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  return $db;
}

function enc($str){
  return htmlspecialchars($str, ENT_QUOTES);
}