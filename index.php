<?php
require "private/config.php";

$stmt = $db->prepare("SELECT * FROM site_info");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $row['site_name']; ?></title>
    <meta name="description" content="Een portfolio over mij!">
    <meta name="author" content="<?php echo $row['site_name']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/portfolio/default.css">
    <link rel="stylesheet" href="css/portfolio/layout.css">
    <link rel="stylesheet" href="css/portfolio/media-queries.css">
    <link rel="stylesheet" href="css/portfolio/magnific-popup.css">
    <script src="js/portfolio/modernizr.js"></script>
    <link rel="shortcut icon" href="images/favicon.png">
</head>
<?php } ?>

<body>
<header id="home">
    <?php include "content/home.php"; ?>
    <?php include "content/navbar.php"; ?>
</header>

<section id="about">
    <?php include "content/about.php"; ?>
</section>

<section id="resume">
    <?php include "content/resume_education.php"; ?>
    <?php include "content/resume_work.php"; ?>
    <?php include "content/resume_skills.php"; ?>
</section>

<section id="portfolio">
    <?php include "content/projects.php"; ?>
</section>

<?php
$stmt = $db->prepare("SELECT content FROM content WHERE id = '6, 7, 8, 9'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
<section id="call-to-action">
    <div class="row">
        <div class="two columns header-col">
            <h1><span><?php echo $row['content']; ?></span></h1>
        </div>
        <div class="seven columns">
            <h2><span class="lead"><?php echo $row['content']; ?></span></h2>
            <p><span class="lead"><?php echo $row['content']; ?></span></p>
        </div>
        <div class="three columns action"></div>
    </div>
</section>

<section id="contact">
    <div class="row section-head">
        <div class="two columns header-col">
            <h1><span><?php echo $row['content']; ?></span></h1>
        </div>

        <div class="ten columns">
            <p class="lead"><?php echo $row['content']; ?></p>
        </div>
    </div>
    <?php } ?>
    <?php include "content/contact.php"; ?>
</section>

<footer>
    <?php include "content/footer.php"; ?>
</footer>

<script src="js/portfolio/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/portfolio/jquery-1.10.2.min.js"><\/script>')</script>
<script type="text/javascript" src="js/portfolio/jquery-migrate-1.2.1.min.js"></script>
<script src="js/portfolio/jquery.flexslider.js"></script>
<script src="js/portfolio/waypoints.js"></script>
<script src="js/portfolio/jquery.fittext.js"></script>
<script src="js/portfolio/magnific-popup.js"></script>
<script src="js/portfolio/init.js"></script>
</body>
</html>