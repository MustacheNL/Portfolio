<?php $stmt = $db->prepare("SELECT * FROM content WHERE page = 'resume_work_title'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
<div class="row work">
    <div class="three columns header-col">
        <h1><span><?php echo $row['content']; ?></span></h1>
    </div>
    <?php } ?>
    <div class="nine columns main-col">
        <?php $stmt = $db->prepare("SELECT * FROM site_work");
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