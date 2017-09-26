<?php
include "../private/config.php";

$query = $db->prepare("SELECT * FROM site_settings");
//$query->execute();
$site_installed = $query->execute();

echo $site_installed;

if ($site_installed == 0) {
    header("location: installation/");
}
?>