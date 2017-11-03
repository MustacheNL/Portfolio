<?php $stmt = $db->prepare("SELECT * FROM site_about");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <div class="row banner">
        <div class="banner-text">
            <h1 class="responsive-headline"><?php echo $row['about_name']; ?></h1>
            <h3><?php echo $row['about_info']; ?></h3>
            <hr/>
            <ul class="social">
                <li><a href="https://facebook.com/<?php echo $row['about_facebook']; ?>"><i class="fa fa-facebook"></i></a>
                </li>
                <li><a href="https://twitter.com/<?php echo $row['about_twitter']; ?>"><i class="fa fa-twitter"></i></a>
                </li>
                <li><a href="https://instagram.com/<?php echo $row['about_instagram']; ?>"><i
                                class="fa fa-instagram"></i></a></li>
                <li><a href="<?php echo $row['about_skype']; ?>"><i class="fa fa-skype"></i></a></li>
            </ul>
        </div>
    </div>
<?php } ?>
<p class="scrolldown">
    <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
</p>