<?php
require "../private/config.php";
$error = "";
	if(isset($_POST['login'])) {
        $error = "";
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "") {
            $error = "Gebruikersnaam is niet ingevuld!";
        } elseif($password == "") {
            $error = "Wachtwoord is niet ingevuld!";
        }
        
        if($error == "") {
            try {
                $stmt = $db->prepare('SELECT id, fullname, username, password FROM admin_credentials WHERE username = :username');
                $stmt->execute(array(':username' => $username));
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                if($data == false){
                    $error = "Gebruikersnaam klopt niet!";
                } else {
                    if($password == $data['password']) {
                        $_SESSION['name'] = $data['fullname'];
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['password'] = $data['password'];
                        header('Location: dashboard.php');
                        exit;
                    }
                    else {
                        $error = "Wachtwoord klopt niet!";
                    }
                }
            } catch(PDOException $e) {
                $error = $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <title>Dashboard: Inloggen</title>
        <link rel="stylesheet" type="text/css" href="../css/panel/style.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
       <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    </head>

    <body>
      <div class="login">
          <h1>Inloggen</h1>
            <?php if ($error != "") { ?>
                 <div class="isa_error"><?php echo $error; ?></div>
            <?php } ?>
              <form action="" method="post">
                <input type="text" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" /><br/><br/>
                <input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" /><br><br>
                <button type="submit" name='login' value="Inloggen" class="btn btn-primary btn-block btn-large">Betreed de wonderlijke wereld!</button>
              </form>
        </div>
        <script  src="../js/index.js"></script>
    </body>
</html>
