<?php
    session_start(); // セッションスタート
    $post_len = strlen($_POST["name"]); // $_POST["name"] の文字数を$post_lenに代入
    if (0 < $post_len) {
        echo '$_POST["name"]に何かあったので$_SESSION["data"]に代入しました<br>';
        $_SESSION["data"] = $_POST["name"];
    }
    array_pop($_POST); // $_POSTを Array ( ) にする
    if (empty($_SESSION["data"])) {
        // $_SESSION["data"]が空の時実行
        // リダイレクト処理
        echo <<<date
        <br>
        <a href="./input.php">input</a>
        date;
        // header('Location: ./input.php');
        // exit;
    } else {
        // データ挿入処理
        try{
            // (1)接続
            $db = new PDO('mysql:host=localhost;dbname=bath_data_base', 'root', 'Abc445566@');
            // (2) 挿入するデータを作成
            $id = session_id();
            $name = $_SESSION["data"];
            $time = date('Y-m-d H:i:s');
            // (2) SQLクエリ作成
            $stmt = $db->prepare("INSERT INTO member VALUES(?,?,?);");
            $stmt->bindParam(1, $id, PDO::PARAM_STR);
            $stmt->bindParam(2, $name, PDO::PARAM_STR);
            $stmt->bindParam(3, $time, PDO::PARAM_STR);
            // (3) SQLクエリ実行
            $res = $stmt->execute();
            // 切断
            $db = null;
        } catch(PDOException $e){
            echo "データベース接続失敗<br>";
            echo $e->getMessage();
            // 別に失敗してもいい
            // 大まかな失敗する条件 -> 2回目以降のアクセスでsession_idはそのままで$_SESSION["date"]だけなくなっているときに起こる
            // 大まかな失敗する理由 -> 既にデータベースサーバーにsession_idが登録されている。
            //                       $_SESSION["date"] に新しい名前が入っているのでupdate.phpに任せる
        }
        // リダイレクト処理
        echo <<<date
        <br>
        <a href="./index.php">index</a>
        date;
        // header('Location: ./index.php');
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

    echo $time;
?>
