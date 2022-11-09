<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>セッションの値の生成</h1>
    <?php
        session_start(); // セッションスタート
        $post_len = strlen($_POST["name"]); // $_POST["name"] の文字数を$post_lenに代入
        if (0 < $post_len) {
            echo '$_POST["name"]に何かあったので$_SESSION["data"]に代入しました<br>';
            $_SESSION["data"] = $_POST["name"];
        }
        array_pop($_POST); // $_POSTを Array ( ) にする
        $session_len = strlen($_SESSION["data"]); // $_SESSION["data"] の文字数を$session_lenに代入
        if (empty($_SESSION["data"])) {
            // $_SESSION["data"]が空の時実行
            echo <<<DATA
            <form action="." method="POST">
            <p><b>名前</b></p>
            <input type="text" name="name" placeholder="例）山田太郎">
            <input type="submit" value="送信する">
            </form>
            DATA;
        } else {
            echo <<<DATA
            <br>
            <a href=./check-in.php>./check-in.phpへ</a>
            DATA;
            // ↑デバッグ用
            // ↓本番用
            // header('Location: ./check-in.php');
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
    <br>
    <!-- ↓本番時消すかも -->
    <a href="./reset.php">リセットボタン</a>
</body>

</html>