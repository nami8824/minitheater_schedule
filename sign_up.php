<?php
require_once 'functions.php';
session_start();

if(!empty($_POST)){
  if(empty($_POST['name'])){
    $error['name'] = '名前を入力してください';
  }else{
    $db = getDb();
    $stmt = $db->prepare('SELECT COUNT(*) as count FROM users WHERE user_name = ?');
    $stmt->bindValue(1, $_POST['name']);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    if($record['count'] !== 0){
      $error['name'] = 'その名前は登録済みです、別の名前を使用してください';
    }
  }

  if(empty($_POST['password'])){
    $error['password'] = 'パスワードを入力してください';
  }else{
    if(mb_strlen($_POST['password']) < 6 ){
      $error['password'] = 'パスワードは6文字以上で入力してください';
    }
  }

  if(empty($error)){
    $db = getDb();
    $stmt = $db->prepare('INSERT INTO users(user_name, password) VALUES(?, ?)');
    $stmt->bindValue(1,$_POST['name']);
    $stmt->bindValue(2,sha1($_POST['password']));
    $stmt->execute();
    $user_id = $db->lastInsertId();
    $db = null;

    $_SESSION['user_id'] = (int)$user_id;
    if(isset($_SESSION['from']) && $_SESSION['from'] === 'post'){
      header('Location:post.php');   
      exit();
    }

    header('Location:index.php');
    exit();
  }
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>sign_up</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet"> 
</head>
<body>

<nav class="navA navA--login">
<div class="container">
  <a href="index.php"><h1>MINI  THEATER  SCHEDULE</h1></a>
  <div class="sub">
    <ul>
      <!-- <a href=""><li>記録を見る</li></a>
      <a href=""><li>ログアウト</li></a> -->
    </ul>
  </div>
</div>
</nav>

<section class="login">
<div class="container">

  <h2>新規登録</h2>
  
  <?php if(!empty($error)): ?>
  <ul class="error">
    <?php foreach($error as $e): ?>
    <li><?= $e; ?></li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>

  <form action="sign_up.php" method="post">
    <div class="name"><label for="name" >ユーザー名</label></div>
    <div><input id="name" type="text" name="name" value="<?php if(isset($_POST['name'])){ echo($_POST['name']); } ?>" ></div>

    <div class="password"><label for="password" >パスワード</label></div>
    <div><input id="password" type="password" name="password" value="<?php if(isset($_POST['password'])){ echo($_POST['password']); } ?>" ></div>
    <div><input type="submit" class="submit"></div>
    
  </form>
</div>
</section>




<script src="https://kit.fontawesome.com/cee2db4d25.js" crossorigin="anonymous"></script>
</body>
</html>
