<?php

session_start();
require_once 'functions.php';

if(isset($_SESSION['from'])){
  $_SESSION['from'] = null;
}

$seconds_of_day = 86400;

if(empty($_GET)){
  $target_time = time();
}else{
  $week_count = $_GET['week_count'];
  $target_time = time() + $seconds_of_day * 7 * $week_count;
}

$one_day_before = $target_time - $seconds_of_day; 
$two_days_before = $target_time - 2 * $seconds_of_day;
$three_days_before = $target_time - 3 * $seconds_of_day;
$four_days_before = $target_time - 4 * $seconds_of_day;
$five_days_before = $target_time - 5 * $seconds_of_day;
$six_days_before = $target_time - 6 * $seconds_of_day;
$one_day_after = $target_time + $seconds_of_day;
$two_days_after = $target_time + 2 * $seconds_of_day;
$three_days_after = $target_time + 3 * $seconds_of_day;
$four_days_after = $target_time + 4 * $seconds_of_day;
$five_days_after = $target_time + 5 * $seconds_of_day;
$six_days_after = $target_time + 6 * $seconds_of_day;

$day_of_week = date("D",$target_time);

if($day_of_week === 'Sun'){
  list($sun, $sun_detail) = [date('n/j', $target_time),date('Y-m-d', $target_time)];
  list($mon, $mon_detail) = [date('n/j', $one_day_after),date('Y-m-d', $one_day_after)];
  list($tue, $tue_detail) = [date('n/j', $two_days_after), date('Y-m-d', $two_days_after)];
  list($wed, $wed_detail) = [date('n/j', $three_days_after), date('Y-m-d', $three_days_after)];
  list($thu, $thu_detail) = [date('n/j', $four_days_after), date('Y-m-d', $four_days_after)];
  list($fri, $fri_detail) = [date('n/j', $five_days_after), date('Y-m-d', $five_days_after)];
  list($sat, $sat_detail) = [date('n/j', $six_days_after), date('Y-m-d', $six_days_after)];
}

if($day_of_week === 'Mon'){
  list($sun, $sun_detail) = [date('n/j', $one_day_before), date('Y-m-d', $one_day_before)];
  list($mon, $mon_detail) = [date('n/j', $target_time), date('Y-m-d', $target_time)];
  list($tue, $tue_detail) = [date('n/j', $one_day_after), date('Y-m-d', $one_day_after)];
  list($wed, $wed_detail) = [date('n/j', $two_days_after), date('Y-m-d', $two_days_after)];
  list($thu, $thu_detail) = [date('n/j', $three_days_after), date('Y-m-d', $three_days_after)];
  list($fri, $fri_detail) = [date('n/j', $four_days_after), date('Y-m-d', $four_days_after)];
  list($sat, $sat_detail) = [date('n/j', $five_days_after), date('Y-m-d', $five_days_after)];
}

if($day_of_week === 'Tue'){
  list($sun, $sun_detail) = [date('n/j', $two_days_before), date('Y-m-d', $two_days_before)];
  list($mon, $mon_detail) = [date('n/j', $one_day_before), date('Y-m-d', $one_day_before)];
  list($tue, $tue_detail) = [date('n/j', $target_time), date('Y-m-d', $target_time)];
  list($wed, $wed_detail) = [date('n/j', $one_day_after), date('Y-m-d', $one_day_after)];
  list($thu, $thu_detail) = [date('n/j', $two_days_after), date('Y-m-d', $two_days_after)];
  list($fri, $fri_detail) = [date('n/j', $three_days_after), date('Y-m-d', $three_days_after)];
  list($sat, $sat_detail) = [date('n/j', $four_days_after), date('Y-m-d', $four_days_after)];
}

if($day_of_week === 'Wed'){
  list($sun, $sun_detail) = [date('n/j', $three_days_before), date('Y-m-d', $three_days_before)];
  list($mon, $mon_detail) = [date('n/j', $two_days_before), date('Y-m-d', $two_days_before)];
  list($tue, $tue_detail) = [date('n/j', $one_day_before), date('Y-m-d', $one_day_before)];
  list($wed, $wed_detail) = [date('n/j', $target_time), date('Y-m-d', $target_time)];
  list($thu, $thu_detail) = [date('n/j', $one_day_after), date('Y-m-d', $one_day_after)];
  list($fri, $fri_detail) = [date('n/j', $two_days_after), date('Y-m-d', $two_days_after)];
  list($sat, $sat_detail) = [date('n/j', $three_days_after), date('Y-m-d', $three_days_after)];
}

if($day_of_week === 'Thu'){
  list($sun, $sun_detail) = [date('n/j', $four_days_before), date('Y-m-d', $four_days_before)];
  list($mon, $mon_detail) = [date('n/j', $three_days_before), date('Y-m-d', $three_days_before)];
  list($tue, $tue_detail) = [date('n/j', $two_days_before), date('Y-m-d', $two_days_before)];
  list($wed, $wed_detail) = [date('n/j', $one_day_before), date('Y-m-d', $one_day_before)];
  list($thu, $thu_detail) = [date('n/j', $target_time), date('Y-m-d', $target_time)];
  list($fri, $fri_detail) = [date('n/j', $one_day_after), date('Y-m-d', $one_day_after)];
  list($sat, $sat_detail) = [date('n/j', $two_days_after), date('Y-m-d', $two_days_after)];
}

