<?php require 'includes/header.php';

$stmt = $db->prepare("SELECT * FROM site_about");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $about_name = $row['about_name'];
    $about_info = $row['about_info'];
    $about_facebook = $row['about_facebook'];
    $about_twitter = $row['about_twitter'];
    $about_instagram = $row['about_instagram'];
    $about_skype = $row['about_skype'];
}

if (isset($_POST['submit'])) {
    $stmt = $db->prepare("UPDATE site_about SET `about_name` = :about_name, `about_info` = :about_info, `about_facebook` = :about_facebook, `about_twitter` = :about_twitter, `about_instagram` = :about_instagram, `about_skype` = :about_skype");
    $stmt->execute(array(':about_name' => $_POST['about_name'], ':about_info' => $_POST['about_info'], ':about_facebook' => $_POST['about_facebook'], ':about_twitter' => $_POST['about_twitter'], ':about_instagram' => $_POST['about_instagram'], ':about_skype' => $_POST['about_skype']));
    header("location: edit_home.php");
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
</head>

<body>
<div id="wrapper">
    <?php include "includes/navbar.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Home pagina bewerken</h1>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="POST" role="form">
                                    <div class="form-group">
                                        <label>Naam (volledig mag)</label>
                                        <input class="form-control" placeholder="Enter text" name="about_name"
                                               value="<?php echo $about_name; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tekst over jezelf</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter text"
                                                  name="about_info"><?php echo $about_info; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input class="form-control" placeholder="Enter text" name="about_facebook"
                                               value="<?php echo $about_facebook; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input class="form-control" placeholder="Enter text" name="about_twitter"
                                               value="<?php echo $about_twitter; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input class="form-control" placeholder="Enter text" name="about_instagram"
                                               value="<?php echo $about_instagram; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Skype</label>
                                        <input class="form-control" placeholder="Enter text" name="about_skype"
                                               value="<?php echo $about_skype; ?>">
                                    </div>
                                    <button name="submit" type="submit" class="btn btn-default">Opslaan</button>
                                </form>
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