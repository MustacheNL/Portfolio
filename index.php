<?php
require "private/config.php";

$stmt = $db->prepare("SELECT * FROM content, site_info WHERE page = 'home'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
<!DOCTYPE html>
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

<body>
<header id="home">
    <nav id="nav-wrap">
        <a class="mobile-btn" href="#nav-wrap" title="Open navigatie">Open navigatie</a>
        <a class="mobile-btn" href="#" title="Sluit navigatie">Sluit navigatie</a>
        <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
            <li><a class="smoothscroll" href="#about">Over mij</a></li>
            <li><a class="smoothscroll" href="#resume">CV</a></li>
            <li><a class="smoothscroll" href="#portfolio">Projecten</a></li>
            <li><a class="smoothscroll" href="#contact">Contact</a></li>
        </ul>
    </nav>

    <div class="row banner">
        <div class="banner-text">
            <h1 class="responsive-headline"><?php echo $row['content1']; ?></h1>
            <h3><?php echo $row['content2']; ?></h3>
            <hr/>
            <ul class="social">
                <li><a href="https://facebook.com/NymaDolatkhahnejad"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/Nymatjeuh"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://instagram.com/Mustache2605"><i class="fa fa-instagram"></i></a></li>
                <li><a href="skype:live:nyma_nl"><i class="fa fa-skype"></i></a></li>
            </ul>
        </div>
    </div>

    <p class="scrolldown">
        <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
    </p>

</header>

<?php }
$stmt = $db->prepare("SELECT * FROM content WHERE page = 'about'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <section id="about">
        <div class="row">
            <div class="three columns">
                <img class="profile-pic" src="images/<?php echo $row['image']; ?>" alt=""/>
            </div>
            <div class="nine columns main-col">
                <h2><?php echo $row['content1']; ?></h2>
                <p><?php echo $row['content2']; ?></p>
                <div class="row">
                    <div class="columns contact-details">
                        <h2><?php echo $row['content3']; ?></h2>
                        <p class="address"><?php echo $row['content4']; ?></p>
                    </div>
                    <div class="columns download">
                        <p><a href="/cv.docx" class="button"><i
                                        class="fa fa-download"></i><?php echo $row['content5']; ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php }
$stmt = $db->prepare("SELECT * FROM content WHERE page = 'resume_education_title'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
<section id="resume">
    <div class="row education">
        <div class="three columns header-col">
            <h1><span><?php echo $row['content1']; ?></span></h1>
        </div>
        <?php } ?>
        <div class="nine columns main-col">
            <?php
            $stmt = $db->prepare("SELECT * FROM content WHERE page = 'resume_education'");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $content1 = $row['content1'];
                $content2 = $row['content2'];
                $content3 = $row['content3'];
                $content4 = $row['content4'];
                $content5 = $row['content5'];

                echo "<div class=\"row item\">
                <div class=\"twelve columns\">
                    <h3>$content1</h3>
                    <p class=\"info\">$content2<span>&bull;</span> <em class=\"date\">$content3 tot $content4</em></p>
                    <p>$content4</p>
                </div>
            </div>";
            } ?>
        </div>
    </div>

    <?php $stmt = $db->prepare("SELECT * FROM content WHERE page = 'resume_work_title'");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
    <div class="row work">
        <div class="three columns header-col">
            <h1><span><?php echo $row['content1']; ?></span></h1>
        </div>
        <?php } ?>
        <div class="nine columns main-col">
            <?php
            $stmt = $db->prepare("SELECT * FROM content WHERE page = 'resume_work'");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $content1 = $row['content1'];
                $content2 = $row['content2'];
                $content3 = $row['content3'];
                $content4 = $row['content4'];
                $content5 = $row['content5'];

                echo "<div class=\"row item\">
                <div class=\"twelve columns\">
                    <h3>$content1</h3>
                    <p class=\"info\">$content2<span>&bull;</span> <em class=\"date\">$content3 tot $content4</em>
                    </p>
                    <p>$content5</p>
                </div>
            </div>";
            } ?>
        </div>
    </div>

    <?php $stmt = $db->prepare("SELECT * FROM content WHERE page = 'skills'");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
    <div class="row skill">
        <div class="three columns header-col">
            <h1><span><?php echo $row['content1']; ?></span></h1>
        </div>
        <div class="nine columns main-col">
            <p><?php echo $row['content2']; ?></p>
            <?php } ?>
            <div class="bars">
                <ul class="skills">
                    <li><span class="bar-expand php"></span><em>PHP</em></li>
                    <li><span class="bar-expand html5"></span><em>HTML5</em></li>
                    <li><span class="bar-expand css3"></span><em>CSS3</em></li>
                    <li><span class="bar-expand sql"></span><em>SQL</em></li>
                    <li><span class="bar-expand design"></span><em>Design</em></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php $stmt = $db->prepare("SELECT * FROM content WHERE page = 'projects_title'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
<section id="portfolio">
    <div class="row">
        <div class="twelve columns collapsed">
            <h1><?php echo $row['content1']; ?></h1>
            <?php } $stmt = $db->prepare("SELECT * FROM content WHERE page = 'projects_title'");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
            <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
                <div class="columns portfolio-item">
                    <div class="item-wrap">
                        <a href="#modal-01" title="">
                            <img alt="" src="images/portfolio/coffee.jpg">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>BookOnShelf</h5>
                                    <p>Content Management System</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>

                    </div>
                </div>