if($day_of_week === 'Fri'){
  list($sun, $sun_detail) = [date('n/j', $five_days_before), date('Y-m-d', $five_days_before)];
  list($mon, $mon_detail) = [date('n/j', $four_days_before), date('Y-m-d', $four_days_before)];
  list($tue, $tue_detail) = [date('n/j', $three_days_before), date('Y-m-d', $three_days_before)];
  list($wed, $wed_detail) = [date('n/j', $two_days_before), date('Y-m-d', $two_days_before)];
  list($thu, $thu_detail) = [date('n/j', $one_day_before), date('Y-m-d', $one_day_before)];
  list($fri, $fri_detail) = [date('n/j', $target_time), date('Y-m-d', $target_time)];
  list($sat, $sat_detail) = [date('n/j', $one_day_after), date('Y-m-d', $one_day_after)];
}

if($day_of_week === 'Sat'){
  list($sun, $sun_detail) = [date('n/j', $six_days_before), date('Y-m-d', $six_days_before)];
  list($mon, $mon_detail) = [date('n/j', $five_days_before), date('Y-m-d', $five_days_before)];
  list($tue, $tue_detail) = [date('n/j', $four_days_before), date('Y-m-d', $four_days_before)];
  list($wed, $wed_detail) = [date('n/j', $three_days_before), date('Y-m-d', $three_days_before)];
  list($thu, $thu_detail) = [date('n/j', $two_days_before), date('Y-m-d', $two_days_before)];
  list($fri, $fri_detail) = [date('n/j', $one_day_before), date('Y-m-d', $one_day_before)];
  list($sat, $sat_detail) = [date('n/j', $target_time), date('Y-m-d', $target_time)];
}



$db = getDb();
$stmt = $db->prepare('SELECT * FROM posts LEFT JOIN users ON posts.user_id = users.user_id WHERE posts.day in (?, ?, ?, ? ,? ,? ,?)');
$stmt->bindValue(1, $sun_detail);
$stmt->bindValue(2, $mon_detail);
$stmt->bindValue(3, $tue_detail);
$stmt->bindValue(4, $wed_detail);
$stmt->bindValue(5, $thu_detail);
$stmt->bindValue(6, $fri_detail);
$stmt->bindValue(7, $sat_detail);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sun_records = [];
$mon_records = [];
$tue_records = [];
$wed_records = [];
$thu_records = [];
$fri_records = [];
$sat_records = [];

foreach($records as $record){
  if($record['day'] === $sun_detail){
    array_push($sun_records, $record);
  }
  if($record['day'] === $mon_detail){
    array_push($mon_records, $record);
  }
  if($record['day'] === $tue_detail){
    array_push($tue_records, $record);
  }
  if($record['day'] === $wed_detail){
    array_push($wed_records, $record);
  }
  if($record['day'] === $thu_detail){
    array_push($thu_records, $record);
  }
  if($record['day'] === $fri_detail){
    array_push($fri_records, $record);
  }
  if($record['day'] === $sat_detail){
    array_push($sat_records, $record);
  }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>MINI  THEATER  SCHEDULE</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet"> 
</head>
<body>

<nav class="navA">
<div class="container">
  <a href="index.php"><h1>MINI  THEATER  SCHEDULE</h1></a>
  <div class="sub">
    <ul>
      <a href="post.php"><li>投稿する</li></a>
      <a href=""><li>記録を見る</li></a>
      <?php if(empty($_SESSION['user_id'])) :?>
      <a href="login.php"><li>ログイン</li></a>
      <?php else: ?>
      <a href=""><li>ログアウト</li></a>
      <?php endif; ?>
    </ul>
  </div>
</div>
</nav>

<nav class="navB">
  <a href="index.php?week_count=
    <?php if(isset($week_count)){
      $week_count --;
      echo "$week_count";
    }else{
      echo "-1";
    }
    ?>"><span class="fa fa-angle-double-left"></span>前の週へ</a>


  <a href="index.php?week_count=
    <?php if(isset($week_count)){
      $week_count +=2;
      echo "$week_count";
    }else{
      echo "1";
    }
    ?>">次の週へ<span class="fa fa-angle-double-right"></span></a>
</nav>

<section class="content">
  <section class="container">
    <div class="conA">
      <div class="day">
        <p><?= $sun; ?></p>
        <p><?= '日' ?></p>
      </div> 
      <div class="conB">
      </div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $mon; ?></p>
        <p><?= '月' ?></p>
      </div> 
      <div class="conB">
      <section class="posts">
        <ul>
        <?php foreach($mon_records as $mon_record): ?>
          <li><?= $mon_record['title']; ?></li>
          <li><?= $mon_record['place']; ?></li>
          <li><?= $mon_record['time']; ?></li>
          <li><?= $mon_record['user_name']; ?></li>
        <?php endforeach; ?>
        </ul>
        </section>
      </div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $tue; ?></p>
        <p><?= '火' ?></p>
      </div> 
      <div class="conB">
      <ul>
      <?php foreach($tue_records as $tue_record): ?>
        <li><?= $tue_record['title']; ?></li>
        <li><?= $tue_record['place']; ?></li>
        <li><?= $tue_record['time']; ?></li>
        <li><?= $tue_record['user_name']; ?></li>
      <?php endforeach; ?>
      </ul>
      </div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $wed; ?></p>
        <p><?= '水' ?></p>
      </div> 
      <div class="conB"></div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $thu; ?></p>
        <p><?= '木' ?></p>
      </div> 
      <div class="conB"></div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $fri; ?></p>
        <p><?= '金' ?></p>
      </div> 
      <div class="conB"></div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $sat; ?></p>
        <p><?= '土' ?></p>
      </div> 
      <div class="conB"></div>
    </div>
  </section>
</section>
<script src="https://kit.fontawesome.com/cee2db4d25.js" crossorigin="anonymous"></script>
</body>
</html>
