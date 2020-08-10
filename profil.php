<html>

<head>
    <link rel="stylesheet" type="text/css" href="index.css" />
    <link rel=icon href="icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <title>Profil</title>
    <meta charset="utf-8">
</head>

<body>
    <main>
        <header>
            <?php include "header.php"; ?>
        </header>

        <h2>Profil</h2>


        <?php
        //session_start();
        if (isset($_SESSION['login'])) {
            $connexion = mysqli_connect("localhost", "root", "", "blog");
            $sql = "SELECT * FROM utilisateurs WHERE login='" . $_SESSION['login'] . "'";
            $req = mysqli_query($connexion, $sql);
            $req2 = mysqli_fetch_assoc($req);
        ?>

            <div class="formulaire">
                <div class="carré">
                    <form method="POST" action="">


                        <label for="login">Nouveau identifiant :</label>
                        <input type="text" value="<?php echo $req2['login'] ?>" placeholder="new login" name="login" />

                        <label for="login">Nouveau email :</label>
                        <input type="email" placeholder="email" name="email" required />

                        <label for="mot de passe">Nouveau mot de passe :</label>
                        <input type="password" placeholder="new password" name="newpass" />

                        <label for="mot de passe">Confirmer nouveau mot de passe :</label>
                        <input type="password" placeholder="confirm new password" name="confirmpass2" />

                        <br>
                        <input class="boutton" type="submit" value="Modifier" name="modifier">
                </div>
                </form>
            </div>

            <footer>
                <?php include "footer.php"; ?>
            </footer>
    </main>
</body>

</html>

<?php


            if (isset($_POST['modifier'])) {
                if (!empty($_POST['login']) && !empty($_POST['newpass'])) {
                    $login = $_POST['login'];
                    $newpass = password_hash($_POST['newpass'], PASSWORD_BCRYPT, ["cost" => 12]);
                    $newmail = $_POST['email'];
                    $confirmpass = $_POST['confirmpass2'];
                    $modif_login = false;
                    $modif_mail = false;
                    $modif_pass = false;

                    if ($login != $req2['login']) {
                        $nouveau_login = "SELECT id FROM utilisateurs WHERE login='" . $login . "'";
                        $resultat = mysqli_query($connexion, $nouveau_login);
                        $nombre_login = mysqli_num_rows($resultat);
                        if ($nombre_login < 1) {
                            $sql = "UPDATE utilisateurs SET login = '$login' WHERE login = '" . $_SESSION['login'] . "'";
                            mysqli_query($connexion, $sql);
                            $_SESSION['login'] = $_POST['login'];
                            $modif_login = true;
                        } {
                            echo "<p>Login modifier avec succès</p>";
                        }
                    }

                    if ($newmail != $req2['email']) {
                        $nouveau_mail = "SELECT id FROM utilisateurs WHERE login='" . $login . "'";
                        $resultat = mysqli_query($connexion, $nouveau_mail);
                        $sql = "UPDATE utilisateurs SET email = '$newmail' WHERE login = '" . $_SESSION['login'] . "'";
                        mysqli_query($connexion, $sql);
                        $_SESSION['email'] = $_POST['email'];
                        $modif_mail = true; {
                            echo "<p>Email modifier avec succès</p>";
                        }
                    }

                    if ($newpass != $req2['password']) {
                        if ($_POST['newpass'] == $confirmpass) {
                            $sql = "UPDATE utilisateurs SET password = '$newpass' WHERE login = '" . $_SESSION['login'] . "'";
                            mysqli_query($connexion, $sql);
                            $_SESSION['newpass'] = $_POST['newpass'];
                            $modif_pass = true;
                            echo "<p>Mot de passe modifier avec succès</p>";
                        } else {
                            echo "Mot de passe n'a pas été modifier";
                        }
                    }
                }
            }
            mysqli_close($connexion);
        }

?>