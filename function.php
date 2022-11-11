<?php
    function deb() {
        echo "<br>";
        echo 'session id：' . session_id();
        echo "<br>";
        echo "SESSION：";
        print_r($_SESSION);
        echo "<br>";
        echo "POST：";
        print_r($_POST);
        echo "<br>";
    }
?>