<?php } ?>
                <div class="columns portfolio-item">
                    <div class="item-wrap">
                        <a href="#modal-02" title="">
                            <img alt="" src="images/portfolio/console.jpg">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>Project 2</h5>
                                    <p>Leeg</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>
                    </div>
                </div>

                <div class="columns portfolio-item">
                    <div class="item-wrap">
                        <a href="#modal-03" title="">
                            <img alt="" src="images/portfolio/judah.jpg">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>Project 3</h5>
                                    <p>Leeg</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>
                    </div>
                </div>

                <div class="columns portfolio-item">
                    <div class="item-wrap">
                        <a href="#modal-04" title="">
                            <img alt="" src="images/portfolio/into-the-light.jpg">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>Project 4</h5>
                                    <p>Leeg</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>
                    </div>
                </div>

                <div class="columns portfolio-item">
                    <div class="item-wrap">
                        <a href="#modal-05" title="">
                            <img alt="" src="images/portfolio/farmerboy.jpg">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>Project 5</h5>
                                    <p>Leeg</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>
                    </div>
                </div>

                <div class="columns portfolio-item">
                    <div class="item-wrap">
                        <a href="#modal-06" title="">
                            <img alt="" src="images/portfolio/girl.jpg">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>Project 6</h5>
                                    <p>Leeg</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>
                    </div>
                </div>

                <div class="columns portfolio-item">
                    <div class="item-wrap">
                        <a href="#modal-07" title="">
                            <img alt="" src="images/portfolio/origami.jpg">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>Project 7</h5>
                                    <p>Leeg</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>
                    </div>
                </div>

                <div class="columns portfolio-item">
                    <div class="item-wrap">
                        <a href="#modal-08" title="">
                            <img alt="" src="images/portfolio/retrocam.jpg">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>Project 8</h5>
                                    <p>Leeg</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal-01" class="popup-modal mfp-hide">
            <img class="scale-with-grid" src="images/portfolio/modals/m-coffee.jpg" alt=""/>
            <div class="description-box">
                <h4>BookOnShelf</h4>
                <p>Een CMS (Content Management System) waarmee je boeken kan uitlenen en beheren, toevoegen en
                    verwijderen. Elke gebruiker heeft
                    zijn eigen account waarmee die de website op kan. Inloggen en registreren is ook inbegrepen,
                    helemaal vanaf scratch 100%.</p>
                <span class="categories"><i class="fa fa-tag"></i>Content Management System</span>
            </div>

            <div class="link-box">
                <a href="https://github.com/MustacheNL/BookOnShelf2.0" target="_blank">GitHub</a>
                <a class="popup-modal-dismiss">Sluiten</a>
            </div>
        </div>

        <div id="modal-02" class="popup-modal mfp-hide">
            <img class="scale-with-grid" src="images/portfolio/modals/m-console.jpg" alt=""/>
            <div class="description-box">
                <h4>Project 2</h4>
                <p>Een nog leeg project, zal binnenkort wel komen!</p>
                <span class="categories"><i class="fa fa-tag"></i>Geen informatie</span>
            </div>

            <div class="link-box">
                <a href="https://github.com" target="_blank">GitHub</a>
                <a class="popup-modal-dismiss">Sluiten</a>
            </div>
        </div>

        <div id="modal-03" class="popup-modal mfp-hide">
            <img class="scale-with-grid" src="images/portfolio/modals/m-judah.jpg" alt=""/>
            <div class="description-box">
                <h4>Project 3</h4>
                <p>Een nog leeg project, zal binnenkort wel komen!</p>
                <span class="categories"><i class="fa fa-tag"></i>Geen informatie</span>
            </div>

            <div class="link-box">
                <a href="https://github.com" target="_blank">GitHub</a>
                <a class="popup-modal-dismiss">Sluiten</a>
            </div>
        </div>

        <div id="modal-04" class="popup-modal mfp-hide">
            <img class="scale-with-grid" src="images/portfolio/modals/m-intothelight.jpg" alt=""/>
            <div class="description-box">
                <h4>Project 4</h4>
                <p>Een nog leeg project, zal binnenkort wel komen!</p>
                <span class="categories"><i class="fa fa-tag"></i>Geen informatie</span>
            </div>

            <div class="link-box">
                <a href="https://github.com" target="_blank">GitHub</a>
                <a class="popup-modal-dismiss">Sluiten</a>
            </div>
        </div>

        <div id="modal-05" class="popup-modal mfp-hide">
            <img class="scale-with-grid" src="images/portfolio/modals/m-farmerboy.jpg" alt=""/>
            <div class="description-box">
                <h4>Project 5</h4>
                <p>Een nog leeg project, zal binnenkort wel komen!</p>
                <span class="categories"><i class="fa fa-tag"></i>Geen informatie</span>
            </div>

            <div class="link-box">
                <a href="https://github.com" target="_blank">GitHub</a>
                <a class="popup-modal-dismiss">Sluiten</a>
            </div>
        </div>

        <div id="modal-06" class="popup-modal mfp-hide">
            <img class="scale-with-grid" src="images/portfolio/modals/m-girl.jpg" alt=""/>
            <div class="description-box">
                <h4>Project 6</h4>
                <p>Een nog leeg project, zal binnenkort wel komen!</p>
                <span class="categories"><i class="fa fa-tag"></i>Geen informatie</span>
            </div>

            <div class="link-box">
                <a href="https://github.com" target="_blank">GitHub</a>
                <a class="popup-modal-dismiss">Sluiten</a>
            </div>
        </div>

        <div id="modal-07" class="popup-modal mfp-hide">
            <img class="scale-with-grid" src="images/portfolio/modals/m-origami.jpg" alt=""/>
            <div class="description-box">
                <h4>Project 7</h4>
                <p>Een nog leeg project, zal binnenkort wel komen!</p>
                <span class="categories"><i class="fa fa-tag"></i>Geen informatie</span>
            </div>

            <div class="link-box">
                <a href="https://github.com" target="_blank">GitHub</a>
                <a class="popup-modal-dismiss">Sluiten</a>
            </div>
        </div>

        <div id="modal-08" class="popup-modal mfp-hide">
            <img class="scale-with-grid" src="images/portfolio/modals/m-retrocam.jpg" alt=""/>
            <div class="description-box">
                <h4>Project 8</h4>
                <p>Een nog leeg project, zal binnenkort wel komen!</p>
                <span class="categories"><i class="fa fa-tag"></i>Geen informatie</span>
            </div>

            <div class="link-box">
                <a href="https://github.com" target="_blank">GitHub</a>
                <a class="popup-modal-dismiss">Sluiten</a>
            </div>
        </div>
    </div>
