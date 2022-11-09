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
        session_destroy();
        header('Location: ./index.php'); //リダイレクト
        exit;
    ?>
    <a href="./index.php">indexへもどる</a>
</body>

</html>
