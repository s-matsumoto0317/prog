<?php
//1.POSTデータの取得

//まずindex.phpからデータを受け取る（この受け取ったデータをもとにbindvalueと結びつける）

$date = $_POST["date"];
$kyuuyo = $_POST["kyuuyo"];
$syokuhi = $_POST["syokuhi"];
$nitiyouhinn = $_POST["nitiyouhinn"];
$syumigoraku = $_POST["syumigoraku"];
$kousaihi = $_POST["kousaihi"];
$koutuuhi = $_POST["koutuuhi"];
$ifukubiyou = $_POST["ifukubiyou"];
$kennkouiryou = $_POST["kennkouiryou"];
$kyuuyokyouiku = $_POST["kyuuyokyouiku"];
$suidoukounetuhi = $_POST["suidoukounetuhi"];
$tuushinhi = $_POST["tuushinhi"];
$zyuutaku = $_POST["zyuutaku"];
$zeisyakaihosyou = $_POST["zeisyakaihosyou"];
$hokenn = $_POST["hokenn"];
$sonota = $_POST["sonota"];

//2.DB接続をする

try {
    $pdo = new PDO('mysql:dbname=kakeibo_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

//データ登録SQL作成

$stmt = $pdo->prepare("INSERT INTO nyuusyukkin_table(id, date, kyuuyo, syokuhi, nitiyouhinn,
syumigoraku, kousaihi, koutuuhi, ifukubiyou, kennkouiryou, kyuuyokyouiku, suidoukounetuhi,
tuushinhi, zyuutaku, zeisyakaihosyou, hokenn, sonota )VALUES(NULL, :date, :kyuuyo, :syokuhi, :nitiyouhinn,
:syumigoraku, :kousaihi, :koutuuhi, :ifukubiyou, :kennkouiryou, :kyuuyokyouiku, :suidoukounetuhi,
:tuushinhi, :zyuutaku, :zeisyakaihosyou, :hokenn, :sonota)");
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':kyuuyo', $kyuuyo, PDO::PARAM_INT);
$stmt->bindValue(':syokuhi', $syokuhi, PDO::PARAM_INT);
$stmt->bindValue(':nitiyouhinn', $nitiyouhinn, PDO::PARAM_INT);
$stmt->bindValue(':syumigoraku', $syumigoraku, PDO::PARAM_INT);
$stmt->bindValue(':kousaihi', $kousaihi, PDO::PARAM_INT);
$stmt->bindValue(':koutuuhi', $koutuuhi, PDO::PARAM_INT);
$stmt->bindValue(':ifukubiyou', $ifukubiyou, PDO::PARAM_INT);
$stmt->bindValue(':kennkouiryou', $kennkouiryou, PDO::PARAM_INT);
$stmt->bindValue(':kyuuyokyouiku', $kyuuyokyouiku, PDO::PARAM_INT);
$stmt->bindValue(':suidoukounetuhi', $suidoukounetuhi, PDO::PARAM_INT);
$stmt->bindValue(':tuushinhi', $tuushinhi, PDO::PARAM_INT);
$stmt->bindValue(':zyuutaku', $zyuutaku, PDO::PARAM_INT);
$stmt->bindValue(':zeisyakaihosyou', $zeisyakaihosyou, PDO::PARAM_INT);
$stmt->bindValue(':hokenn', $hokenn, PDO::PARAM_INT);
$stmt->bindValue(':sonota', $sonota, PDO::PARAM_INT);
$status = $stmt->execute();

//データ登録処理後

if ($status==false) {
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
} else {
  header("Location: select.php");
  exit;
}
