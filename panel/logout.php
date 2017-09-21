<?php
require '../private/config.php';
session_destroy();
header('Location: index.php');
?>