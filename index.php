<?php
    require_once 'function.php'; // functionファイル読み込み
    session_start(); // セッションスタート
    if (empty($_SESSION["data"])) {
        // $_SESSION["data"]が空の時実行
        echo <<<date
            <br>
            <a href="./input.php">input</a>
            date;
        // header('Location: ./input.php');
        // exit;
    } else {
        // リダイレクト処理
        echo <<<date
            <br>
            <a href="./update.php">update</a>
        date;
        // header('Location: ./update.php');
        // exit;
    }
    deb();
?>
