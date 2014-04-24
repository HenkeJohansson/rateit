<?php

include "password.inc.php";

try {
    $pdo=new PDO('mysql:host=rateit-193298.phpmyadmin.mysql.binero.se;dbname=193298-rateit','193298_lv84950',$password);
    $pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec ('SET NAMES "utf8"');
} catch (Exception $e) {
    echo "<br>Error: $e<br>";
    exit ();
}

?>