<?php

$id = $GET["id"];

try {
    $pdo = new PDO('mysql:dbname=kakeibo_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

$sql = "SELECT * FROM nyuusyukkin_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

$view="";
if ($status==false) {
  $error = $stmt->errorinfo();
  exit("ErrorQuery:".$error[2]);
} else {
  $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>入出金登録フォーム</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">家計簿一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->
<!-- Main[Start] -->
<!-- ここからupdate.phpにデータを送ります -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <legend>入出金登録フォーム</legend>
      <label>日付：<input type="date" name="date"></label><br>
      <label>給与：<input type="number" name="kyuuyo"></label><br>
      <label>食費：<input type="number" name="syokuhi"></label><br>
      <label>日用品：<input type="number" name="nitiyouhinn"></label><br>
      <label>趣味・娯楽：<input type="number" name="syumigoraku"></label><br>
      <label>交際費：<input type="number" name="kousaihi"></label><br>
      <label>交通費：<input type="number" name="koutuuhi"></label><br>
      <label>衣服・美容：<input type="number" name="ifukubiyou"></label><br>
      <label>健康・医療：<input type="number" name="kennkouiryou"></label><br>
      <label>教養・教育：<input type="number" name="kyuuyokyouiku"></label><br>
      <label>水道・光熱費：<input type="number" name="suidoukounetuhi"></label><br>
      <label>通信費：<input type="number" name="tuushinhi"></label><br>
      <label>住宅：<input type="number" name="zyuutaku"></label><br>
      <label>税・社会保障：<input type="number" name="zeisyakaihosyou"></label><br>
      <label>保険：<input type="number" name="hokenn"></label><br>
      <label>その他：<input type="number" name="sonota"></label><br>
     <input type='hidden' name="id" value="<?=$row["id"]?>">
     <input type="submit" value="更新">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
