<?php $stmt = $db->prepare("SELECT * FROM site_skills");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <style>
        .<?php echo $row['skill_name']; ?> {
            width: <?php echo $row['skill_percentage']; ?>%;
            -moz-animation: php 2s ease;
            -webkit-animation: php 2s ease;
        }

        @-moz-keyframes <?php echo $row['skill_name']; ?> {
            0% {
                width: 0px;
            }

            100% {
                width: <?php echo $row['skill_percentage']; ?>%;
            }
        }

        @-webkit-keyframes <?php echo $row['skill_name']; ?> {
            0% {
                width: 0px;
            }

            100% {
                width: <?php echo $row['skill_percentage']; ?>%;
            }
        }
    </style>
<?php }
$stmt = $db->prepare("SELECT * FROM content WHERE page = 'skills_title'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
<div class="row skill">
    <div class="three columns header-col">
        <h1><span><?php echo $row['content']; ?></span></h1>
    </div>
    <?php }
    $stmt = $db->prepare("SELECT * FROM content WHERE page = 'skills_info'");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
    <div class="nine columns main-col">
        <p><?php echo $row['content']; ?></p>
        <?php }
        $stmt = $db->prepare("SELECT * FROM site_skills");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="bars">
                <ul class="skills">
                    <li>
                        <span class="bar-expand <?php echo $row['skill_name']; ?>"></span><em><?php echo $row['skill_name']; ?></em>
                    </li>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>