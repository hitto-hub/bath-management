<?php
    require_once 'function.php'; // functionファイル読み込み
    require_once 'conf.php';  // confファイル読み込み
    // confファイルからデータ取り出す
    $dbname = conf("dbname");
    $dbhost = conf("dbhost");
    $dbusername = conf("dbusername");
    $dbpassword = conf("dbpassword");
    $dbtable = conf("dbtable");
    session_start(); // セッションスタート
    $post_len = strlen($_POST["name"]); // $_POST["name"] の文字数を$post_lenに代入
    if (0 < $post_len) {
        echo '$_SESSION["data"] = $_POST["name"]<br>';
        $_SESSION["data"] = $_POST["name"];
    }
    array_pop($_POST); // $_POSTを Array ( ) にする
    if (empty($_SESSION["data"])) {
        // $_SESSION["data"]が空の時実行
        // リダイレクト処理
        // echo <<<date
        //     <br>
        //     <a href="./input.php">input</a>
        // date;
        header('Location: ./input.php');
        exit;
    } else {
        // データ挿入処理
        try{
            // (1)接続
            $db = new PDO("mysql:host=$dbhost;dbname=$dbname", "$dbusername", "$dbpassword");
            // (2) 挿入するデータを作成
            $id = session_id();
            $name = $_SESSION["data"];
            $time = date('Y-m-d H:i:s');
            // (2) SQLクエリ作成
            $stmt = $db->prepare("INSERT INTO $dbtable VALUES(?,?,?);");
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
        // echo <<<date
        //     <br>
        //     <a href="./index.php">index</a>
        // date;
        header('Location: ./index.php');
        exit;
    }

    deb();
    echo $time;
?>