</section>

<section id="call-to-action">
    <div class="row">
        <div class="two columns header-col">
            <h1><span>Contacteer mij!</span></h1>
        </div>
        <div class="seven columns">
            <h2><span class="lead">Nog niet genoeg?</span></h2>
            <p><span class="lead">Zijn er nog dingen die ik ben vergeten, staat er iets waarvan je denkt dat het niet klopt óf
            wil je contact met me opnemen? Scrol dan nog even verder!</span></p>
        </div>
        <div class="three columns action"></div>
    </div>
</section>

<section id="contact">
    <div class="row section-head">
        <div class="two columns header-col">
            <h1><span>Contacteer mij!</span></h1>
        </div>

        <div class="ten columns">
            <p class="lead">Heb je een vraag of opmerking? Aarzel niet om mij een bericht te sturen. De hele week
                probeer ik binnen 24 uur te reageren!

            </p>
        </div>
    </div>

    <div class="row">
        <div class="eight columns">
            <form action="" method="post" id="contactForm" name="contactForm">
                <fieldset>
                    <div>
                        <label for="contactName">Naam <span class="required">*</span></label>
                        <input type="text" value="" size="35" id="contactName" name="contactName">
                    </div>

                    <div>
                        <label for="contactEmail">E-mail <span class="required">*</span></label>
                        <input type="text" value="" size="35" id="contactEmail" name="contactEmail">
                    </div>

                    <div>
                        <label for="contactSubject">Onderwerp <span class="required">*</span></label>
                        <input type="text" value="" size="35" id="contactSubject" name="contactSubject">
                    </div>

                    <div>
                        <label for="contactMessage">Bericht <span class="required">*</span></label>
                        <textarea cols="50" style="resize: vertical;" rows="15" id="contactMessage"
                                  name="contactMessage"></textarea>
                    </div>

                    <div>
                        <button class="submit">Versturen</button>
                        <span id="image-loader">
                        <img alt="" src="images/loader.gif">
                     </span>
                    </div>
                </fieldset>
            </form>

            <div id="message-warning"> Er is iets fout gegaan!</div>
            <div id="message-success">
                <i class="fa fa-check"></i>Je bericht is verzonden!<br>
            </div>
        </div>

        <aside class="four columns footer-widgets">
            <div class="widget widget_contact">
                <h4>Adres gegevens en telefoonnummer</h4>
                <p class="address">
                    Nyma Dolatkhahnejad<br>
                    Van Der Hagenstraat 701 <br>
                    Ede, 6717DK Nederland<br>
                    <span>06-47966197</span>
                </p>
            </div>
        </aside>
    </div>
