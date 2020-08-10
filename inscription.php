<html>

<head>
    <link rel="stylesheet" type="text/css" href="index.css" />
    <link rel=icon href="icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
    <title>Inscription</title>
    <meta charset="utf-8">
</head>



<body>
    <main>

        <header>
            <?php include "header.php"; ?>

        </header>

        <h1>Inscription</h1>

        <div class="formulaire">
            <div class="carré">
                <form method="POST" action="">

                    <label for="login">Identifiant :</label>
                    <input type="text" placeholder="login" name="login" required />

                    <label for="login">Email :</label>
                    <input type="email" placeholder="email" name="email" required />

                    <label for="mot de passe">Mot de passe :</label>
                    <input type="password" placeholder="password" name="password" required />

                    <label for="confirmation">Confirmer mot de passe :</label>
                    <input type="password" placeholder="confirm" name="confirmpass" required />
                    <br>

                    <input class="boutton" type="submit" value="Inscription" name="inscription">

                </form>
            </div>
        </div>

        <footer>
            <?php include "footer.php"; ?>
        </footer>
    </main>
</body>

</html>

<?php

$connexion = mysqli_connect("localhost", "root", "", "blog");

if (isset($_POST["inscription"])) {

    $login = $_POST["login"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $confirmpass = $_POST["confirmpass"];
    $requete = "SELECT login FROM utilisateurs WHERE login = '$login'";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_num_rows($query);

    if (!empty($resultat) || $_POST["password"] != $confirmpass) {
        if (!empty($resultat)) {
            echo "Ce login existe déja";
        }

        if ($_POST["password"] != $confirmpass) {
            echo "Le mot de passe ne correspond pas";
        }
    } else {
        $login = $_POST["login"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $confirmpass = $_POST["confirmpass"];
        $requete = "INSERT INTO utilisateurs(login, password, email)
        values ('$login','$password','$email')";
        $query = mysqli_query($connexion, $requete);
        mysqli_close($connexion);
        header('Location: connexion.php');
        //var_dump($requete);


    }
}


?>