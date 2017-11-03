<?php
$stmt = $db->prepare("SELECT * FROM content WHERE page = 'resume_education_title'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
    <div class="row education">
        <div class="three columns header-col">
            <h1><span><?php echo $row['content']; ?></span></h1>
        </div>
        <div class="nine columns main-col">
            <?php }
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