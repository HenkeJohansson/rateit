<?php

include "db_info.inc.php";

try {
    $pdo=new PDO('mysql:host=rateit-193298.phpmyadmin.mysql.binero.se;dbname=$database','$username',$password);
    $pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec ('SET NAMES "utf8"');
} catch (Exception $e) {
    echo "<br>Error: $e<br>";
    exit ();
}

?>