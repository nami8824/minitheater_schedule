<?php
echo '<pre>';
echo var_dump($_POST);
echo '</pre>';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>サンプル</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet"> 
</head>
<body>

<nav class="navA navA--post">
<div class="container">
  <a href="index.php"><h1>MINI THEATER SCHEDULE</h1></a>
  <div class="sub">
    <ul>
      <a href=""><li>記録を見る</li></a>
      <a href=""><li>ログアウト</li></a>
    </ul>
  </div>
</div>
</nav>

<section class="post">
<div class="container">

  <h2>あなたが観る予定の映画について教えてください</h2>

  <form action="post.php" method="post">
    <div class="place"><label for="place" >どこで観ますか？</label></div>
    <div>
      <select name="place" id="place">
        <option value="新文芸坐">新文芸坐</option>
        <option value="早稲田松竹">早稲田松竹 </option>
        <option value="シアター・イメージォーラム">シアター・イメージフォーム</option>
        <option value="ユーロスペース">ユーロペース</option>
        <option value="シネマヴェーラ渋谷">シネマヴェーラ渋谷</option>
        <option value="下高井戸シネマ">下高井戸シネマ</option>
        <option value="アンスティチュ・フンセ 東京">アンスティチュ・フランセ京</option>
        <option value="国立映画アーカイブ">国立映画アーカイブ</option>
        <option value="新宿武蔵野館">新宿蔵野館</option>
        <option value="その他">その他<option>
      </select>
    </div>
    

    <div class="date">いつ上映されますか？</div>
    <span class="little">日時   </span>
    <input type="date" name="date" value="<?= date('Y-m-d')?>">
    
    <select name="hour" id="">
    <?php for($i = 0; $i <= 23 ; $i++): ?>
    <option value=<?= $i; ?>><?= $i; ?></option> 
    <?php endfor; ?>   
    </select><span class="little">  時</span>
    <select name="minute" id="">
    <?php for($i = 0; $i <= 59 ; $i++): ?>
    <option value=<?= $i; ?>><?= $i; ?></option> 
    <?php endfor; ?>
    </select><span class="little">  分</span>

    <div class="title"><label for="title">タイトルは何ですか？</label></div>
    <div><input id="title" type="text" name="title"></div>
    <div><input type="submit" class="submit"></div>
    
  </form>
</div>
</section>




<script src="https://kit.fontawesome.com/cee2db4d25.js" crossorigin="anonymous"></script>
</body>
</html>
