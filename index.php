<?php
require "private/config.php";

$stmt = $db->prepare("SELECT * FROM site_info");
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

    <?php }
    $stmt = $db->prepare("SELECT * FROM site_about");
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

    <p class="scrolldown">
        <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
    </p>

</header>

<?php }
$stmt = $db->prepare("SELECT * FROM admin_credentials, site_about, content WHERE page = 'about'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <section id="about">
        <div class="row">
            <div class="three columns">
                <img class="profile-pic" src="images/<?php echo $row['image']; ?>" alt=""/>
            </div>
            <div class="nine columns main-col">
                <h2><?php echo $row['content1']; ?></h2>
                <p><?php echo $row['about_info2']; ?></p>
                <div class="row">
                    <div class="columns contact-details">
                        <h2><?php echo $row['content2']; ?></h2>
                        <p class="address">
                            <span><?php echo $row['fullname']; ?></span><br><span><?php echo $row['street']; ?>
                                <br> <?php echo $row['city']; ?>
                                , <?php echo $row['postalcode']; ?> <?php echo $row['country']; ?> </span><br>
                            <span>06-47966197</span><br></p>
                    </div>
                    <div class="columns download">
                        <p><a href="/cv.docx" class="button"><i
                                        class="fa fa-download"></i><?php echo $row['content3']; ?></a></p>
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
            $stmt = $db->prepare("SELECT * FROM site_education");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $education_type = $row['education_type'];
                $education_level = $row['education_level'];
                $education_year_start = $row['education_year_start'];
                $education_year_end = $row['education_year_end'];
                $education_info = $row['education_info'];

                echo "<div class=\"row item\">
                <div class=\"twelve columns\">
                    <h3>$education_type</h3>
                    <p class=\"info\">$education_level<span>&bull;</span> <em class=\"date\">$education_year_start tot $education_year_end</em></p>
                    <p>$education_info</p>
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
            $stmt = $db->prepare("SELECT * FROM site_work");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $work_type = $row['work_type'];
                $work_place = $row['work_place'];
                $work_year_start = $row['work_year_start'];
                $work_year_end = $row['work_year_end'];
                $work_info = $row['work_info'];

                echo "<div class=\"row item\">
                <div class=\"twelve columns\">
                    <h3>$work_type</h3>
                    <p class=\"info\">$work_place<span>&bull;</span> <em class=\"date\">$work_year_start tot $work_year_end</em>
                    </p>
                    <p>$work_info</p>
                </div>
            </div>";
            } ?>
        </div>
    </div>

    <?php $stmt = $db->prepare("SELECT * FROM site_skills");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <style>
            .php {
                width: <?php echo $row['skill_percentage']; ?>%;
                -moz-animation: php 2s ease;
                -webkit-animation: php 2s ease;
            }

            .html5 {
                width: <?php echo $row['skill_percentage']; ?>%;
                -moz-animation: html5 2s ease;
                -webkit-animation: html5 2s ease;
            }

            .css3 {
                width: <?php echo $row['skill_percentage']; ?>%;
                -moz-animation: css3 2s ease;
                -webkit-animation: css3 2s ease;
            }

            .sql {
                width: <?php echo $row['skill_percentage']; ?>%;
                -moz-animation: sql 2s ease;
                -webkit-animation: sql 2s ease;
            }

            .design {
                width: <?php echo $row['skill_percentage']; ?>%;
                -moz-animation: design 2s ease;
                -webkit-animation: design 2s ease;
            }

            @-moz-keyframes php {
                0% {
                    width: 0px;
                }

                100% {
                    width: <?php echo $row['skill_percentage']; ?>%;
                }
            }

            @-moz-keyframes html5 {
                0% {
                    width: 0px;
                }

                100% {
                    width: <?php echo $row['skill_percentage']; ?>%;
                }
            }

            @-moz-keyframes css3 {
                0% {
                    width: 0px;
                }

                100% {
                    width: <?php echo $row['skill_percentage']; ?>%;
                }
            }

            @-moz-keyframes sql {
                0% {
                    width: 0px;
                }

                100% {
                    width: <?php echo $row['skill_percentage']; ?>%;
                }
            }

            @-moz-keyframes design {
                0% {
                    width: 0px;
                }

                100% {
                    width: <?php echo $row['skill_percentage']; ?>%;
                }
            }

            @-webkit-keyframes php {
                0% {
                    width: 0px;
                }

                100% {
                    width: <?php echo $row['skill_percentage']; ?>%;
                }
            }

            @-webkit-keyframes html5 {
                0% {
                    width: 0px;
                }

                100% {
                    width: <?php echo $row['skill_percentage']; ?>%;
                }
            }

            @-webkit-keyframes css3 {
                0% {
                    width: 0px;
                }

                100% {
                    width: <?php echo $row['skill_percentage']; ?>%;
                }
            }

            @-webkit-keyframes sql {
                0% {
                    width: 0px;
                }

                100% {
                    width: <?php echo $row['skill_percentage']; ?>%;
                }
            }

            @-webkit-keyframes design {
                0% {
                    width: 0px;
                }

                100% {
                    width: <?php echo $row['skill_percentage']; ?>%;
                }
            }
        </style>
    <?php }
    $stmt = $db->prepare("SELECT * FROM content WHERE page = 'skills'");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
    <div class="row skill">
        <div class="three columns header-col">
            <h1><span><?php echo $row['content1']; ?></span></h1>
        </div>
        <div class="nine columns main-col">
            <p><?php echo $row['content2']; ?></p>
            <?php }
            $stmt = $db->prepare("SELECT * FROM site_skills");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="bars">
                    <ul class="skills">
                        <li><span class="bar-expand php"></span><em>PHP</em></li>
                        <li><span class="bar-expand html5"></span><em>HTML5</em></li>
                        <li><span class="bar-expand css3"></span><em>CSS3</em></li>
                        <li><span class="bar-expand sql"></span><em>SQL</em></li>
                        <li><span class="bar-expand design"></span><em>Design</em></li>
                    </ul>
                </div>
            <?php } ?>
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
            <?php }
            $stmt = $db->prepare("SELECT * FROM site_projects");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
            <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
                <div class="columns portfolio-item">
                    <div class="item-wrap">
                        <a href="#modal-0<?php echo $row['id']; ?>" title="">
                            <img alt="" src="images/portfolio/coffee.jpg">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5><?php echo $row['project_name']; ?></h5>
                                    <p><?php echo $row['project_type']; ?></p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>

                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <?php $stmt = $db->prepare("SELECT * FROM site_projects");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <div id="modal-0<?php echo $row['id']; ?>" class="popup-modal mfp-hide">
            <img class="scale-with-grid" src="images/portfolio/modals/m-coffee.jpg" alt=""/>
            <div class="description-box">
                <h4><?php echo $row['project_name']; ?></h4>
                <p><?php echo $row['project_info']; ?></p>
                <span class="categories"><i class="fa fa-tag"></i><?php echo $row['project_type']; ?></span>
            </div>

            <div class="link-box">
                <a href="<?php echo $row['project_link']; ?>" target="_blank">Project link</a>
                <a class="popup-modal-dismiss">Sluiten</a>
            </div>
        </div>
    </div>
