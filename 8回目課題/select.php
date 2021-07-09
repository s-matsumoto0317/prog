<?php

//sessionスタートしてセッションを利用できるようにする
session_start();

echo $_SESSION["name"];

//sessionチェック

if (
  !isset($_SESSION['chk_ssid']) ||
  $_SESSION["chk_ssid"] != session_id()
) {
  echo "login Error";
  exit();
}

//1.DB接続

try {
    $pdo = new PDO('mysql:dbname=kakeibo_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

//2.データ登録SQL作成

$stmt = $pdo->prepare("SELECT * FROM nyuusyukkin_table");
$status = $stmt->execute();

//3.データ表示

$view="";
if ($status==false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
} else {
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= "<p>";
    $view .= '<a href="detail.php?id='.$result["id"].'">';
    $view .= $result["id"]."\n".$result["kyuuyo"]."\n".$result["syokuhi"]."\n".$result["nitiyouhinn"]."\n".$result["syumigoraku"]."\n".$result["kousaihi"]."\n".$result["koutuuhi"]."\n".$result["ifukubiyou"]."\n".$result["kennkouiryou"]."\n".$result["kyuuyokyouiku"]."\n".$result["suidoukounetuhi"]."\n".$result["tuushinhi"]."\n".$result["zyuutaku"]."\n".$result["zeisyakaihosyou"]."\n".$result["hokenn"]."\n".$result["sonota"];
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
      <a class="navbar-brand" href="index.php">入出金登録フォーム</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a>
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
