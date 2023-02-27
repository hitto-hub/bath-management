<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/bootstrap/css/main.css">
    <!-- <title>Document</title> -->
</head>
<body>
<?php
    require_once 'function.php'; // functionファイル読み込み
    require_once 'conf.php'; // confファイル読み込み
    // confファイルからデータ取り出す
    $dbname = conf("dbname");
    $dbhost = conf("dbhost");
    $dbusername = conf("dbusername");
    $dbpassword = conf("dbpassword");
    $dbtable = conf("dbtable");
    session_start(); // セッションスタート
    echo "success!!<br>";
    echo "以下のように保存されました。<br>";
    try{
        // (1)接続
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", "$dbusername", "$dbpassword");
        // (2) 挿入するデータを作成
        $id = session_id();
        // (3) SQLクエリ作成
        $stmt = $db->prepare("SELECT * FROM $dbtable WHERE id = ?;");
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
    if ($loop == "") {
        header('Location: ./reset.php');
        exit;
    }

    // showだったもの
    echo <<<date
    <h2>記録されたデータ</h2>
    <p>今日入った人</p>
    date;
    try{
        // (1)接続
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", "$dbusername", "$dbpassword");
        // (2) SQLクエリ作成
        $time = date('Y-m-d');
        $stmt = $db->prepare("SELECT * FROM $dbtable WHERE time LIKE '$time %';");
        // (3) SQLクエリ実行
        $res = $stmt->execute();
        if($res) {
            // (4) 該当するデータを取得
            $all = $stmt->fetchAll();
            
            echo  <<< date
            <div class="table-responsive">
            <table class="table align-middle">
                <tr>
                <th>id</th>
                <th>name</th>
                <th>time</th>
                </tr>
            date;
            foreach($all as $loop){
                // (5) 結果を表示
                echo "<tr>";
                echo "<td>" . $loop["id"] . "&nbsp;&nbsp;&nbsp;" . "</td>";
                echo "<td>" .$loop["name"] . "&nbsp;&nbsp;&nbsp;" . "</td>";
                echo "<td>" .$loop["time"] . "&nbsp;&nbsp;&nbsp;" . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        // 切断
        $db = null;
    } catch(PDOException $e){
        echo "データベース接続失敗<br>";
        echo $e->getMessage();
    }

    // 一覧表示
    echo <<<date
    <p>入った人履歴</p>
    date;
    try{
        // (1)接続
        $db = new PDO("mysql:host=$dbhost;dbname=$dbname", "$dbusername", "$dbpassword");
        // (2) SQLクエリ作成
        $stmt = $db->prepare("SELECT * FROM $dbtable;");
        // (3) SQLクエリ実行
        $res = $stmt->execute();
        if($res) {
            // (4) 該当するデータを取得
            $all = $stmt->fetchAll();
            echo  <<< date
            <div class="table-responsive">
            <table class="table align-middle">
                <tr>
                <th>id</th>
                <th>name</th>
                <th>time</th>
                </tr>
            date;
            foreach($all as $loop){
                // (5) 結果を表示
                echo "<tr>";
                echo "<td>" . $loop["id"] . "&nbsp;&nbsp;&nbsp;" . "</td>";
                echo "<td>" .$loop["name"] . "&nbsp;&nbsp;&nbsp;" . "</td>";
                echo "<td>" .$loop["time"] . "&nbsp;&nbsp;&nbsp;" . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        // 切断
        $db = null;
    } catch(PDOException $e){
        echo "データベース接続失敗<br>";
        echo $e->getMessage();
    }

?>
</body>
</html>
