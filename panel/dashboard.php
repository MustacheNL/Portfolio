<?php
require 'includes/header.php';
if(empty($_SESSION['name'])) {
    header('Location: index.php');
}
echo "JE BENT INGELOGD....";

echo "WIL JE UITLOGGEN?";

echo $_SESSION['id'];
?>
<a href="logout.php">XD</a>
