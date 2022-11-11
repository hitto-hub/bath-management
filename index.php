<?php
    session_start(); // セッションスタート
    $session_len = strlen($_SESSION["data"]); // $_SESSION["data"] の文字数を$session_lenに代入
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
            <a href="./update.php">index</a>
            date;
        // header('Location: ./update.php');
        // exit;
    }
    echo "<br>";
    echo 'session id：' . session_id();
    echo "<br>";
    echo "SESSION：";
    print_r($_SESSION);
    echo "<br>";
    echo "POST：";
    print_r($_POST);
    echo "<br>";
?>
