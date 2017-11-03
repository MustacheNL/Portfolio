<?php $stmt = $db->prepare("SELECT * FROM site_about");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <div class="row">
        <div class="twelve columns">
            <ul class="social-links">
                <li><a href="https://facebook.com/<?php echo $row['about_facebook']; ?>"><i
                            class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/<?php echo $row['about_twitter']; ?>"><i class="fa fa-twitter"></i></a>
                </li>
                <li><a href="https://instagram.com/<?php echo $row['about_instagram']; ?>"><i
                            class="fa fa-instagram"></i></a></li>
                <li><a href="<?php echo $row['about_skype']; ?>"><i class="fa fa-skype"></i></a></li>
            </ul>

            <ul class="copyright">
                <li>&copy; Copyright 2016-2017 Systeem gemaakt door <a href="http://nymadolat.nl/">Nyma
                        Dolatkhahnejad</a></li>
                <li>Design gemaakt door <a href="http://www.styleshout.com/" title="Styleshout" target="_blank">Styleshout</a>
                </li>
            </ul>
        </div>
        <div id="go-top"><a class="smoothscroll" title="Terug omhoog" href="#home"><i class="icon-up-open"></i></a>
        </div>
    </div>
<?php } ?>