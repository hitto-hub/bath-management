<?php
    require_once 'conf.php';  // confファイル読み込み
    // confファイルからデータ取り出す
    $dbname = conf("dbname");
    $dbhost = conf("dbhost");
    $dbusername = conf("dbusername");
    $dbpassword = conf("dbpassword");
    $dbtable = conf("dbtable");
    session_start(); // セッションスタート
    // データ挿入処理
    try{
        // (1)接続
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", "$dbusername", "$dbpassword");
        // (2) 挿入するデータを作成
        $id = session_id();
        $name = $_SESSION["data"];
        $time = date('Y-m-d H:i:s');
        // (2) SQLクエリ作成
        $stmt = $db->prepare("UPDATE $dbtable SET name=?, time=? WHERE id = ?;");
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $stmt->bindParam(2, $time, PDO::PARAM_STR);
        $stmt->bindParam(3, $id, PDO::PARAM_STR);
        // (3) SQLクエリ実行
        $res = $stmt->execute();
        // 切断
        $db = null;
        // リダイレクト処理
        // echo <<<date
        //     <br>
        //     <a href="./success.php">success</a>
        // date;
        header('Location: ./success.php');
        exit;
    } catch(PDOException $e){
        echo "データベース接続失敗<br>";
        echo $e->getMessage();
        // リダイレクト処理
        // echo <<<date
        //     <br>
        //     <a href="./reset.php">reset</a>
        // date;
        header('Location: ./reset.php');
        exit;
    }
?>
