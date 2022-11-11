<?php
    session_start(); // セッションスタート
    if (empty($_SESSION["data"])) {
        // $_SESSION["data"]が空の時実行
        echo <<<DATA
            <form action="./judge.php" method="POST">
            <p><b>名前</b></p>
            <input type="text" name="name" placeholder="例）山田太郎">
            <input type="submit" value="送信する">
            </form>
        DATA;
    }
?>
