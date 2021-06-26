<?php
try {
    $db = new PDO('mysql:dbname=mydb;charset=utf8;host=localhost', 'root', 'root');
}   catch (PDOException $e) {
    echo "データベース接続エラー　：".$e->getMessage();
}
?>
