<?php

try {
    $pdo = new PDO('mysql:dbname=kakeibo_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

$stmt = $pdo->prepare("SELECT * FROM nyuusyukkin_table");
$status = $stmt->execute();

$view="";
if ($status==false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
} else {
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= "<p>";
    $view .= '<a href="detail.php?id='.$result["id"].'">';
    $view .= $result["id"].":".$result["kyuuyo"].":".$result["syokuhi"].":".$result["nitiyouhinn"].":".$result["syumigoraku"].":".$result["kousaihi"].":".$result["koutuuhi"].":".$result["ifukubiyou"].":".$result["kennkouiryou"].":".$result["kyuuyokyouiku"].":".$result["suidoukounetuhi"].":".$result["tuushinhi"].":".$result["zyuutaku"].":".$result["zeisyakaihosyou"].":".$result["hokenn"].":".$result["sonota"];
    $view .='</a>';

    // 隙間を開ける
        $view .= '       ';
        // 削除用のaタグ
        $view .= '<a href="delete.php?id='.$result["id"].'">';
        $view .= "削除";
        $view .= '</a>';
        $view .= "</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="idth=device-idth, initial-scale=1">
<title>一覧表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">家計簿一覧</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->
<!-- Main[Start] $view-->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->
</body>
</html>
