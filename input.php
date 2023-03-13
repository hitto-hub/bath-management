<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css">
    <!-- <title>Document</title> -->
</head>
<body>
<?php
    session_start(); // セッションスタート
    if (empty($_SESSION["data"])) {
        // $_SESSION["data"]が空の時実行
        echo <<<DATA
            <div class="row mt-5 mx-5">
                <div class="col-lg-8 mx-auto">
                <form action="./judge.php" method="POST">
                    <p><b>名前</b></p>
                    <input class="form-control" type="text" name="name" placeholder="例）山田太郎">
                    <div class="control-group mt-3">
                        <button type="submit" class="btn btn-primary">送信する</button>
                    </div>
                </form>
                </div>
            </div>
        DATA;
    }
?>
</body>
</html>



