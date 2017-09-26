<?php
require "../../private/config.php";
$error = "";
if(isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $verifypass = $_POST['verifypass'];

    if($fullname == "") {
        $error = "Volledige naam is niet ingevuld!";
    } elseif($username == "") {
        $error = "Gebruikersnaam is niet ingevuld!";
    } elseif($mail == "") {
        $error = "E-mail is niet ingevuld!";
    } elseif($password == "") {
        $error = "Wachtwoord is niet ingevuld!";
    } elseif($password != $verifypass) {
        $error = "Wachtwoorden komen niet overeen!";
    }

    if($error == ""){
        try {
            $stmt = $db->prepare('INSERT INTO admin_credentials (fullname, username, mail, password) VALUES (:fullname, :username, :mail, :password)');
            $stmt->execute(array(':fullname' => $fullname, ':username' => $username, ':mail' => $mail, ':password' => $password));
            header("Location: installation2.php");
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
                        <div class="panel-heading">Installatie: Gegevens</div>
                        <div class="panel-body">
                            <?php if ($error != "") { ?>
                                <div class="isa_error"><?php echo $error; ?></div>
                            <?php } ?>
                            <form action="" method="post">

                                <label for="fname">Volledige naam</label>
                                <input type="text" id="fullname" class="form-control" name="fullname" placeholder="Volledige naam..." value="<?php if(isset($_POST['fullname'])) { echo $_POST['fullname']; } ?>">

                                <label for="lname">Gebruikersnaam</label>
                                <input type="text" id="username" class="form-control" name="username" placeholder="Gebruikersnaam..." value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>">

                                <label for="emailaddr" class="m-t-10">E-mail adres</label>
                                <input type="text" id="mail" class="form-control" name="mail" placeholder="E-mail..." value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>">

                                <label for="password" class="m-t-10">Wachtwoord</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Wachtwoord..." value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>">

                                <label for="verifypass" class="m-t-10">Herhaal wachtwoord</label>
                                <input type="password" id="verifypass" class="form-control" name="verifypass" placeholder="Herhaal je wachtwoord..." value="<?php if(isset($_POST['verifypass'])) { echo $_POST['verifypass']; } ?>">

                                <center><input type="submit" class="btn btn-primary m-t-10" id="submitbtn" name="submit" value="Lets go!"></center>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>