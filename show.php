<?php
    echo <<<date
    <p>今日入った人</p>
    date;
    try{
        // (1)接続
        $db = new PDO('mysql:host=localhost;dbname=bath_data_base', 'root', 'Abc445566@');
        // (2) SQLクエリ作成
        $time = date('Y-m-d');
        $stmt = $db->prepare("SELECT * FROM member WHERE time LIKE '$time %';");
        // (3) SQLクエリ実行
        $res = $stmt->execute();
        if($res) {
            // (4) 該当するデータを取得
            $all = $stmt->fetchAll();
            echo "<table>";
            echo  <<< date
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
        $db = new PDO('mysql:host=localhost;dbname=bath_data_base', 'root', 'Abc445566@');
        // (2) SQLクエリ作成
        $stmt = $db->prepare("SELECT * FROM member;");
        // (3) SQLクエリ実行
        $res = $stmt->execute();
        if($res) {
            // (4) 該当するデータを取得
            $all = $stmt->fetchAll();
            echo "<table>";
            echo  <<< date
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
        }
        // 切断
        $db = null;
    } catch(PDOException $e){
        echo "データベース接続失敗<br>";
        echo $e->getMessage();
    }
    ?>
