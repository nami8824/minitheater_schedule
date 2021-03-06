<?php

session_start();
require_once 'functions.php';


// ログインしていない場合、login.phpにリダイレクトさせる
if(empty($_SESSION['user_id'])){
  $_SESSION['from'] = 'post';
  header('Location:login.php');
  exit();
}


if(!empty($_POST)){
  if(empty($_POST['title'])){
    $error['title'] = 'タイトルを入力してください';
  }

  if(empty($error)){

    $hour = $_POST['hour'];
    $minute = $_POST['minute'];
    $time = $hour . $minute;
    $format_time = $hour . ':' . $minute;
    $month = mb_substr($_POST['date'], 5, 2);

    // 映画館ごとにカラーを設定する
    // このカラーをpostsテーブルの列として設定
    $color_of_place = ['新文芸坐' => 'gray' ,'早稲田松竹' => 'brown','シアター・イメージォーラム' => 'red', 'ユーロスペース' => 'lightgreen', 'シネマヴェーラ渋谷' => 'green', '下高井戸シネマ' => 'yellow', 'アンスティチュ・フランセ東京' => 'lightblue','国立映画アーカイブ' => 'white' ,'新宿武蔵野館' => 'purple', 'その他' => 'black'];

    foreach($color_of_place as $place => $color){
      if($place === $_POST['place']){
        $color_of_place = $color;
      }
    }

    $db = getDb();
    $stmt = $db->prepare('INSERT INTO posts(title, day, time, month, format_time, place, color_of_place, user_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
  
    $stmt->bindValue(1, $_POST['title']);
    $stmt->bindValue(2, $_POST['date']);
    $stmt->bindValue(3, (int)$time, PDO::PARAM_INT);
    $stmt->bindValue(4, (int)$month, PDO::PARAM_INT);
    $stmt->bindValue(5, $format_time);
    $stmt->bindValue(6, $_POST['place']);
    $stmt->bindValue(7, $color_of_place);
    $stmt->bindValue(8, (int)$_SESSION['user_id'], PDO::PARAM_INT);
  
    $stmt->execute();

    // posts.phpから入力された$_POST['date']をタイムスタンプ値として$_SESSION['time_from_post']に設定
    // $_SESSION['time_from_post']をindex.phpに引き渡す
    $date = new DateTime($_POST['date']);
    $_SESSION['time_from_post'] = $date->getTimestamp();
    if(date('D', $_SESSION['time_from_post']) === 'Sun' ){
      $_SESSION['time_from_post'] += 60 * 60 * 24;
    }
    header('Location:index.php');
  }
}

$hour_array =[0, 1, 2, 3, 4, 5, 6 , 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23];
$minute_array =['00', '05', '10', '15', '20', '25', '30', '35', '40', '45', '50', '55'];

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
      <a href="my_posts.php"><li><span class="fas fa-history"></span>記録を見る</li></a>
      <a href="logout.php"><li><span class="fas fa-sign-out-alt"></span>ログアウト</li></a>
    </ul>
  </div>
</div>
</nav>

<section class="post">
<div class="container">

  <h2><span class="far fa-edit"></span> あなたが観る予定の映画について教えてください</h2>

  <?php if(!empty($error)): ?>
  <ul class="error">
    <?php foreach($error as $e): ?>
    <li><?= $e; ?></li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>

  <form action="post.php" method="post">
    <input type="hidden" name="user_id" value="<?= enc($_SESSION['user_id']) ?>">
    <div class="place"><label for="place" ><span class="fas fa-building"></span> どこで観ますか？</label></div>
    <div>
      <select name="place" id="place">
        <option value="新文芸坐" <?php if(isset($_POST['place']) && enc($_POST['place']) === '新文芸坐'){ echo 'selected'; }?> >新文芸坐</option>
        <option value="早稲田松竹" <?php if(isset($_POST['place']) && enc($_POST['place']) === '早稲田松竹'){ echo 'selected'; }?>>早稲田松竹 </option>
        <option value="シアター・イメージォーラム" <?php if(isset($_POST['place']) && enc($_POST['place']) === 'シアター・イメージォーラム'){ echo 'selected'; }?>>シアター・イメージフォーム</option>
        <option value="ユーロスペース" <?php if(isset($_POST['place']) && enc($_POST['place']) === 'ユーロペース'){ echo 'selected'; }?> >ユーロペース</option>
        <option value="シネマヴェーラ渋谷" <?php if(isset($_POST['place']) && enc($_POST['place']) === 'シネマヴェーラ渋谷'){ echo 'selected'; }?>>シネマヴェーラ渋谷</option>
        <option value="下高井戸シネマ" <?php if(isset($_POST['place']) && enc($_POST['place']) === '下高井戸シネマ'){ echo 'selected'; }?>>下高井戸シネマ</option>
        <option value="アンスティチュ・フランセ東京" <?php if(isset($_POST['place']) && enc($_POST['place']) === 'アンスティチュ・フランセ京'){ echo 'selected'; }?>>アンスティチュ・フランセ東京</option>
        <option value="国立映画アーカイブ" <?php if(isset($_POST['place']) && enc($_POST['place']) === '国立映画アーカイブ'){ echo 'selected'; }?>>国立映画アーカイブ</option>
        <option value="新宿武蔵野館" <?php if(isset($_POST['place']) && enc($_POST['place']) === '新宿蔵野館'){ echo 'selected'; }?>>新宿蔵野館</option>
        <option value="その他" <?php if(isset($_POST['place']) && enc($_POST['place']) === 'その他'){ echo 'selected'; }?>>その他</option>
      </select>
    </div>
    

    <div class="date"><span class="far fa-calendar-check"></span> いつ上映されますか？</div>
    <span class="little">日時   </span>
    <input type="date" name="date" value="<?= date('Y-m-d')?>">
    
    <select name="hour" id="">
    <?php foreach($hour_array as $h): ?>
    <option value=<?= $h; ?>><?= $h; ?></option> 
    <?php endforeach; ?>   
    </select><span class="little">  時</span>
    <select name="minute" id="">
    <?php foreach($minute_array as $m): ?>
    <option value=<?= $m; ?>><?= $m ?></option> 
    <?php endforeach; ?>   
    </select><span class="little">  分</span>

    <div class="title"><label for="title"><span class="fas fa-film"></span> タイトルは何ですか？</label></div>
    <div><input id="title" type="text" name="title"></div>
    <div><input type="submit" class="submit"></div>
    
  </form>
</div>
</section>




<script src="https://kit.fontawesome.com/cee2db4d25.js" crossorigin="anonymous"></script>
</body>
</html>
