<?php
session_start();
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'portfolio');


try {
    $db = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>