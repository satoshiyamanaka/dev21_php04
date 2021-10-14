

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブックマーク登録</title>
    <style>
        form {
            text-align: center;
            padding: 10px;
            font-size: 16px;
            max-width: 600px;
            margin-left: auto;
    margin-right: auto;
        }

        .footer {
            background-color: yellow;
            margin:10px auto;
            padding-top: 20px;
            padding-bottom: 20px;
            max-width: 200px;
            font-size: 20px;
            text-align: center;
        }
    </style>

</head>
<body>
    <header>
        <a href="login.php">ログイン画面へ</a>
    </header>

    <form id="form" method="POST" action="bookinsert.php">
    
            <fieldset>
                <legend>読書内容を登録して共有しよう</legend>
                <label>書籍名 : <input type="text" name="name"></label><br>
                <label>書籍URL: <input type="text" name="url"></label><br>
                <label>書籍内容: <textArea name="content" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>

    </form>

    <footer>

    <div class="footer"><a href="bookselect.php">ブックマーク一覧</a></div>

    </footer>
    
</body>
</html>
