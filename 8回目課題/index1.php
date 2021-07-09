<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>家計簿アプリ</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">家計簿一覧</a></div>
    </div>
  </nav>

</header>

<!--ここからinsert.phpへデータを流す-->

<form method="post" action="insert1.php">
  <div class="jumbtron">
    <fieldset>
    <legend>会員登録フォーム</legend>
      <label>氏名：<input type="text" name="name"></label><br>
      <label>ID：<input type="text" name="lid"></label><br>
      <label>PW：<input type="text" name="lpw"></label><br>
      <input type="submit" value="登録">
      <p>すでに登録済みの方は<a href="login.php">こちら</a></p>
    </fieldset>
  </div>
</form>

</body>
</html>
