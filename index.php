<?php

$day_second = 86400;

if(empty($_GET)){
  $timestamp = time();
}


if(!empty($_GET)){
  $week_count = $_GET['week_count'];
  $timestamp = time() + $day_second * 7 * $week_count;
}


$w = date("w",$timestamp);

if($w == 0){
  $sun = date('n/j', $timestamp);
  $mon = date('n/j', $timestamp + $day_second);
  $tue = date('n/j', $timestamp + (2 * $day_second));
  $wed = date('n/j', $timestamp + (3 * $day_second));
  $thu = date('n/j', $timestamp + (4 * $day_second));
  $fri = date('n/j', $timestamp + (5 * $day_second));
  $sat = date('n/j', $timestamp + (6 * $day_second));
}

if($w == 1){
  $sun = date('n/j', $timestamp - $day_second);
  $mon = date('n/j', $timestamp);
  $tue = date('n/j', $timestamp + $day_second);
  $wed = date('n/j', $timestamp + (2 * $day_second));
  $thu = date('n/j', $timestamp + (3 * $day_second));
  $fri = date('n/j', $timestamp + (4 * $day_second));
  $sat = date('n/j', $timestamp + (5 * $day_second));
}

if($w == 2){
  $sun = date('n/j', $timestamp - (2 * $day_second));
  $mon = date('n/j', $timestamp - $day_second);
  $tue = date('n/j', $timestamp);
  $wed = date('n/j', $timestamp + $day_second);
  $thu = date('n/j', $timestamp + (2 * $day_second));
  $fri = date('n/j', $timestamp + (3 * $day_second));
  $sat = date('n/j', $timestamp + (4 * $day_second));
}

if($w == 3){
  $sun = date('n/j', $timestamp - (3 * $day_second));
  $mon = date('n/j', $timestamp - (2 * $day_second));
  $tue = date('n/j', $timestamp - $day_second );
  $wed = date('n/j', $timestamp);
  $thu = date('n/j', $timestamp + $day_second);
  $fri = date('n/j', $timestamp + (2 * $day_second));
  $sat = date('n/j', $timestamp + (3 * $day_second));
}

if($w == 4){
  $sun = date('n/j', $timestamp - (4 * $day_second));
  $mon = date('n/j', $timestamp - (3 * $day_second));
  $tue = date('n/j', $timestamp - (2 * $day_second ));
  $wed = date('n/j', $timestamp - $day_second);
  $thu = date('n/j', $timestamp);
  $fri = date('n/j', $timestamp + $day_second);
  $sat = date('n/j', $timestamp + (2 * $day_second));
}

if($w == 5){
  $sun = date('n/j', $timestamp - (5 * $day_second));
  $mon = date('n/j', $timestamp - (4 * $day_second));
  $tue = date('n/j', $timestamp - (3 * $day_second ));
  $wed = date('n/j', $timestamp - (2 * $day_second));
  $thu = date('n/j', $timestamp - $day_second);
  $fri = date('n/j', $timestamp);
  $sat = date('n/j', $timestamp + $day_second);
}

if($w == 5){
  $sun = date('n/j', $timestamp - (6 * $day_second));
  $mon = date('n/j', $timestamp - (5 * $day_second));
  $tue = date('n/j', $timestamp - (4 * $day_second ));
  $wed = date('n/j', $timestamp - (3 * $day_second));
  $thu = date('n/j', $timestamp - (2 * $day_second));
  $fri = date('n/j', $timestamp - $day_second);
  $sat = date('n/j', $timestamp);
}

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

<nav class="navA">
<div class="container">
  <h1>MINI THEATER SCHEDULE</h1>
  <div class="sub">
    <ul>
      <a href=""><li>投稿する</li></a>
      <a href=""><li>記録を見る</li></a>
      <a href=""><li>ログアウト</li></a>
    </ul>
  </div>
</div>
</nav>

<nav class="navB">
  <a href="practice.php?week_count=
    <?php if(isset($week_count)){
      $week_count --;
      echo "$week_count";
    }else{
      echo "-1";
    }
    ?>"><span class="fa fa-angle-double-left"></span>前の週へ</a>


  <a href="practice.php?week_count=
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
      <div class="conB"></div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $mon; ?></p>
        <p><?= '月' ?></p>
      </div> 
      <div class="conB"></div>
    </div>
    <div class="conA">
      <div class="day">
        <p><?= $tue; ?></p>
        <p><?= '火' ?></p>
      </div> 
      <div class="conB"></div>
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
