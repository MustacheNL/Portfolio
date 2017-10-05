<?php
require 'includes/header.php';

$error = "";
if(isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $verifypass = $_POST['verifypass'];

    if($fullname == "") {
        $error = "Volledige naam is niet ingevuld!";
    } elseif(strpos($fullname, " ") == false){
        $error = "Je volledige naam bestaat toch uit je voornaam en achternaam, hoop ik?";
    } elseif($username == "") {
        $error = "Gebruikersnaam is niet ingevuld!";
    } elseif(strpos($username, " ") == true){
        $error = "Je inlognaam mag geen spaties bevatten!";
    } elseif($mail == "") {
        $error = "E-mail is niet ingevuld!";
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
      $error = "E-mail adres is niet geldig!";
    } elseif($password == "") {
        $error = "Wachtwoord is niet ingevuld!";
    } elseif($password != $verifypass) {
        $error = "Wachtwoorden komen niet overeen!";
    }

    if($error == ""){
        try {
            $stmt = $db->prepare('INSERT INTO admin_credentials (fullname, username, mail, password) VALUES (:fullname, :username, :mail, :password)');
            $stmt->execute(array(':fullname' => $fullname, ':username' => $username, ':mail' => $mail, ':password' => password_hash($password, PASSWORD_DEFAULT)));

            $stmt = $db->prepare("UPDATE site_settings SET part1_installed = 1 WHERE id = 1");
            $stmt->execute();
            header("Location: installation2.php");
            exit;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>
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