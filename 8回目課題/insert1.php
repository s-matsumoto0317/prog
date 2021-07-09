<?php
//1.POSTデータの取得

//まずindex.phpからデータを受け取る（この受け取ったデータをもとにbindvalueと結びつける）

$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//2.DB接続をする

try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

//データ登録SQL作成

$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw)VALUES(NULL, :name, :lid, :lpw)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//データ登録処理後

if ($status==false) {
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
} else {
  header("Location: index.php");
  exit;
}
