<?php
$stmt = $db->prepare("SELECT * FROM admin_credentials, site_about");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="row">
            <div class="three columns">
                <img class="profile-pic" src="images/<?php echo $row['about_image']; ?>" alt=""/>
            </div>
            <div class="nine columns main-col">
                <h2><?php echo $row['about_info_header1']; ?></h2>
                <p><?php echo $row['about_info2']; ?></p>
                <div class="row">
                    <div class="columns contact-details">
                        <h2><?php echo $row['about_info_header2']; ?></h2>
                        <p class="address">
                            <span><?php echo $row['fullname']; ?></span><br><span><?php echo $row['street']; ?>
                                <br> <?php echo $row['city']; ?>p, <?php echo $row['postalcode']; ?> <?php echo $row['country']; ?> </span><br>
                            <span>06-nogwat</span><br></p>
                    </div>
                    <div class="columns download">
                        <p><a href="CV.docx" class="button"><i
                                        class="fa fa-download"></i><?php echo $row['about_downloadbutton']; ?></a></p>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>
