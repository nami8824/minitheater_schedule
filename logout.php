<?php
require_once 'functions.php';
session_start();

$_SESSION = [];

if(isset($_COOKIE[session_name()])){
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 1,
  $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

session_destroy();

header('Location:index.php');
exit();
