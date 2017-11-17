<?php require 'includes/header.php';

$stmt = $db->prepare("SELECT * FROM site_about");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $about_info_header1 = $row['about_info_header1'];
    $about_info_header2 = $row['about_info_header2'];
    $about_info2 = $row['about_info2'];
    $about_downloadbutton = $row['about_downloadbutton'];
}

if (isset($_POST['submit'])) {
    $stmt = $db->prepare("UPDATE site_about SET `about_info_header1` = :about_info_header1, `about_info_header2` = :about_info_header2, `about_info2` = :about_info2, `about_downloadbutton` = :about_downloadbutton");
    $stmt->execute(array(':about_info_header1' => $_POST['about_info_header1'], ':about_info_header2' => $_POST['about_info_header2'], ':about_info2' => $_POST['about_info2'], ':about_downloadbutton' => $_POST['about_downloadbutton']));
    header("location: edit_about.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>

    <link rel="shortcut icon" href="../images/panel/favicon.png">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="jquery.form.js"></script>
    <script>
        function preview_image() {
            var total_file = document.getElementById("upload_file").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<img style='max-width: 75%; max-height: 75%; text-align: center;' src='" + URL.createObjectURL(event.target.files[i]) + "'><br>");
            }
        }
    </script>
</head>

<body>
<div id="wrapper">
    <?php include "includes/navbar.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Over mij bewerken</h1>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="POST" role="form">
                                    <div class="form-group">
                                        <label>Title over mij</label>
                                        <input class="form-control" placeholder="Enter text" name="about_info_header1"
                                               value="<?php echo $about_info_header1; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tekst over jezelf</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter text"
                                                  name="about_info2"><?php echo $about_info2; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Titel contact</label>
                                        <input class="form-control" placeholder="Enter text" name="about_info_header2"
                                               value="<?php echo $about_info_header2; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Titel download knop</label>
                                        <input class="form-control" placeholder="Enter text" name="about_downloadbutton"
                                               value="<?php echo $about_downloadbutton; ?>">
                                    </div>
                                    <button name="submit" type="submit" class="btn btn-default">Opslaan</button>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Image uploaden
                                    </div>
                                    <div class="panel-body">
                                        <form action="upload_file.php" method="post" enctype="multipart/form-data">
                                            <input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();"
                                                   multiple/>
                                            <br/><button name="submit_image" type="submit" class="btn btn-default">Uploaden!</button>
                                        </form>
                                        <div id="image_preview"></div>
                                    </div>
                                    <div class="panel-footer">
                                        Let op: Dit werkt nog niet helemaal zoals het zou moeten werken. Pas op wat je hiezrmee doet.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/metisMenu/metisMenu.min.js"></script>
<script src="vendor/raphael/raphael.min.js"></script>
<script src="dist/js/sb-admin-2.js"></script>
</body>
</html>