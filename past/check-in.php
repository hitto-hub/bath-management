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
        session_start();
        echo "<p>セッションID:" . session_id() . "</p>";
        echo "<p>設定した値:{$_SESSION["data"]}</p>";
        print_r($_SESSION);
        echo "<br>";
    ?>
    <a href="./index.php">indexへもどる</a>
    <br>
    <a href="./reset.php">リセットボタン</a>
</body>

</html>