</section>

<?php }
$stmt = $db->prepare("SELECT * FROM content WHERE page = 'contact_text'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
<section id="call-to-action">
    <div class="row">
        <div class="two columns header-col">
            <h1><span><?php echo $row['content1']; ?></span></h1>
        </div>
        <div class="seven columns">
            <h2><span class="lead"><?php echo $row['content2']; ?></span></h2>
            <p><span class="lead"><?php echo $row['content3']; ?></span></p>
        </div>
        <div class="three columns action"></div>
    </div>
</section>

<section id="contact">
    <div class="row section-head">
        <div class="two columns header-col">
            <h1><span><?php echo $row['content1']; ?></span></h1>
        </div>

        <div class="ten columns">
            <p class="lead"><?php echo $row['content4']; ?></p>
        </div>
    </div>
    <?php } ?>

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

        <?php $stmt = $db->prepare("SELECT * FROM admin_credentials");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <aside class="four columns footer-widgets">
                <div class="widget widget_contact">
                    <h4>Adres gegevens en telefoonnummer</h4>
                    <p class="address">
                        <?php echo $row['fullname']; ?><br>
                        <?php echo $row['street']; ?> <br>
                        <?php echo $row['city']; ?>, <?php echo $row['postalcode']; ?> <?php echo $row['country']; ?>
                        <br>
                        <span>06-47966197</span>
                    </p>
                </div>
            </aside>
        <?php } ?>
    </div>
</section>

<footer>
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