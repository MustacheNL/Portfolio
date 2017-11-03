<?php
session_start();
define('database_host', 'localhost'); /* Your Database host (127.0.0.1, localhost or other IPs for external host) */
define('database_user', 'root'); /* Your Database user or username (standard root) */
define('database_password', ''); /* Your Database password (standard nothing) */
define('database_name', 'portfolio'); /* Your Database name (ex. Portfolio */


try {
    $db = new PDO("mysql:host=".database_host."; dbname=".database_name, database_user, database_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>