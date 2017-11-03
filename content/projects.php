<?php $stmt = $db->prepare("SELECT * FROM content WHERE page = 'projects_title'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
    <div class="row">
        <div class="twelve columns collapsed">
            <h1><?php echo $row['content']; ?></h1>
            <?php }
            $stmt = $db->prepare("SELECT * FROM site_projects");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
            <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
                <div class="columns portfolio-item">
                    <div class="item-wrap">
                        <a href="#modal-0<?php echo $row['id']; ?>" title="">
                            <img alt=""
                                 src="images/portfolio/projects/small/<?php echo $row['project_small_image']; ?>">
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
            <img class="scale-with-grid" src="images/portfolio/projects/big/<?php echo $row['project_big_image']; ?>"
                 alt=""/>
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
<?php } ?>