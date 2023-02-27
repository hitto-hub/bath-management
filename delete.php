<?php
    require_once 'conf.php';  // confファイル読み込み
    // confファイルからデータ取り出す
    $dbname = conf("dbname");
    $dbhost = conf("dbhost");
    $dbusername = conf("dbusername");
    $dbpassword = conf("dbpassword");
    $dbtable = conf("dbtable");

    try{
        // (1)接続
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", "$dbusername", "$dbpassword");
        // (2) SQLクエリ作成
        $stmt = $db->prepare("DELETE FROM $dbtable WHERE id = '$_GET[id]';");
        // (3) SQLクエリ実行
        $res = $stmt->execute();
        if($res) {
            echo "success!!";
        }
        // 切断
        $db = null;
    } catch(PDOException $e){
        echo "データベース接続失敗<br>";
        echo $e->getMessage();
    }
    header('Location: ./setting.php');