</section>

<footer>
    <div class="row">
        <div class="twelve columns">
            <ul class="social-links">
                <li><a href="https://facebook.com/NymaDolatkhahnejad"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/Nymatjeuh"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://instagram.com/Mustache2605"><i class="fa fa-instagram"></i></a></li>
                <li><a href="skype:live:nyma_nl"><i class="fa fa-skype"></i></a></li>
            </ul>

            <ul class="copyright">
                <li>&copy; Copyright 2016-2017 Nyma Dolatkhahnejad</li>
                <li>Design gemaakt door <a href="http://www.styleshout.com/" title="Styleshout" target="_blank">Styleshout</a>
                </li>
            </ul>
        </div>
        <div id="go-top"><a class="smoothscroll" title="Terug omhoog" href="#home"><i class="icon-up-open"></i></a>
        </div>
    </div>
</footer>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/portfolio/jquery-1.10.2.min.js"><\/script>')</script>
<script type="text/javascript" src="js/portfolio/jquery-migrate-1.2.1.min.js"></script>
<script src="js/portfolio/jquery.flexslider.js"></script>
<script src="js/portfolio/waypoints.js"></script>
<script src="js/portfolio/jquery.fittext.js"></script>
<script src="js/portfolio/magnific-popup.js"></script>
<script src="js/portfolio/init.js"></script>
</body>
</html>