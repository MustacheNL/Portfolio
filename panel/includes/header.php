<?php
include "../../private/config.php";

$query = $db->prepare("SELECT COUNT(*) FROM site_settings as site_installed");
$query->execute();
$site_installed = $query->fetchObject();
if ($site_installed == 1) {
    header("location: panel/");
} else {
    header("location: installation/");
}

?>