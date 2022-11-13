# bath-management

## conf.php

```php
<?php
    function conf($parameter) {
        if($parameter == "dbname") {
            return "bath_data_base";
        } elseif ($parameter == "dbhost") {
            return "localhost";
        } elseif ($parameter == "dbusername") {
            return "root";
        } elseif ($parameter == "dbpassword") {
            return "Abc445566@";
        } elseif ($parameter == "dbtable") {
            return "member";
        } else {
            echo "error";
        }
    }
?>
```
