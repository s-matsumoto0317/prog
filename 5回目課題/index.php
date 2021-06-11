<?php

// じゃんけんに見立てて0~2までのランダムな数字を各変数にセット
$taro   = rand(0, 2);
$hanako = rand(0, 2);

// 各数字をキーにしたじゃんけんの手を配列に格納し、各自の出した手として出力
$hand = array(0 => 'グー', 1 => 'チョキ', 2 => 'パー');
echo '太郎：' . "[{$taro}] " . $hand[$taro] . '<br>';
echo '花子：' . "[{$hanako}] " . $hand[$hanako] . '<br>';

/**
 * 太郎の勝利パターンを数式化して勝敗を出力
 * 1: ($taro - $hanako + 3) % 3 = 0 の時は、あいこ
 * 2: ($taro - $hanako + 3) % 3 = 2 の時は、太郎の勝利
 * 3: ($taro - $hanako + 3) % 3 = 1 の時は、花子の勝利
 */
$judge = ($taro - $hanako + 3) % 3;
if($judge == 0) {
    echo '勝敗：あいこ';
}
else {
    echo $judge == 2 ? '勝敗：太郎の勝ち' : '勝敗：花子の勝ち';
}

?>
