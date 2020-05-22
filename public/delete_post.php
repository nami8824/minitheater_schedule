<?php
require_once 'functions.php';
session_start();


if(empty($_SESSION['user_id'])){
  header('Location: index.php');
  exit();
}else{
  $week_count = $_GET['week_count'];
  $post_id = $_GET['post_id'];
  $db = getDb();
  $stmt = $db->prepare('SELECT user_id FROM posts WHERE post_id = ?');
  $stmt->bindValue(1, (int)$post_id, PDO::PARAM_INT);
  $stmt->execute();
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
  $user_id = $record['user_id'];
  $db = null;
  if($user_id !== $_SESSION['user_id']){
    header('Location:index.php');
    exit();
  }


  $db = getDb();
  $stmt = $db->prepare('DELETE FROM posts WHERE post_id = ?');
  $stmt->bindValue(1, (int)$post_id, PDO::PARAM_INT);
  $stmt->execute();
  header('Location:index.php?week_count=' . $week_count);
} 
