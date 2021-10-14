<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn()
function db_conn()
{
    try {
        $db_name = "gs_db4";    //データベース名
        $db_host = "localhost"; //DBホスト
        $db_id   = "root";      //アカウント名
        $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        // このリターンが重要
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt)
{
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}

// ログインチェク処理 loginCheck();これをselect.phpに記述しておいて、ログインOK→セレクト見れる　にする
// もしログインID持ってればtrue , もってなければログインエラーにする！
function loginCheck(){

    if($_SESSION['chk_ssid']==session_id()){  #session_id()空白だと今持ってるIDをチェック

        session_regenerate_id(true);  #IDあってるなら更新されますよ
        $_SESSION['chk_ssid']=session_id(); #あらためて
    }
    else
    {    #ID持ってないならば
    exit("LOGIN ERROR");
    }

}