<?php
session_start();
require_once 'functions.php';

if(isset($_SESSION['from'])){
  $_SESSION['user_select'] = 'all';
  $_SESSION['from'] = null;
}





$seconds_of_day = 86400;

if(isset($_GET['week_count'])){
  $week_count = (int)$_GET['week_count'];
  $target_time = time() + $seconds_of_day * 7 * $week_count;
}else{
  $target_time = time();
}

if(isset($_SESSION['time_from_post'])){
  $target_time = $_SESSION['time_from_post'];
  $_SESSION['time_from_post'] = null;
  $present_time = time();
  $day_of_week = date('D', $present_time);
  $x = ($target_time - $present_time) / $seconds_of_day;
  if($day_of_week === 'Sun'){
    $week_count = floor(($x - 7) / 7) + 1;
   }
  if($day_of_week === 'Mon'){
    $week_count = floor(($x - 6) / 7) + 1;
   }
  if($day_of_week === 'Tue'){
    $week_count = floor(($x - 5) / 7) + 1;
   }
  if($day_of_week === 'Wed'){
    $week_count = floor(($x - 4) / 7) + 1;
   }
  if($day_of_week === 'Thu'){
    $week_count = floor(($x - 3) / 7) + 1;
   }
  if($day_of_week === 'Fri'){
    $week_count = floor(($x - 2) / 7) + 1;
  }
  if($day_of_week === 'Sat'){
   $week_count = floor(($x - 1) / 7) + 1;
  }
  


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


if(isset($_SESSION['user_id'])){
  if(empty($_GET['user_select']) && !isset($week_count) ){
    $_SESSION['user_select'] = 'all';
  }
}

if(isset($_GET['user_select'])){
  if($_GET['user_select'] === 'self'){
    $_SESSION['user_select'] = 'self';
  }else{
    $_SESSION['user_select'] ='all';
  }
}

if(isset($_SESSION['user_id']) && $_SESSION['user_select'] === 'self' ){
  $db = getDb();
  $stmt = $db->prepare('SELECT * FROM posts LEFT JOIN users ON posts.user_id = users.user_id WHERE posts.day in (?, ?, ?, ? ,? ,? ,?) AND posts.user_id = ? ORDER BY posts.time, posts.user_id ');
  $stmt->bindValue(1, $sun_detail);
  $stmt->bindValue(2, $mon_detail);
  $stmt->bindValue(3, $tue_detail);
  $stmt->bindValue(4, $wed_detail);
  $stmt->bindValue(5, $thu_detail);
  $stmt->bindValue(6, $fri_detail);
  $stmt->bindValue(7, $sat_detail);
  $stmt->bindValue(8, (int)$_SESSION['user_id'], PDO::PARAM_INT);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
}else{
  $db = getDb();
  $stmt = $db->prepare('SELECT * FROM posts LEFT JOIN users ON posts.user_id = users.user_id WHERE posts.day in (?, ?, ?, ? ,? ,? ,?)   ORDER BY posts.time, posts.user_id');
  $stmt->bindValue(1, $sun_detail);
  $stmt->bindValue(2, $mon_detail);
  $stmt->bindValue(3, $tue_detail);
  $stmt->bindValue(4, $wed_detail);
  $stmt->bindValue(5, $thu_detail);
  $stmt->bindValue(6, $fri_detail);
  $stmt->bindValue(7, $sat_detail);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
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
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@700&display=swap" rel="stylesheet">  
</head>
<body>

<nav class="navA">
<div class="container">
  <a href="index.php"><h1>MINI  THEATER  SCHEDULE</h1></a>
  <div class="sub">
    <ul>
      <a href="post.php"><li>投稿する</li></a>
      <a href="my_posts.php"><li>記録を見る</li></a>
      <?php if(empty($_SESSION['user_id'])) :?>
      <a href="login.php"><li>ログイン</li></a>
      <?php else: ?>
      <a href="logout.php"><li>ログアウト</li></a>
      <?php endif; ?>
    </ul>
  </div>
</div>
</nav>

<nav class="navB">
<div class="container">
  
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

  <?php if(isset($_SESSION['user_id'])): ?>
  <?php if($_SESSION['user_select'] === 'all'): ?>
  <a href="index.php?user_select=self<?php if(isset($week_count)){ echo '&week_count=' . ($week_count-1); } ?>">自分の投稿だけ見る</a>
  <?php else: ?>
  <a href="index.php?user_select=all<?php if(isset($week_count)){ echo '&week_count=' . ($week_count-1); } ?>">みんなの投稿を見る</a>
  <?php endif;?>
  <?php endif; ?>

</div>
</nav>

<section class="content">
  <section class="container">
    <div class="conA">
      <div class="day">
        <p><?= $sun; ?></p>
        <p><?= '日' ?></p>
      </div> 
      <div class="conB">

      <?php foreach($sun_records as $sun_record): ?>
      <article class="plan">
        <ul>
          <li class="title"><span class="fas fa-film"></span><?= $sun_record['title']; ?></li>
          <li class="format_time"><span class="far fa-clock"></span><?= $sun_record['format_time']; ?>〜</li> 
          <li><span class="place <?= $sun_record['color_of_place'] ?>">@<?= $sun_record['place']; ?></span></li>
          <li class="user_name">投稿者: <?= $sun_record['user_name']; ?></li>
          <?php if(isset($_SESSION['user_id']) && $sun_record['user_id'] === $_SESSION['user_id']): ?>
          <li><a href="delete_post.php?post_id=<?= $sun_record['post_id']; ?><?php if(isset($week_count)){ echo '&week_count=' . ($week_count-1);} ?>">削除</a></li>
          <?php endif; ?>
        </ul>
      </article>
      <?php endforeach; ?>

      </div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $mon; ?></p>
        <p><?= '月' ?></p>
      </div> 
      <div class="conB">

      <?php foreach($mon_records as $mon_record): ?>
      <article class="plan">
        <ul>
          <li class="title"><span class="fas fa-film"></span><?= $mon_record['title']; ?></li>
          <li class="format_time"><span class="far fa-clock"></span><?= $mon_record['format_time']; ?>〜</li> 
          <li><span class="place <?= $mon_record['color_of_place'] ?>">@<?= $mon_record['place']; ?></span></li>
          <li class="user_name">投稿者: <?= $mon_record['user_name']; ?></li>
          <?php if(isset($_SESSION['user_id']) && $mon_record['user_id'] === $_SESSION['user_id']): ?>
            <li><a href="delete_post.php?post_id=<?= $mon_record['post_id']; ?><?php if(isset($week_count)){ echo '&week_count=' . ($week_count-1);} ?>">削除</a></li>
          <?php endif; ?>
        </ul>
      </article>
      <?php endforeach; ?>

      </div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $tue; ?></p>
        <p><?= '火' ?></p>
      </div> 
      <div class="conB">
      
      <?php foreach($tue_records as $tue_record): ?>
      <article class="plan">
        <ul>
          <li class="title"><span class="fas fa-film"></span><?= $tue_record['title']; ?></li>
          <li class="format_time"><span class="far fa-clock"></span><?= $tue_record['format_time']; ?>〜</li> 
          <li><span class="place <?= $tue_record['color_of_place'] ?>">@<?= $tue_record['place']; ?></span></li>
          <li class="user_name">投稿者: <?= $tue_record['user_name']; ?></li>
          <?php if(isset($_SESSION['user_id']) && $tue_record['user_id'] === $_SESSION['user_id']): ?>
            <li><a href="delete_post.php?post_id=<?= $tue_record['post_id']; ?><?php if(isset($week_count)){ echo '&week_count=' . ($week_count-1);} ?>">削除</a></li>
          <?php endif; ?>
        </ul>
      </article>
      <?php endforeach; ?>
      
      </div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $wed; ?></p>
        <p><?= '水' ?></p>
      </div> 
      <div class="conB">

      <?php foreach($wed_records as $wed_record): ?>
      <article class="plan">
        <ul>
          <li class="title"><span class="fas fa-film"></span><?= $wed_record['title']; ?></li>
          <li class="format_time"><span class="far fa-clock"></span><?= $wed_record['format_time']; ?>〜</li> 
          <li><span class="place <?= $wed_record['color_of_place'] ?>">@<?= $wed_record['place']; ?></span></li>
          <li class="user_name">投稿者: <?= $wed_record['user_name']; ?></li>
          <?php if(isset($_SESSION['user_id']) && $wed_record['user_id'] === $_SESSION['user_id']): ?>
            <li><a href="delete_post.php?post_id=<?= $wed_record['post_id']; ?><?php if(isset($week_count)){ echo '&week_count=' . ($week_count-1);} ?>">削除</a></li>
          <?php endif; ?>
        </ul>
      </article>
      <?php endforeach; ?>

      </div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $thu; ?></p>
        <p><?= '木' ?></p>
      </div> 
      <div class="conB">

      <?php foreach($thu_records as $thu_record): ?>
      <article class="plan">
        <ul>
          <li class="title"><span class="fas fa-film"></span><?= $thu_record['title']; ?></li>
          <li class="format_time"><span class="far fa-clock"></span><?= $thu_record['format_time']; ?>〜</li> 
          <li><span class="place <?= $thu_record['color_of_place'] ?>">@<?= $thu_record['place']; ?></span></li>
          <li class="user_name">投稿者: <?= $thu_record['user_name']; ?></li>
          <?php if(isset($_SESSION['user_id']) && $thu_record['user_id'] === $_SESSION['user_id']): ?>
            <li><a href="delete_post.php?post_id=<?= $thu_record['post_id']; ?><?php if(isset($week_count)){ echo '&week_count=' . ($week_count-1);} ?>">削除</a></li>
          <?php endif; ?>
        </ul>
      </article>
      <?php endforeach; ?>

      </div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $fri; ?></p>
        <p><?= '金' ?></p>
      </div> 
      <div class="conB">

      <?php foreach($fri_records as $fri_record): ?>
      <article class="plan">
        <ul>
          <li class="title"><span class="fas fa-film"></span><?= $fri_record['title']; ?></li>
          <li class="format_time"><span class="far fa-clock"></span><?= $fri_record['format_time']; ?>〜</li> 
          <li><span class="place <?= $fri_record['color_of_place'] ?>">@<?= $fri_record['place']; ?></span></li>
          <li class="user_name">投稿者: <?= $fri_record['user_name']; ?></li>
          <?php if(isset($_SESSION['user_id']) && $fri_record['user_id'] === $_SESSION['user_id']): ?>
            <li><a href="delete_post.php?post_id=<?= $fri_record['post_id']; ?><?php if(isset($week_count)){ echo '&week_count=' . ($week_count-1);} ?>">削除</a></li>
          <?php endif; ?>
        </ul>
      </article>
      <?php endforeach; ?>

      </div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $sat; ?></p>
        <p><?= '土' ?></p>
      </div> 
      <div class="conB">

      <?php foreach($sat_records as $sat_record): ?>
      <article class="plan">
        <ul>
          <li class="title"><span class="fas fa-film"></span><?= $sat_record['title']; ?></li>
          <li class="format_time"><span class="far fa-clock"></span><?= $sat_record['format_time']; ?>〜</li> 
          <li><span class="place <?= $sat_record['color_of_place'] ?>">@<?= $sat_record['place']; ?></span></li>
          <li class="user_name">投稿者: <?= $sat_record['user_name']; ?></li>
          <?php if(isset($_SESSION['user_id']) && $sat_record['user_id'] === $_SESSION['user_id']): ?>
            <li><a href="delete_post.php?post_id=<?= $sat_record['post_id']; ?><?php if(isset($week_count)){ echo '&week_count=' . ($week_count-1);} ?>">削除</a></li>
          <?php endif; ?>
        </ul>
      </article>
      <?php endforeach; ?>

      </div>
    </div>
  </section>
</section>
<script src="https://kit.fontawesome.com/cee2db4d25.js" crossorigin="anonymous"></script>
</body>
</html>

