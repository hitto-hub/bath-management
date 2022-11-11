<?php
    require_once 'function.php'; // functionファイル読み込み
    session_start(); // セッションスタート
    echo "success!!<br>";
    echo "以下のように保存されました。<br>";
    try{
        // (1)接続
        $db = new PDO('mysql:host=localhost;dbname=bath_data_base', 'root', 'Abc445566@');
        // (2) 挿入するデータを作成
        $id = session_id();
        // (3) SQLクエリ作成
        $stmt = $db->prepare("SELECT * FROM member WHERE id = ?;");
        $stmt->bindParam(1, $id, PDO::PARAM_STR);
        // (4) SQLクエリ実行
        $res = $stmt->execute();
        if($res) {
            // (5) 該当するデータを取得
            $all = $stmt->fetchAll();
            foreach($all as $loop){
                // (6) 結果を表示
                // echo "id&nbsp;=&nbsp;".$loop["id"];
                echo "&nbsp;名前&nbsp;=&nbsp;".$loop["name"]."<br>";
                echo "&nbsp;記録された時間&nbsp;=&nbsp;".$loop["time"]."<br>";
            }
        }
        // 切断
        $db = null;
    } catch(PDOException $e){
        echo "データベース接続失敗<br>";
        echo $e->getMessage();
    }
?>
