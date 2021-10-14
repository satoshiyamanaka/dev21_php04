<?PHP

session_start();


// hでかこったものにはすぺしゃるきゃらすして保護します。スクリプトタブも文字列で表示されるようにする
function h ($str){
  return htmlspecialchars($str , ENT_QUOTES);
}
?>


<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成　SQL分を書いてください"この中"。
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる [.=]で追加していける
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p>";
    $view .= h($result['date']) . '/' . h($result['name']) . '/' . h($result['url']) . '/' . h($result['content']);
    $view .= "</p>";
  }

}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>読書データ登録閲覧</title>
  <style>
    body{
      max-width: 1200px;
      text-align: center;
    }
    .reverse{
      background-color: #fcfcfc;
      margin:10px auto;
      padding-top: 20px;
      padding-bottom: 20px;
      max-width: 200px;
      font-size: 20px;
      text-align: center;
    }
    .container{
      max-width: 600px;
      text-align: center;
    }

  </style>

</head>
<body>
  <header>

  <a class="reverse" href="bookindex.php">ブックマークデータ登録画面へ戻る</a>

  </header>


<div class="container"><?= $view ?></div>

  
</body>
</html>
