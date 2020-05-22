<?php

session_start();
require_once 'functions.php';

if(empty($_SESSION['user_id'])){
  $_SESSION['from'] = 'my_posts';
  header('Location:login.php');
  exit();
}


$db = getDb();
$stmt = $db->prepare('SELECT month,COUNT(*) as count FROM posts WHERE user_id = ? AND day LIKE "2020%" GROUP BY month');
$stmt->bindValue(1, (int)$_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();
$records_month = $stmt->fetchAll(PDO::FETCH_ASSOC);
$db = null;
$db = getDb();
$stmt = $db->prepare('SELECT place,COUNT(*) as count FROM posts WHERE user_id = ? AND day LIKE "2020%" GROUP BY place');
$stmt->bindValue(1, (int)$_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();
$records_place = $stmt->fetchAll(PDO::FETCH_ASSOC);
$db = null; 

// {
//   $db = getDb();
//   $stmt = $db->prepare('SELECT month,COUNT(*) as count FROM posts WHERE user_id = ? AND day LIKE ? GROUP BY month');
//   $stmt->bindValue(1, (int)$_SESSION['user_id'], PDO::PARAM_INT);
//   $stmt->bindValue(2, '%' . $_POST['year'] . '%' );
//   $stmt->execute();
//   $records_month = $stmt->fetchAll(PDO::FETCH_ASSOC);
//   $db = null;

//   $db = getDb();
//   $stmt = $db->prepare('SELECT place,COUNT(*) as count FROM posts WHERE user_id = ? AND day LIKE ? GROUP BY place');
//   $stmt->bindValue(1, (int)$_SESSION['user_id'], PDO::PARAM_INT);
//   $stmt->bindValue(2, '%' . $_POST['year'] . '%');
//   $stmt->execute();
//   $records_place = $stmt->fetchAll(PDO::FETCH_ASSOC);
//   $db = null; 

// }

$month_count = ['1 月' => '0 回', '2 月' => '0 回', '3 月' => '0 回', '4 月' => '0 回', '5 月' => '0 回', '6 月' => '0 回', '7 月' => '0 回', '8 月' => '0 回', '9 月' => '0 回', '10 月' => '0 回', '11 月' => '0 回', '12 月' => '0 回'];

foreach($records_month as $record){
  $month_count = array_merge( $month_count, [$record['month'] . ' 月' => $record['count'] . ' 回']);
}



$db = getDb();
$stmt = $db->prepare('SELECT place,COUNT(*) as count FROM posts WHERE user_id = ? AND day LIKE "2020%" GROUP BY place');
$stmt->bindValue(1, (int)$_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();
$records_place = $stmt->fetchAll(PDO::FETCH_ASSOC);
$db = null;


$db = getDb();
$stmt = $db->prepare('SELECT p.title, p.place, p.day, p.color_of_place, p.format_time FROM posts p LEFT JOIN users u ON p.user_id = u.user_id WHERE p.day LIKE "2020%" AND p.user_id = ? ORDER BY p.day DESC, p.time DESC');
$stmt->bindValue(1, (int)$_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();
$records_detail = $stmt->fetchAll(PDO::FETCH_ASSOC);
$db = null;


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>post</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@700&display=swap" rel="stylesheet">  
</head>
<body>

<nav class="navA navA--post">
<div class="container">
  <a href="index.php"><h1>MINI  THEATER  SCHEDULE</h1></a>
  <div class="sub">
    <ul>
    <a href="post.php"><li>投稿する</li></a>
      <a href="logout.php"><li>ログアウト</li></a>
    </ul>
  </div>
</div>
</nav>

<div class="container--middle">

<!-- <form action="my_posts.php" method="post">
  <label for="year">年を選んでください</label>
  <select name="year" id="year">
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
  </select>
  <input type="submit">
</form> -->

<article class="log">
<section class="month">
<h2>月ごとの投稿数</h2>
<ul>
<?php foreach($month_count as $month => $count): ?>
  <li><?= $month; ?>  …  <?= $count; ?></li>
<?php endforeach; ?>
</ul>
</section>

<section class="place">
<h2>映画館ごとの投稿数</h2>
<ul>
<?php foreach($records_place as $record): ?>
  <li><?= $record['place']; ?>  …  <?= $record['count']; ?> 回</li>
<?php endforeach; ?>
</ul>
</section>

</article>

<article class="log-detail">
<h2>投稿履歴</h2>
  <ul>
  <?php foreach($records_detail as $record): ?>
    <li><?= $record['day'] ?><span class="time"><?= $record['format_time'] ?>〜〜</span><span class="title"><?= $record['title'] ?></span><span class="place <?= $record['color_of_place']; ?>">@<?= $record['place'] ?></span></li>
  <?php endforeach; ?> 
  </ul>
</article>
</div>




<script src="https://kit.fontawesome.com/cee2db4d25.js" crossorigin="anonymous"></script>
</body>
</html>
