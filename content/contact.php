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
                <span>06-nogwat</span>
            </p>
        </div>
    </aside>
    <?php } ?>
</div>
