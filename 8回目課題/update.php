<?php
//1. POSTデータ取得
//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
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
$id = $_POST["id"];
//2. DB接続します xxxにDB名を入力する
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
// mamppの方は
// $pdo = new PDO('mysql:dbname=xxx;charset=utf8;host=localhost', 'root', 'root');
try {
    $pdo = new PDO('mysql:dbname=kakeibo_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}
//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$stmt = $pdo->prepare("UPDATE nyuusyukkin_table SET date=:date, kyuuyo=:kyuuyo,
syokuhi=:syokuhi, nitiyouhinn=:nitiyouhinn, syumigoraku=:syumigoraku, kousaihi=:kousaihi, koutuuhi=:koutuuhi,
ifukubiyou=:ifukubiyou, kennkouiryou=:kennkouiryou, kyuuyokyouiku=:kyuuyokyouiku, suidoukounetuhi=:suidoukounetuhi, tuushinhi=:tuushinhi,
zyuutaku=:zyuutaku, zeisyakaihosyou=:zeisyakaihosyou, hokenn=:hokenn, sonota'=:sonota' WHERE id=:id");
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
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    header("Location: select.php");
    exit;
}
