<?php
    // require_once 'conf.php';  // confファイル読み込み
    // // confファイルからデータ取り出す
    // $dbname = conf("dbname");
    // $dbhost = conf("dbhost");
    // $dbusername = conf("dbusername");
    // $dbpassword = conf("dbpassword");
    // $dbtable = conf("dbtable");
    // echo <<<date
    // <h2>記録されたデータ</h2>
    // <p>今日入った人</p>
    // date;
    // try{
    //     // (1)接続
    //     $db = new PDO("mysql:host=$dbhost;dbname=$dbname", "$dbusername", "$dbpassword");
    //     // (2) SQLクエリ作成
    //     $time = date('Y-m-d');
    //     $stmt = $db->prepare("SELECT * FROM $dbtable WHERE time LIKE '$time %';");
    //     // (3) SQLクエリ実行
    //     $res = $stmt->execute();
    //     if($res) {
    //         // (4) 該当するデータを取得
    //         $all = $stmt->fetchAll();
    //         echo "<table>";
    //         echo  <<< date
    //             <tr>
    //             <th>id</th>
    //             <th>name</th>
    //             <th>time</th>
    //             </tr>
    //         date;
    //         foreach($all as $loop){
    //             // (5) 結果を表示
    //             echo "<tr>";
    //             echo "<td>" . $loop["id"] . "&nbsp;&nbsp;&nbsp;" . "</td>";
    //             echo "<td>" .$loop["name"] . "&nbsp;&nbsp;&nbsp;" . "</td>";
    //             echo "<td>" .$loop["time"] . "&nbsp;&nbsp;&nbsp;" . "</td>";
    //             echo "</tr>";
    //         }
    //         echo "</table>";
    //     }
    //     // 切断
    //     $db = null;
    // } catch(PDOException $e){
    //     echo "データベース接続失敗<br>";
    //     echo $e->getMessage();
    // }
    // 
    // // 一覧表示
    // echo <<<date
    // <p>入った人履歴</p>
    // date;
    // try{
    //     // (1)接続
    //     $db = new PDO("mysql:host=$dbhost;dbname=$dbname", "$dbusername", "$dbpassword");
    //     // (2) SQLクエリ作成
    //     $stmt = $db->prepare("SELECT * FROM $dbtable;");
    //     // (3) SQLクエリ実行
    //     $res = $stmt->execute();
    //     if($res) {
    //         // (4) 該当するデータを取得
    //         $all = $stmt->fetchAll();
    //         echo "<table>";
    //         echo  <<< date
    //             <tr>
    //             <th>id</th>
    //             <th>name</th>
    //             <th>time</th>
    //             </tr>
    //         date;
    //         foreach($all as $loop){
    //             // (5) 結果を表示
    //             echo "<tr>";
    //             echo "<td>" . $loop["id"] . "&nbsp;&nbsp;&nbsp;" . "</td>";
    //             echo "<td>" .$loop["name"] . "&nbsp;&nbsp;&nbsp;" . "</td>";
    //             echo "<td>" .$loop["time"] . "&nbsp;&nbsp;&nbsp;" . "</td>";
    //             echo "</tr>";
    //         }
    //         echo "</table>";
    //     }
    //     // 切断
    //     $db = null;
    // } catch(PDOException $e){
    //     echo "データベース接続失敗<br>";
    //     echo $e->getMessage();
    // }
?>
