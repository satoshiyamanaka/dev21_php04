<!-- エラー探し これはデプロイしたらけして -->
<?php

session_start();

ini_set("display_errors", 1);
error_reporting(E_ALL);
?>

<?php

/** index.phpからPOSTメソッドでinsert.phpにデータを飛ばしたから受け取り処理をするのがinsert.php
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
$name = $_POST['name'];
$url = $_POST['url'];
$content = $_POST['content'];

//2. DB接続します PDOを使ってSQL接続！接続のためのおまじないです MAMPの場合root,root
try {
  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意  MYSQLに：で変数を挿入している
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, name, url, content, date)VALUES(NULL, :name, :url, :content, sysdate())");

//  2. バインド変数を用意 直接インサートできないから、バインド「変数」で挿入
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':content', $content, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header('Location: bookindex.php');


}
?>
