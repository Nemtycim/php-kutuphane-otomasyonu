<?php

try {
    $db = new PDO("xll", "root", "");
    echo "Başarılı";
} catch (PDOException) {
    echo "Başarısız";
}
?>