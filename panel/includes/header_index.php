<?php
include "../private/config.php";

$query = $db->prepare("SELECT site_installed FROM site_settings");
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $site_installed = $row['site_installed'];

    if ($site_installed == 0) {
        header("location: installation/");
    } elseif ($site_installed == 1) {
        header("location: ");
    }
}

if (!empty($_SESSION['name'])) {
    header('Location: dashboard.php');
}
?>