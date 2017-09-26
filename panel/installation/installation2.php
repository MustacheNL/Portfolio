<?php
require "../../private/config.php";
$error = "";
if(isset($_POST['submit'])) {
    $country = $_POST['country'];
    $region = $_POST['region'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $postalcode = $_POST['postalcode'];

    if($country == "") {
        $error = "Land is niet ingevuld!";
    } elseif($region == "") {
        $error = "Provincie is niet ingevuld!";
    } elseif($city == "") {
        $error = "Stad is niet ingevuld!";
    } elseif($street == "") {
        $error = "Straat is niet ingevuld!";
    } elseif($postalcode == "") {
        $error = "Postcode is niet ingevuld!";
    }

    if($error == ""){
        try {
            $query = $db->prepare('UPDATE site_settings SET site_installed = 1 WHERE id = 1');
            $query->execute();
            $stmt = $db->prepare('UPDATE admin_credentials SET country = :country, region = :region, city = :city, street = :street, postalcode = :postalcode WHERE id = 1');
            $stmt->execute(array(':country' => $country, ':region' => $region, ':city' => $city, ':street' => $street, ':postalcode' => $postalcode));
            header("Location: finished.php");
            exit;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
<html>
    <head>
        <title>
            Installatie
        </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>

    <style>
        .m-t-10 {
            margin-top: 10px;
        }

        .panel-primary {
            margin: auto;
            margin-top: 50%;
        }

        .isa_info, .isa_success, .isa_warning, .isa_error {
            margin: 10px 0px;
            padding:12px;

        }
        .isa_info {
            color: #00529B;
            background-color: #BDE5F8;
        }
        .isa_success {
            color: #4F8A10;
            background-color: #DFF2BF;
        }
        .isa_warning {
            color: #9F6000;
            background-color: #FEEFB3;
        }
        .isa_error {
            color: #D8000C;
            background-color: #FFBABA;
        }
        .isa_info i, .isa_success i, .isa_warning i, .isa_error i {
            margin:10px 22px;
            font-size:2em;
            vertical-align:middle;
        }
    </style>

    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Installatie: Persoonlijke Gegevens</div>
                    <div class="panel-body">
                        <?php if ($error != "") { ?>
                            <div class="isa_error"><?php echo $error; ?></div>
                        <?php } ?>
                        <form action="" method="post">

                            <label for="country">Land</label>
                            <input type="text" id="country" class="form-control" name="country" placeholder="Land..." value="<?php if(isset($_POST['country'])) { echo $_POST['country']; } ?>">

                            <label for="region">Provincie</label>
                            <input type="text" id="region" class="form-control" name="region" placeholder="Provincie..." value="<?php if(isset($_POST['region'])) { echo $_POST['region']; } ?>">

                            <label for="city" class="m-t-10">Stad</label>
                            <input type="text" id="city" class="form-control" name="city" placeholder="Stad..." value="<?php if(isset($_POST['city'])) { echo $_POST['city']; } ?>">

                            <label for="street" class="m-t-10">Straat + Huisnummer</label>
                            <input type="text" id="street" class="form-control" name="street" placeholder="Straat + Huisnummer..." value="<?php if(isset($_POST['street'])) { echo $_POST['street']; } ?>">

                            <label for="postalcode" class="m-t-10">Postcode</label>
                            <input type="text" id="postalcode" class="form-control" name="postalcode" placeholder="Postcode..." value="<?php if(isset($_POST['postalcode'])) { echo $_POST['postalcode']; } ?>">

                            <center><input type="submit" class="btn btn-primary m-t-10" id="submitbtn" name="submit" value="Lets go!"></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>