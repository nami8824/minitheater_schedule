<?php
require_once 'functions.php';
session_start();

if(isset($_SESSION['from'])){
  if($_SESSION['from'] === 'post'){
    $notice = '投稿するにはログインが必要です';
  }else{
    $notice = '記録を見るにはログインが必要です';
  }
}

if(!empty($_POST)){
  if(empty($_POST['name'])){
    $error['name'] = '名前を入力してください';
  }

  if(empty($_POST['password'])){
    $error['password'] = 'パスワードを入力してください';
  }

  if(empty($error)){
    $db = getDb();
    $stmt = $db->prepare('SELECT * FROM users WHERE user_name = ? AND password = ?');
    $stmt->bindValue(1,$_POST['name']);
    $stmt->bindValue(2,sha1($_POST['password']));
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    $db = null;
    if(!$record){
      $error['input'] = 'ユーザ名またはパスワードが正しくありません'; 
    }else{
      $user_id = $record['user_id'];
      $_SESSION['user_id'] = $user_id;
      if(isset($_SESSION['from'])){
        if($_SESSION['from'] === 'post'){
        header('Location:post.php');   
        exit();
        }else{
        header('Location:my_posts.php');   
        exit();
        }
      }
  
      header('Location:index.php');
      exit();
    }
  }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Kulim+Park:ital@1&display=swap" rel="stylesheet"> 
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

<?php if(isset($notice)) :?>
<div class="notice">
  <div class="container">
  <div class="warning warning--yellow"><?= $notice; ?></div>
  </div>
</div>
<?php endif ;?>

<section class="login">
<div class="container">

  <h2>ログイン</h2>
  <div><a href="sign_up.php">※登録がまだの方はこちらから</a></div>

  <?php if(!empty($error)): ?>
  <ul class="error">
    <?php foreach($error as $e): ?>
    <li><?= $e; ?></li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
  
  <form action="login.php" method="post">
    <div class="name"><label for="name" >ユーザー名</label></div>
    <div><input id="name" type="text" name="name" value="<?php if(isset($_POST['name'])){ echo($_POST['name']); } ?>"></div>

    <div class="password"><label for="password" >パスワード</label></div>
    <div><input id="password" type="password" name="password" value="<?php if(isset($_POST['password'])){ echo($_POST['password']); } ?>"></div>
    <div><input type="submit" class="submit"></div>
    
  </form>
</div>
</section>




<script src="https://kit.fontawesome.com/cee2db4d25.js" crossorigin="anonymous"></script>
</body>
</html>
