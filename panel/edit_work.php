<?php require 'includes/header.php'; ?>
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
                    <h1 class="page-header">Werk</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Werk
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Soort</th>
                                        <th>Plaats</th>
                                        <th>Van X tot X</th>
                                        <th>Informatie</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $stmt = $db->prepare("SELECT * FROM site_work");
                                    $stmt->execute();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $id = $row['id'];
                                        $work_type = $row['work_type'];
                                        $work_place = $row['work_place'];
                                        $work_year_start = $row['work_year_start'];
                                        $work_year_end = $row['work_year_end'];
                                        $work_info = $row['work_info']; ?>
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $work_type; ?></td>
                                            <td><?php echo $work_place; ?></td>
                                            <td><?php echo $work_year_start; ?> - <?php echo $work_year_end; ?></td>
                                            <td><?php echo $work_info; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
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