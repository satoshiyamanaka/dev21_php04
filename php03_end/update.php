<?php
session_start();
require_once('funcs.php');

//1. POSTデータ取得
$id = $_POST["id"];
$name = $_POST["name"];
$lid  = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];

$err = [];
if (!$_FILES['image']['name']) {
    $image = $_SESSION['img'];
} else {
    $image = date('YmdHis') . rtrim($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], 'picture/' . $image);
    $fileName = $_FILES['image']['name'];

    if (!empty($fileName)) {
        $check =  substr($fileName, -3);
        if ($check != 'jpg' && $check != 'gif' && $check != 'png') {
            $err[] = '写真の内容を確認してください。';
        } else {
            unlink('picture/' . $_SESSION['img']);
        }
    }
}

if (trim($_POST["name"]) === '') {
    $err[] = '名前を確認してください。';
}
if (trim($_POST["lid"]) === '') {
    $err[] = 'idを確認してください。';
}
if (trim($_POST["lpw"]) === '') {
    $err[] = 'PWを確認してください。';
}

if (count($err) > 0) {
    foreach ($err as $key => $val) {
        echo "<p>${val}</p>";
    }
    exit;
}

// 空白がなければ、$_POST["kanri_flg"]と、$_POST["life_flg"]をチェック
if (isset($_POST["kanri_flg"])) {
    $kanri_flg = 1;
} else {
    $kanri_flg = 0;
}

if (isset($_POST["life_flg"])) {
    $life_flg = 1;
} else {
    $life_flg = 0;
}

//2. DB接続します
$pdo = db_conn();
//３．データ登録SQL作成
// ↓横に長いので、改行してます。横に1列で書いてもokです。
$stmt = $pdo->prepare("UPDATE
                            gs_user_table_with_photo
                        SET
                            name = :name,
                            lid = :lid,
                            lpw = :lpw,
                            kanri_flg = :kanri_flg,
                            img = :img
                        WHERE
                            id = :id;
                        ");
$stmt->bindValue(':name', h($name), PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', h($lid), PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', h($lpw), PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', h($kanri_flg), PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':img', h($image), PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', h($id), PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
} else {
    redirect("select.php?id=${id}&success=1");
}
