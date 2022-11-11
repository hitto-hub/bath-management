<?php
    session_start(); // セッションスタート
    // データ挿入処理
    try{
        // (1)接続
        $db = new PDO('mysql:host=localhost;dbname=bath_data_base', 'root', 'Abc445566@');
        // (2) 挿入するデータを作成
        $id = session_id();
        $name = $_SESSION["data"];
        $time = date('Y-m-d H:i:s');
        // (2) SQLクエリ作成
        // UPDATE school.student SET name="山口太郎" WHERE id = 1001;
        $stmt = $db->prepare("UPDATE member SET name=?, time=? WHERE id = ?;");
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
