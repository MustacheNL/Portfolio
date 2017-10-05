<?php
require '../../private/config.php';

$query = $db->prepare("SELECT * FROM site_settings");
$query->execute();


while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $site_installed = $row['site_installed'];

    if ($site_installed == 1) {
        header("location: /panel");
    }
}
?>

<html>
<head>
    <title>
        Installatie
    </title>
    <link rel="stylesheet" type="text/css" href="../../css/panel/installation/stylesheet.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
